<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Prodi;
use App\Models\Role;
use Illuminate\Support\Facades\Redirect;

class RegisteredUserController extends Controller
{
    public function index()
    {
        return view('admin.dosen.index-dosen', [
            'users' => User::where('id', '<>', 1)->get(),
        ]);
    }
    
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.dosen.tambah-dosen', [
            'prodis' => Prodi::all(),
            'role' => Role::where('id', 2)->first(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'prodi' => ['required'],
        ]);

        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_prodi' => $request->prodi,
            'id_role' => 2,
        ]);

        event(new Registered($user));

        return Redirect::route('dosen.index')->with('success', 'Akun Berhasil Di Tambahkan');
    }
}
