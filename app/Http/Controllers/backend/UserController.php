<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('roles','pelanggan')->get();
        return view('backend.pages.user.index',compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('backend.pages.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('backend.pages.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable',
            'nomor_ponsel' => 'required|digits_between:11,13|numeric',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan oleh pengguna lain',
            'nomor_ponsel.numeric' => 'Nomor ponsel harus menggunakan angka',
            'nomor_ponsel.digits_between' => 'Nomor ponsel antara 11 - 13 digit',
        ]);

        $user = User::findOrFail($id);

        // Update user data
        $userData = [
            'nama' => $request->nama,
            'username' => $request->username,
            'nomor_ponsel' => $request->nomor_ponsel,
        ];
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
        $user->update($userData);

        Alert::success("Berhasil", "memperbarui data user");
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success("Berhasil", "menghapus data user");
        return redirect()->route('user.index');
    }


}
