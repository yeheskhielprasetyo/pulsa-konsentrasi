<?php

namespace App\Http\Controllers;

use App\DataTables\PelangganDataTable;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tran = Transaksi::select('id_user')->get();
        $transaksi = $tran->unique('id_user');
        // $ $transaksi = Transaksi::where('id_user', $id)->get();
        // dd($transaksi);
        return view('layouts.admin.pelanggan.index', [
            'transaksi' => $transaksi,
            // 'transaksis' => $transaksis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Transaksi::where('id', $id)->delete();
            Alert::success('Berhasil!', 'menghapus data transaksi');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'menghapus data transaksi');
            return redirect()->back();
        }
    }

    public function actionpelanggan($action, $id)
    {
        $transaksi =  Transaksi::where('id', $id)->first();
        if (count($transaksi->get()) > 0) {
            if ($action == "hapus") {
                $returnHTML = view('layouts.admin.pelanggan.hapus', ['data' => $transaksi])->render();
                return response()->json(['html' => $returnHTML]);
            } elseif ($action == "konfirmasi") {
                $returnHTML = view('layouts.admin.pelanggan.konfirmasi', ['data' => $transaksi])->render();
                return response()->json(['html' => $returnHTML]);
            } elseif ($action == "detail") {
                return view('layouts.admin.pelanggan.detail', ['data' => $transaksi]);
            }
        } else {
            Alert::warning('Gagal!', 'Gagal menampilkan data transaksi');
            return redirect()->back();
        }
    }

    public function konfirmasi(Request $request, $id)
    {
        try {
            $transaksi = Transaksi::find($id);
            $konfirmasi = new Pelanggan();
            $konfirmasi->id_transaksi_pulsa = $transaksi->id;
            $konfirmasi->status = "Konfirmasi";
            $konfirmasi->save();
            Alert::success('Berhasil!', 'konfirmasi');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'konfirmasi');
            return redirect()->back();
        }
    }

    public function detailpelanggan($id)
    {
        // $transaksis = Transaksi::all();
        // dd($transaksis);
        $transaksi = Transaksi::where('id_user', $id)->get();
        // $transaksis = Transaksi::with('user')->get();
        return view('layouts.admin.pelanggan.detail', [
            'tes' => $transaksi
        ]);
    }
}
