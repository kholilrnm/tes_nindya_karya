<?php

namespace App\Http\Controllers;

use App\Models\RefPegawaiModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function pegawai()
    {
        $data = RefPegawaiModel::all();
        return view('pegawai.pegawai', compact('data'));
    }

    public function pegawaiEdit()
    {
        return 'Mohon maaf belum selesai Edit';
    }

    public function pegawaiDestroy(Request $request)
    {
        $data = RefPegawaiModel::find($request->id);
        $data->delete();

        return redirect()->back()->with(['message' => 'Sukses delete pegawai']);
    }
}
