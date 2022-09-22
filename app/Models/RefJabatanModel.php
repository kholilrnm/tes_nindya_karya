<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJabatanModel extends Model
{
    use HasFactory;
    protected $table = 'ref_jabatan';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'id_unit_kerja'];
}
