<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Populasi;
use Carbon\Carbon;
use App\Models\Matkul;
use App\Models\Hari;
use Illuminate\Support\Arr;

class JadwalController extends Controller
{
    public function indexKelola()
    {
        $generasi = session('generasi');
        return view('admin.jadwal.kelola.index-kelola', [
            'gen1' => Jadwal::orderBy('id_populasi')->orderBy('id_hari')->orderBy('waktu_mulai')->get(),
            'populasi' => Populasi::all(),
            'generasi' => $generasi,
        ]);
    }

    public function algoritmaGen()
    {
        ini_set('max_execution_time', 120);
        
        $this->createJadwal();
        $generasi = 0;
        $targetFitness = 95;

        while (true) {
            $this->popCrossOver();
            $this->popMutation();
            $this->popTermination();
            $this->popRegeneration();
            $generasi += 1;

            // Cek apakah ada populasi dengan fitness yang melebihi target
            $exceedsTarget = Populasi::where('fitness', '>', $targetFitness)->exists();
            if ($exceedsTarget) {
                break; // Hentikan perulangan jika populasi melebihi target fitness
            }
        }
        $this->cekFitness();
        session(['generasi' => $generasi]);
        return Redirect::route('kelolaJadwal.index');
    }


    public function createJadwal()
    {
        Jadwal::truncate();
        Populasi::query()->update(['fitness' => null]);
        $matakuliah = Matkul::inRandomOrder()->get();
        $i = 1;
        // Membuat 4 Populasi (for - Looping)
        for ($i = 1; $i <= 4; $i++) {
            foreach ($matakuliah as $matkul) {

                $matkul->id_hari = $this->randomHari();

                $matkul->durasi = ($matkul->sks * 45);

                // ubah durasi matkul ke format jam dan menit
                $jam = floor($matkul->durasi / 60);
                $menit = $matkul->durasi % 60;

                $matkul->durasiJam = $jam;
                $matkul->durasiMenit = $menit;

                // Batasan waktu buka dan tutup lab (dalam menit)
                $jamBuka = 7 * 60 + 30; // 7.30 dalam menit
                $jamTutup = ($matkul->id_hari == 5) ? 12 * 60 : 17 * 60;

                // Menghasilkan jam masuk secara acak
                $jamMasuk = mt_rand($jamBuka, $jamTutup - $jam * 60);

                // Jika durasi matkul melebihi jam tutup, atur jam masuk ke jam buka
                if ($jamMasuk + $jam * 60 + $menit > $jamTutup) {
                    $jamMasuk = $jamBuka;
                }

                // menghitung waktu keluar berdasarkan jam masuk
                $jamKeluar = $jamMasuk + $jam * 60 + $menit;

                // ubah jam keluar ke format jam dan menit
                $jamKeluarJ = floor($jamKeluar / 60);
                $menitKeluar = $jamKeluar % 60;

                // ubah format jam menjadi lebih simple
                $matkul->jamMasuk = Carbon::createFromTime(floor($jamMasuk / 60), $jamMasuk % 60)->format('H:i');
                $matkul->jamKeluar = Carbon::createFromTime($jamKeluarJ, $menitKeluar)->format('H:i');

                Jadwal::create([
                    'id_matkul' => $matkul->id,
                    'id_hari' => $matkul->id_hari,
                    'waktu_mulai' => $matkul->jamMasuk,
                    'waktu_selesai' => $matkul->jamKeluar,
                    'id_populasi' => $i,
                    `updated_at` => $matkul->updated_at,
                    `created_at` => $matkul->created_at,
                ]);
            }
        }

        $this->cekFitness();
    }

