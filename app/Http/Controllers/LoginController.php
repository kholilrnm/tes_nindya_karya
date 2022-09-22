<?php

namespace App\Http\Controllers;

use App\Models\MUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $usr = $request->username;
        $pwd = $request->password;

        $user = MUserModel::where('username', $usr)->first();
        if ($user) {
            $check = Hash::check($pwd, $user->password);
        } else {
            return redirect()->back()->with(['message' => 'Username Tidak Ditemukan']);;
        }

        if ($check) {
            session()->put([
                'isLogin' => true,
                'nama' => $user->nama,
                'idRole' => $user->id_role
            ]);
            if ($user->username == 'kasir') {
                return redirect('order');
            } else if ($user->username == 'admin') {
                return redirect('stock');
            } else {
                return redirect('home');
            }
        } else {
            return redirect()->back()->with(['message' => 'Password Tidak Sesuai']);;
        }
    }

    public function register()
    {
        MUserModel::create([
            'id_role' => 3,
            'nama' => 'Super Admin SIMS',
            'username' => 's_admin',
            'password' => Hash::make('12345')
        ]);
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('signin');
    }
}
