<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefTransCutiPegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'ref_trans_cuti_pegawai';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pegawai', 'tgl_awal_cuti', 'tgl_akhir_cuti', 'perihal_cuti'];
}