    public function cekFitness()
    {
        $totalFitnessJadwal = 0;
        $jumlahPopulasi = Populasi::all();
        for ($i = 1; $i <= count($jumlahPopulasi); $i++) {
            $idPopulasi = $i;
            // Cek Fitnes per jadwal
            $totalFitnessJadwal = 0;

            for ($j = 1; $j <= 5; $j++) {
                $idHari = $j; // Ganti $idHari sesuai iterasi yang saat ini sedang dijalankan
                $matkulHari1 = Jadwal::where('id_populasi', $idPopulasi)->where('id_hari', $idHari)->get();

                if (count($matkulHari1) >= 1) {
                    $cekMaksMatkul = 0;
                    $cekTabrak = 0;
                    $cekMenit = 0;
                    $fitnessJadwal = 0;

                    if (count($matkulHari1) == 1) {
                        $cekMaksMatkul = 1;
                        $matkuls = $matkulHari1;
                        $cekTabrak = 1;
                        $cekMenit = $this->checkMenitMulai(...$matkuls);
                    } else if (($matkulHari1->first()->id_hari >= 1 && $matkulHari1->first()->id_hari <= 4) && count($matkulHari1) <= 4) {
                        $cekMaksMatkul = 1;
                        $matkuls = $matkulHari1->take(4);
                        $cekTabrak = $this->checkTabrakan(...$matkuls);
                        $cekMenit = $this->checkMenitMulai(...$matkuls);
                    } elseif ($matkulHari1->first()->id_hari == 5 && count($matkulHari1) <= 2) {
                        $cekMaksMatkul = 1;
                        $matkuls = $matkulHari1->take(2);
                        $cekTabrak = $this->checkTabrakan(...$matkuls);
                        $cekMenit = $this->checkMenitMulai(...$matkuls);
                    }

                    $fitnessJadwal = round(($cekTabrak + $cekMaksMatkul + $cekMenit) / 3 * 20, 2);
                    $totalFitnessJadwal += $fitnessJadwal;
                }
            }
            Populasi::updateOrCreate(
                ['id' => $idPopulasi],
                ['fitness' => $totalFitnessJadwal]
            );
        }
    }

    public function popSelection()
    {
        $sortedPop = Populasi::orderByDesc('fitness')->get();
        $bestId = $sortedPop->take(2)->pluck('id')->toArray();
        // dd($bestId);
        return $bestId;
    }

    public function popCrossOver()
    {
        $best = $this->popSelection();
        $child1 = [];
        $child2 = [];

        // Ambil data jadwal best1 hari 1-3
        for ($i = 0; $i < 3; $i++) {
            // Pertukaran jadwal pada hari ke-$i
            $temp1 = Jadwal::where('id_populasi', $best[0])->where('id_hari', $i + 1)->get();
            $temp2 = Jadwal::where('id_populasi', $best[1])->where('id_hari', $i + 1)->get();
            $child1[$i] = $temp2;
            $child2[$i] = $temp1;
        }

        // Ambil data jadwal best2 hari 4-5
        for ($i = 3; $i < 5; $i++) {
            $temp1 = Jadwal::where('id_populasi', $best[0])->where('id_hari', $i + 1)->get();
            $temp2 = Jadwal::where('id_populasi', $best[1])->where('id_hari', $i + 1)->get();
            $child1[$i] = $temp1;
            $child2[$i] = $temp2;
        }

        $popCrossover = [$child1, $child2];

        foreach ($popCrossover as $i => $child) {
            foreach ($child as $hari) {
                foreach ($hari as $jadwal) {
                    Jadwal::create([
                        'id_matkul' => $jadwal->id_matkul,
                        'id_hari' => $jadwal->id_hari,
                        'waktu_mulai' => $jadwal->waktu_mulai,
                        'waktu_selesai' => $jadwal->waktu_selesai,
                        'id_populasi' => $i + 5,
                    ]);
                }
            }
        }

        $this->cekFitness();
        return [$child1, $child2];
    }

    public function popMutation()
    {
        $child1 = Jadwal::where('id_populasi', 5)->get();
        $child2 = Jadwal::where('id_populasi', 6)->get();
        $populasiBaru = [$child1, $child2];
        /// MUTASIII
        $rateMutasi = 10;
        foreach ($populasiBaru as $j => $child) {
            $hari = [];
            for ($i = 1; $i <= 5 ; $i++){
                $hari[$i] = $child->where('id_hari', $i);
                $angka = random_int(0, 100);
                
                if ($angka < $rateMutasi) {
                    foreach ($hari[$i] as $jadwal) {
                        $jadwal->durasi = ($jadwal->matkul->sks * 45);
                        
                        // Batasan waktu buka dan tutup lab (dalam menit)
                        $jamBuka = 7 * 60 + 30; // 7.30 dalam menit
                        $jamTutup = ($jadwal->id_hari == 5) ? 12 * 60 : 17 * 60;
                        
                        // Menghasilkan jam masuk secara acak
                        $jamMasuk = mt_rand($jamBuka, $jamTutup - 180);
                        
                        // menghitung waktu keluar berdasarkan jam masuk
                        $jamKeluar = $jamMasuk + $jadwal->durasi;
                        
                        $jadwal->jamMasuk = Carbon::createFromTime(floor($jamMasuk / 60), $jamMasuk % 60)->format('H:i');
                        $jadwal->jamKeluar = Carbon::createFromTime(floor($jamKeluar / 60), $jamKeluar % 60)->format('H:i');
                        // dd($jadwal->id);
                        $jadwal = Jadwal::where('id_populasi', $j+5)->where('id_hari', $i)->where('id', $jadwal->id)->update([
                            'waktu_mulai' => $jadwal->jamMasuk,
                            'waktu_selesai' => $jadwal->jamKeluar,
                        ]);

                    }
                }

            }
        }
    }

