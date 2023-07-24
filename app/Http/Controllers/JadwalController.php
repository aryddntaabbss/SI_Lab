<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Jadwal; // Assuming you have a Jadwal model

class JadwalController extends Controller
{
public function index()
{

$jadwals = Jadwal::all();

return view('jadwal.index', compact('jadwals'));
}

}