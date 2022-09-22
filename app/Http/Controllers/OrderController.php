<?php

namespace App\Http\Controllers;

use App\Models\MDetailPembayaranModel;
use App\Models\MHargaModel;
use App\Models\MItemModel;
use App\Models\MPembayaranModel;
use App\Models\MUomModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data_barang = MItemModel::all();
        $data = MPembayaranModel::join('m_detail_pembayaran', 'm_pembayaran.id_pembayaran', '=', 'm_detail_pembayaran.id_pembayaran')->select('m_pembayaran.id_pembayaran', 'm_pembayaran.transaksi_kode', 'm_pembayaran.nama', 'm_pembayaran.total_transaksi')->groupBy('m_pembayaran.id_pembayaran', 'm_pembayaran.transaksi_kode', 'm_pembayaran.nama', 'm_pembayaran.total_transaksi')->get();
        $data_pembayaran = [];

        foreach ($data as $index => $item) {
            $datadetail = MDetailPembayaranModel::where('id_pembayaran', '=', $item->id_pembayaran)->get()->toArray();
            $data_pembayaran[] = [
                'nama' => $item->nama,
                'transaksi_kode' => $item->transaksi_kode,
                'total_transaksi' => $item->total_transaksi,
                'total_transaksi_pajak' => (($item->total_transaksi * 11 / 100) + $item->total_transaksi), //pajak 
                'detail' => $datadetail
            ];
            $arrayPush = array_push($data_pembayaran[$index]['detail'], ['id_item' => '', 'nama' => '.', 'jumlah_barang' => '', 'total_harga' => '', 'total_transaksi_pajak' => '']);
        }

        return view('order.order', compact('data_pembayaran', 'data_barang'));
    }

    public function getBarang(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $barang = MItemModel::orderby('nama', 'asc')->select('id_item', 'nama')->get();
        } else {
            $barang = MItemModel::orderby('nama', 'asc')->select('id_item', 'nama')->where('nama', 'like', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($barang as $items) {
            $response[] = array(
                "id" => $items->id_item,
                "text" => $items->nama
            );
        }

        return response()->json($response);
    }

    public function tambahPesanan(Request $request)
    {
        $kode_awal = 'INV';
        $tahun = date('Y');
        $list_bulan_romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $checkDataAwal = MPembayaranModel::orderBy('id_pembayaran', 'DESC')->first();
        // dd($checkDataAwal);
        if ($checkDataAwal) {
            $IdPembayaran = $checkDataAwal->id_pembayaran;
        } else {
            $IdPembayaran = 0;
        }
        $strlen = strlen($IdPembayaran + 1);

        if ($strlen == 1) {
            $setAwal = '00';
            $transaksi_kode = $kode_awal . '/' . $list_bulan_romawi[(date('n') - 1)] . '/' . $tahun . '/' . $setAwal . ($IdPembayaran + 1);
        } else if ($strlen == 2) {
            $setAwal = '0';
            $transaksi_kode = $kode_awal . '/' . $list_bulan_romawi[(date('n') - 1)] . '/' . $tahun . '/' . $setAwal . ($IdPembayaran + 1);
        } else if ($strlen == 3) {
            $setAwal = '';
            $transaksi_kode = $kode_awal . '/' . $list_bulan_romawi[(date('n') - 1)] . '/' . $tahun . '/' . $setAwal . ($IdPembayaran + 1);
        }

        $index = count($request->id_barang);

        for ($i = 0; $i < $index; $i++) {
            MDetailPembayaranModel::create([
                'id_pembayaran' => 0,
                'transaksi_kode' => $transaksi_kode,
                'id_item' => $request->id_barang[$i],
                'nama' => MItemModel::select('nama')->where('id_item', $request->id_barang[$i])->pluck('nama')->first(),
                'jumlah_barang' => $request->jumlah_barang[$i],
                'total_harga' => (MHargaModel::select('harga')->where('id_item', $request->id_barang[$i])->pluck('harga')->first()) * $request->jumlah_barang[$i]
            ]);

            $getQtyUOM = MUomModel::select('qty')->where([
                ['id_item', $request->id_barang[$i]]
            ])->pluck('qty')->first();

            $sisaQty = $getQtyUOM - $request->jumlah_barang[$i];
            if ($sisaQty < 0) {
                $sisaQty = 0; // biar qty barang tidak < 0
                // dd($sisaQty);
                MUomModel::select('qty')->where([
                    ['id_item', $request->id_barang[$i]]
                ])->update(['qty' => $sisaQty]);
            } else {
                // dd($sisaQty);
                MUomModel::select('qty')->where([
                    ['id_item', $request->id_barang[$i]]
                ])->update(['qty' => $sisaQty]);
            }
        }

        $getTotal = MDetailPembayaranModel::where([
            ['id_pembayaran', 0]
        ])->sum('total_harga');

        MPembayaranModel::create([
            'nama' => $request->nama_pemesan,
            'transaksi_kode' => $transaksi_kode,
            'total_transaksi' => $getTotal
        ]);

        MDetailPembayaranModel::where([
            ['transaksi_kode', MPembayaranModel::orderBy('id_pembayaran', 'DESC')->pluck('transaksi_kode')->first()]
        ])->update(['id_pembayaran' => MPembayaranModel::orderBy('id_pembayaran', 'DESC')->pluck('id_pembayaran')->first()]);

        return redirect()->back()->with(['message' => 'Sukses tambah pesanan']);
    }
}
