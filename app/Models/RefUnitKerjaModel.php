<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefUnitKerjaModel extends Model
{
    use HasFactory;
    protected $table = 'ref_unit_kerja';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
