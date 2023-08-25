<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function edit($username)
    {
        $user = User::where('name', $username)->first();

        if (!$user) {
            return back()->with('fail', 'Data Tidak Di Temukan');
        }

        $prodis = Prodi::all();

        return view('admin.dosen.edit', compact('user', 'prodis'));
    }

}
