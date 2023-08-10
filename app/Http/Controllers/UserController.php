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

    // public function update(Request $request, $id)
    // {
    //     $user = User::find($id);

    //     if (!$user) {
    //         abort(404);
    //     }

    //     // Validasi Inputan
    //     $request->validate([
    //         'id' => ['required|unique:users,id,' . $user->id],
    //         'name' => ['required|string|max:255'],
    //         'prodi' => ['required|exists:prodis,id'],
    //         'email' => ['required|string|email|max:255|unique:users,email,' . $user->id],
    //         'password' => [
    //             function ($attribute, $value, $fail) use ($user, $request) {
    //                 // If password field is not filled, use the old password
    //                 if (!$request->filled('password')) {
    //                     if (!Hash::check($value, $user->password)) {
    //                         $fail('Password lama tidak cocok.');
    //                     }
    //                 } else {
    //                     if (!Hash::check($request->input('oldPassword'), $user->password)) {
    //                         $fail('Password lama tidak cocok.');
    //                     }
    //                 }
    //             }
    //         ],
    //         'newPassword' => ['required_with:password|confirmed', Rules\Password::defaults()],
    //     ]);

    //     // Update
    //     $user->id = $request->input('id');
    //     $user->name = $request->input('name');
    //     $user->prodi_id = $request->input('prodi');
    //     $user->email = $request->input('email');

    //     // Update password Jika Password baru terisi
    //     if ($request->filled('newPassword')) {
    //         $user->password = bcrypt($request->input('newPassword'));
    //     }

    //     $user->id_role = 2;

    //     $user->save();

    //     // Redirect back
    //     return back()->with('success', 'Data Telah Berhasil Di Ubah.');
    // }

    public function update(Request $request, User $id) : RedirectResponse
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        // Validasi Inputan
        $request->validate([
            'id' => ['required'],
            'name' => ['required|string|max:255'],
            'prodi' => ['required|exists:prodis,id'],
            'email' => ['required|string|email|max:255|unique:users,email,'],
            'password' => ['required', new MatchOldPassword],
            'newPassword' => ['required|confirmed', Rules\Password::defaults()],
        ]);

        // Update
        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->prodi_id = $request->input('prodi');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->id_role = 2;

        $user->save();

        // Redirect back
        return Redirect::route('dosen.edit')->with('success', 'Data Telah Berhasil Di Ubah.');
    }


    public function destroy()
    {
        //
    }
}
