<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUserModel extends Model
{
    use HasFactory;
    protected $table = 'm_user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['id_role', 'nama', 'username', 'password'];
}
