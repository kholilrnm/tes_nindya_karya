<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'm_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['nama', 'transaksi_kode', 'total_transaksi'];

    public function detail()
    {
        return $this->hasMany(MDetailPembayaranModel::class, 'id_pembayaran', 'id_pembayaran');
    }

    // public function detail()
    // {
    //     return $this->belongsTo(Invoice_detail::class);
    // }
}
