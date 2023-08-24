<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matkul;
use App\Models\Populasi;
use App\Models\Jadwal;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard',[
            'user' => User::where('id', '<>', 1)->count(),
            'prodi'=> Prodi::all()->count(),
            'matkul' => Matkul::count()
        ]);
    }

    public function mainPage(){
        $fitness = Populasi::orderByDesc('fitness')->get();
        $id = $fitness->take(1)->pluck('id')->toArray();
        $jadwal = Jadwal::where('id_populasi', $id)->orderBy('id_hari')->orderBy('waktu_mulai')->get();

        return view('pages.index', [
            'jadwal'=> $jadwal,
        ]);
    }
}
