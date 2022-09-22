<?php

namespace App\Http\Controllers;

use App\Models\MUomModel;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function index()
    {
        $data = MUomModel::join('m_item', 'm_uom.id_item', '=', 'm_item.id_item')->get();

        return view('stock.stock', compact('data'));
    }
}
