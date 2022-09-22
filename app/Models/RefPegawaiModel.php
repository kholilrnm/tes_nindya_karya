<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'ref_pegawai';
    protected $primaryKey = 'id';
    protected $fillable = ['nik', 'name', 'email', 'address', 'id_jabatan', 'jenis_kelamin'];
}
