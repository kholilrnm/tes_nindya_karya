<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDetailPembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'm_detail_pembayaran';
    protected $primaryKey = 'id_detail_pembayaran';
    protected $fillable = ['id_pembayaran', 'transaksi_kode', 'id_item', 'nama', 'jumlah_barang', 'total_harga'];

    public function invoice()
    {
        return $this->belongsTo(MPembayaranModel::class, 'id_pembayaran', 'id_pembayaran');
    }
}
