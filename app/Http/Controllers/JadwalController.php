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
        $maxFitness = Populasi::orderByDesc('fitness')->value('id');

        $jadwalMaxFitness = Jadwal::where('id_populasi', $maxFitness)->orderBy('id_hari')->orderBy('waktu_mulai')->get();

        // dd($jadwalMaxFitness);
        return view('admin.jadwal.kelola.index-kelola', [
            'jadwalMatkul' => $jadwalMaxFitness,
            'populasi' => Populasi::orderByDesc('fitness')->get(),
            'generasi' => session('generasi'),
            'totalWaktuProses' => session('totalWaktu'),
            'hari' => Hari::all(),
        ]);
    }

    public function updateKelola(Request $request, Jadwal $jadwal)
    {
        // dd($request);
        $request->validate([
            'hari' => ['required'],
            'waktu_mulai' => ['required'],
        ]);

        $durasi = $jadwal->matkul->sks * 45;
        $waktuMulai = Carbon::parse($request->waktu_mulai);
        $waktuSelesai = $waktuMulai->copy()->addMinutes($durasi);
        $jadwal->update([
            'id_hari' => $request->hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $waktuSelesai,
        ]);

        $this->cekFitness();
        return redirect()->route('kelolaJadwal.index')->with('success', 'Data Jadwal Berhasil Di Perbarui !');
    }

    public function simpanJadwal()
    {
        $maxFitness = Populasi::max('fitness');
        // $id = Populasi::max('fitness')->get('id');

        // Hapus jadwal yang bukan berasal dari populasi dengan fitness tertinggi
        $jadwalToDelete = Jadwal::whereNotIn('id_populasi', function ($query) use ($maxFitness) {
            $query->select('id')
                ->from('populasi')
                ->where('fitness', '<', $maxFitness);
        })->delete();

        dd($jadwalToDelete);
        foreach ($jadwalToDelete as $jadwal) {
            $jadwal->delete();
        }

        // Hapus populasi yang bukan memiliki fitness tertinggi
        Populasi::where('fitness', '<', $maxFitness)->delete();
        return redirect()->route('kelolaJadwal.index')->with('success', 'Jadwal Berhasil Di Simpan !');
    }

    public function algoritmaGen()
    {
        Jadwal::truncate();
        Populasi::query()->update(['fitness' => 0]);
        ini_set('max_execution_time', 300);
        session(['generasi' => 0, 'totalWaktu' => 0]);
        $startTime = microtime(true);
        $generasi = 0;
        $targetFitness = 90;

        $this->createJadwal();
        while (true) {
            $this->popCrossOver();
            $this->popMutation();
            $this->popTermination();
            $this->popRegeneration();
            $generasi += 1;

            // Perbarui data session
            session(['generasi' => $generasi]);

            // Cek kondisi berhenti
            $currentTime = microtime(true);
            $executionTime = $currentTime - $startTime;

            if ($executionTime > 15) {
                break; // Hentikan perulangan jika waktu eksekusi lebih dari 10 detik
            }

            // Cek apakah ada populasi dengan fitness yang melebihi target
            $exceedsTarget = Populasi::where('fitness', '>', $targetFitness)->exists();
            if ($exceedsTarget) {
                break; // Hentikan perulangan jika populasi melebihi target fitness
            }
        }
        $this->cekFitness();
        $endTime = microtime(true);
        $totalTime = number_format(($endTime - $startTime), 2);
        session(['generasi' => $generasi, 'totalWaktu' => $totalTime]);
        return Redirect::route('kelolaJadwal.index');
    }

    public function nextGeneration()
    {
        $startTime = microtime(true);
        $generasi = session('generasi');
        $targetFitness = 90;

        while (true) {
            $this->popCrossOver();
            $this->popMutation();
            $this->popTermination();
            $this->popRegeneration();
            $generasi += 1;

            // Perbarui data session
            session(['generasi' => $generasi]);

            // Cek kondisi berhenti
            $currentTime = microtime(true);
            $executionTime = $currentTime - $startTime;

            if ($executionTime > 30) {
                break; // Hentikan perulangan jika waktu eksekusi lebih dari 10 detik
            }

            // Cek apakah ada populasi dengan fitness yang melebihi target
            $exceedsTarget = Populasi::where('fitness', '>', $targetFitness)->exists();
            if ($exceedsTarget) {
                break; // Hentikan perulangan jika populasi melebihi target fitness
            }
        }
        $this->cekFitness();
        $endTime = microtime(true);
        $totalTime = number_format(($endTime - $startTime), 2);
        session(['generasi' => $generasi, 'totalWaktu' => $totalTime]);
        return Redirect::route('kelolaJadwal.index');
    }

    public function createJadwal()
    {
        $matakuliah = Matkul::inRandomOrder()->get();
        $jamBuka = 7 * 60 + 30; // 7.30 dalam menit
        $jamTutup = 17 * 60; // Jam tutup reguler       

        $jadwalToInsert = [];

        for ($i = 1; $i <= 4; $i++) {
            foreach ($matakuliah as $matkul) {
                $matkul->id_hari = $this->randomHari();
                if ($matkul->id_hari == 5) {
                    $jamTutup = 12 * 60;
                }
                $matkul->durasi = ($matkul->sks * 45);
                $jamMasuk = random_int($jamBuka, $jamTutup - $matkul->durasi);

                if ($jamMasuk % 5 !== 0) {
                    $jamMasuk = ceil($jamMasuk / 5) * 5;
                }

                $waktuMulai = Carbon::createFromTime(floor($jamMasuk / 60), $jamMasuk % 60);
                $waktuSelesai = $waktuMulai->copy()->addMinutes($matkul->durasi);

                $jadwalToInsert[] = [
                    'id_matkul' => $matkul->id,
                    'id_hari' => $matkul->id_hari,
                    'waktu_mulai' => $waktuMulai->toTimeString(),
                    'waktu_selesai' => $waktuSelesai->toTimeString(),
                    'id_populasi' => $i,
                    'updated_at' => $matkul->updated_at,
                    'created_at' => $matkul->created_at,
                ];
            }
        }

        // Masukkan semua jadwal sekaligus ke database
        Jadwal::insert($jadwalToInsert);
    }

    public function cekFitness()
    {
        $jumlahPopulasi = Populasi::all();

        foreach ($jumlahPopulasi as $populasi) {
            $idPopulasi = $populasi->id;
            $matkulCountInPopulasi = Jadwal::where('id_populasi', $idPopulasi)->count();
            $matkulCountInTable = Matkul::count();

            if ($matkulCountInPopulasi !== $matkulCountInTable) {
                Populasi::updateOrCreate(
                    ['id' => $idPopulasi],
                    ['fitness' => 0]
                );
                continue;
            }
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
                        $cekMaksMatkul = 1.4;
                        $matkuls = $matkulHari1;
                        $cekTabrak = 1.4;
                        $cekMenit = $this->checkMenitMulai(...$matkuls);
                    } else if (($matkulHari1->first()->id_hari >= 1 && $matkulHari1->first()->id_hari <= 4) && count($matkulHari1) <= 4) {
                        $cekMaksMatkul = 1.4;
                        $matkuls = $matkulHari1->take(4);
                        $cekTabrak = $this->checkTabrakan(...$matkuls);
                        $cekMenit = $this->checkMenitMulai(...$matkuls);
                    } elseif ($matkulHari1->first()->id_hari == 5 && count($matkulHari1) <= 2) {
                        $cekMaksMatkul = 1.4;
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

        // dd($child1);
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
        $populasiToUpdate = [5, 6];
        $rateMutasi = 10; // Persentase mutasi
        $jamBuka = 7 * 60 + 30; // 7.30 dalam menit

        foreach ($populasiToUpdate as $populasiId) {
            $jadwalItems = Jadwal::where('id_populasi', $populasiId)
                ->whereIn('id_hari', range(1, 5))
                ->get()
                ->groupBy('id_hari');

            foreach ($jadwalItems as $hari => $jadwals) {
                foreach ($jadwals as $jadwal) {
                    if (random_int(1, 100) <= $rateMutasi) {
                        $durasi = $jadwal->matkul->sks * 45;
                        $jamTutup = ($hari == 5) ? 12 * 60 : 17 * 60;

                        $jamMasuk = max($jamBuka, random_int($jamBuka, $jamTutup - $durasi));
                        if ($jamMasuk % 5 !== 0) {
                            $jamMasuk = ceil($jamMasuk / 5) * 5;
                        }
                        $jamKeluar = $jamMasuk + $durasi;

                        $jadwal->update([
                            'waktu_mulai' => Carbon::createFromTime(floor($jamMasuk / 60), $jamMasuk % 60)->format('H:i'),
                            'waktu_selesai' => Carbon::createFromTime(floor($jamKeluar / 60), $jamKeluar % 60)->format('H:i'),
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

            return 0.2; // Mata kuliah memiliki menit mulai yang sesuai
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

        return 0.2; // Semua mata kuliah memiliki menit mulai yang sesuai
    }

    private function checkTabrakan(...$matkuls)
    {
        $totalMatkuls = count($matkuls);
        if ($totalMatkuls == 1) {
            return 1.4;
        }
        for ($i = 0; $i < $totalMatkuls; $i++) {
            for ($j = $i + 1; $j < $totalMatkuls; $j++) {
                if ($this->hasConflict($matkuls[$i], $matkuls[$j])) {

                    return 0; // Ada tabrakan
                }
            }
        }
        return 1.4; // Tidak ada tabrakan
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
