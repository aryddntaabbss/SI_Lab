<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Matkul;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.user.profile_edit', [
            'user' => $request->user(),
            'prodis' => Prodi::all(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateInfo(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());
        
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        
        $user->id_prodi = $request->input('prodi');

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Informasi Profil Telah Berhasil Di Ubah.');
    }

    public function updatePassword(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $password = $request->input('password');
        
        if(!empty($password)){
            $user->update([
                'password' => Hash::make($password),
            ]);
        }
        
        return Redirect::route('profile.edit')->with('success', 'Password Telah Berhasil Di Ubah.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy($id): RedirectResponse
    {
        $user = auth()->user(); // Mengambil user yang sedang login

        if ($user->id_role === 1) {
            $dosen = User::find($id);
            if ($dosen) {
                Matkul::where('id_dosen', $id)->delete();
                DB::table('users')->where('id', $id)->delete();
                return redirect()->route('dosen.index')->with('success', 'Akun Berhasil Di Hapus');
            }
            return redirect()->route('adminDashboard')->with('error', 'Akun dosen tidak ditemukan.');
        }

        return back()->with('error', 'Anda tidak memiliki izin untuk menghapus akun.');
    }
}
