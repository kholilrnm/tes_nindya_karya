<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MRoleModel extends Model
{
    use HasFactory;
    protected $table = 'm_role';
    protected $primaryKey = 'id_role';
    protected $fillable = ['id_privilege', 'jenis'];
}
