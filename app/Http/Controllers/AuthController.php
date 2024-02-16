<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.pages.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->roles === 'admin') {
                Alert::success(Auth::user()->nama, "berhasil login");
                return redirect()->route('dashboard');
            } else
            if (Auth::user()->roles === 'pelanggan' && Auth::user()->status == true) {
                Alert::success(Auth::user()->nama, "berhasil login");
                return redirect()->route('beranda');
            } else {
                Alert::info("Info", "silahkan tunggu konfirmasi dari admin");
                return redirect()->back();
            }
        } else {
            Alert::error("Gagal", "username atau password kamu salah");
            return redirect()->back();
        }
    }

    public function registrasi()
    {
        return view('auth.pages.regis');
    }

    public function registrasi_action(Request $request)
    {
        $data = $request->all();
        $data['roles'] = 'pelanggan';

        User::create($data);

        Alert::success("Berhasil", "silahkan tunggu konfirmasi dari admin");
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();

        Alert::success("Berhasil", "logout");
        return redirect()->route('login');
    }
}
