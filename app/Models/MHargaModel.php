<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MHargaModel extends Model
{
    use HasFactory;
    protected $table = 'm_harga';
    protected $primaryKey = 'id_harga';
    protected $fillable = ['id_item', 'harga'];
}
