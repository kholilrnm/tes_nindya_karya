<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPrivilegeModel extends Model
{
    use HasFactory;
    protected $table = 'm_privilege';
    protected $primaryKey = 'id_privilege';
    protected $fillable = ['nama_hak_akses'];
}
