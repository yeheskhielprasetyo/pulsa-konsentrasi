<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Operator;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $harga = Harga::all()->count();
        $operator = Operator::all()->count();
        $pelanggan = Transaksi::all()->count();

        return view('layouts.admin.dashboard.dashboard', [
            'harga' => $harga,
            'operator' => $operator,
            'pelanggan' => $pelanggan
        ]);
    }
}
