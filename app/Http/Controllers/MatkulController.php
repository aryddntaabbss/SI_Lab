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
    public function index()
    {
        return view('admin.matakuliah.index-matkul', [
            'mata_kuliah' => Matkul::all(),
        ]);
    }

    public function create()
    {
        return view('admin.matakuliah.tambah-matkul', [
            'users' => User::all(),
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

    public function edit()
    {
        return view('admin.matakuliah.edit-matkul', [
            'mata_kuliah' => Matkul::all(),
            'Users' => User::all(),
        ]);
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
