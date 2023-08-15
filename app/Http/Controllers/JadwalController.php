<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function indexKelola()
    {
        return view('admin.jadwal.kelola.index-kelola');
    }
}
