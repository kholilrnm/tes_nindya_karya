<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MItemModel extends Model
{
    use HasFactory;
    protected $table = 'm_item';
    protected $primaryKey = 'id_item';
    protected $fillable = ['nama'];
}
