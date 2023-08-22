<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\Matkul;
use App\Models\User;

class MatkulController extends Controller
{
    public function index(Matkul $matkul)
    {
        $matakuliah = Matkul::all();

        foreach ($matakuliah as $matkul){
            $matkul->durasi = ($matkul->sks * 45);
            
            $jam = floor($matkul->durasi/60);
            $menit = $matkul->durasi % 60;

            $matkul->durasiJam = $jam;
            $matkul->durasiMenit = $menit;
        }

        $total_sks = Matkul::all()->sum('sks');
        return view('admin.matakuliah.index-matkul', [
            'mata_kuliah' => $matakuliah,
            'total_sks' => $total_sks,
            // 'durasi' => $durasi_matkul,
        ]);
    }

    public function create()
    {
        return view('admin.matakuliah.tambah-matkul', [
            'users' => User::all(),
            'total_sks' => Matkul::all()->sum('sks'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => ['required'],
            'matkul' => ['required', 'string', 'max:255'],
            'dosen' => ['required'],
            'kelas' => ['required'],
            'sks' => ['required'],
            'semester' => ['required'],
        ]);

        Matkul::create([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->matkul,
            'id_dosen' => $request->dosen,
            'kelas' => $request->kelas,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return Redirect::route('matkul.index')->with('success', 'Mata Kuliah Berhasil Di Tambahkan');
    }

    public function edit(Matkul $matkul)
    {
        // Mengisi variabel $users dengan data dosen (id_role = 2)
        $users = User::where('id_role', 2)->get();

        // Tampil halaman edit membawa 2 variabel matkul & users
        return view('admin.matakuliah.edit-matkul', compact('matkul', 'users'));
    }

    public function update(Request $request, Matkul $matkul)
    {
        // dd($request);
        $request->validate([
            'kode_matkul' => ['required'],
            'matkul' => ['required', 'string', 'max:255'],
            'dosen' => ['required'],
            'kelas' => ['required'],
            'sks' => ['required'],
            'semester' => ['required'],
        ]);

        $matkul->update([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->matkul,
            'id_dosen' => $request->dosen,
            'kelas' => $request->kelas,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('matkul.index')->with('success', 'Data Mata Kuliah Berhasil Diperbarui');
    }


    public function destroy(Matkul $matkul)
    {
        $matkul->delete();

        return redirect()->route('matkul.index')->with('success', 'Data Mata Kuliah Berhasil Dihapus');
    }


    // Fungsi-fungsi logika

    public function sksToTime(Matkul $sks){
        return $sks * 45;
    }
}
