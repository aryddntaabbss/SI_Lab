<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matkul;
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
}
