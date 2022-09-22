<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUomModel extends Model
{
    use HasFactory;
    protected $table = 'm_uom';
    protected $primaryKey = 'id_uom';
    protected $fillable = ['id_item', 'qty'];
}