    public function popTermination()
    {
        $sortedPop = Populasi::orderBy('fitness')->get();
        $worstIds = $sortedPop->take(2)->pluck('id')->toArray();

        Jadwal::whereIn('id_populasi', $worstIds)->delete();
        Populasi::whereIn('id', $worstIds)->update(['fitness' => null]);
    }

    /// GPT 2 WORKKKKK THANKS GPT !!
    public function popRegeneration()
    {
        $populasiToUpdate = [];
        $pop = Populasi::orderBy('id')->get();

        // Mencari populasi yang memiliki fitness lebih dari 0 dan siap dipindahkan
        foreach ($pop as $populasi) {
            if ($populasi->fitness > 0) {
                $populasiToUpdate[] = $populasi;
            }
        }

        // Pindahkan nilai fitness dari populasi yang memiliki fitness ke populasi kosong
        for ($i = 0; $i < count($populasiToUpdate); $i++) {
            $targetPopulasiId = $i % 4 + 1; // Pilih populasi dengan ID 1 sampai 4 secara berurutan
            Populasi::where('id', $targetPopulasiId)->update(['fitness' => $populasiToUpdate[$i]->fitness]);

            // Perbarui id_populasi pada jadwal yang terkait
            Jadwal::where('id_populasi', $populasiToUpdate[$i]->id)->update(['id_populasi' => $targetPopulasiId]);

            // Reset fitness pada populasi asal
            Populasi::where('id', $populasiToUpdate[$i]->id)->update(['fitness' => null]);
        }
    }

    private function checkMenitMulai(...$matkuls)
    {
        $totalMatkuls = count($matkuls);

        // Kasus khusus: Jika hanya ada 1 mata kuliah
        if ($totalMatkuls === 1) {
            $menitMulai = Carbon::parse($matkuls[0]->waktu_mulai)->minute;
            $allowedMinutes = [0, 10, 15, 20, 30, 40, 50];

            if (!in_array($menitMulai, $allowedMinutes)) {
                return 0; // Mata kuliah memiliki menit mulai yang tidak sesuai
            }

            return 1; // Mata kuliah memiliki menit mulai yang sesuai
        }

        // Kasus umum: Lebih dari 1 mata kuliah
        for ($i = 0; $i < $totalMatkuls; $i++) {
            for ($j = $i + 1; $j < $totalMatkuls; $j++) {
                $matkul1 = $matkuls[$i];
                $matkul2 = $matkuls[$j];

                $menitMulai1 = Carbon::parse($matkul1->waktu_mulai)->minute;
                $menitMulai2 = Carbon::parse($matkul2->waktu_mulai)->minute;

                $allowedMinutes = [0, 10, 15, 20, 30, 40, 50];

                if (!in_array($menitMulai1, $allowedMinutes) || !in_array($menitMulai2, $allowedMinutes)) {
                    return 0; // Setidaknya salah satu mata kuliah memiliki menit mulai yang tidak sesuai
                }
            }
        }

        return 1; // Semua mata kuliah memiliki menit mulai yang sesuai
    }

    private function checkTabrakan(...$matkuls)
    {
        $totalMatkuls = count($matkuls);
        if ($totalMatkuls == 1) {
            return 1;
        }
        for ($i = 0; $i < $totalMatkuls; $i++) {
            for ($j = $i + 1; $j < $totalMatkuls; $j++) {
                if ($this->hasConflict($matkuls[$i], $matkuls[$j])) {
                    return 0; // Ada tabrakan
                }
            }
        }
        return 1; // Tidak ada tabrakan
    }

    private function hasConflict($matkul1, $matkul2)
    {
        $jamMulai1 = Carbon::parse($matkul1->waktu_mulai);
        $jamSelesai1 = Carbon::parse($matkul1->waktu_selesai);

        $jamMulai2 = Carbon::parse($matkul2->waktu_mulai);
        $jamSelesai2 = Carbon::parse($matkul2->waktu_selesai);

        return $jamMulai1->between($jamMulai2, $jamSelesai2) || $jamSelesai1->between($jamMulai2, $jamSelesai2);
    }

    public function randomHari()
    {
        $listHari = Hari::pluck('id')->toArray();
        return Arr::random($listHari);
    }
}
