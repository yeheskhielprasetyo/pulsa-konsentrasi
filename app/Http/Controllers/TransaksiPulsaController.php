<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiPulsaDataTable;
use App\Models\Harga;
use App\Models\Operator;
use App\Models\Stock;
use App\Models\Transaksi;
use App\Models\TransaksiPulsa;
use App\Models\User;
use Exception;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiPulsaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransaksiPulsaDataTable $dataTable)
    {
        return $dataTable->render('layouts.user.transaksi.history');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operator = Operator::all();
        return view('layouts.user.transaksi.index', [
            'operator' => $operator,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
            'no_hp' => 'required'
        ]);

        try {
            $user = Auth::user()->id;
            $operator = Operator::find($request->operator);
            $transaksi = new Transaksi();
            $transaksi->id_user = $user;
            $transaksi->id_operator = $request->operator;
            $transaksi->jumlah = $request->jumlah;
            $transaksi->no_hp = $request->no_hp;
            $transaksi->total_harga = $operator->harga->harga *= $request->jumlah;
            if ($request->jumlah >= $operator->stock) {
                Alert::warning('Gagal!', 'Stock Sudah Habis');
                return redirect()->back();
            } else {
                $operator->stock -= $request->jumlah;
            }
            $operator->save();
            $transaksi->save();
            Alert::success('Berhasil!', 'menambah data transaksi');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'menambah data transaksi');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try {
            $user = Auth::user()->id;
            $transaksi = Transaksi::find($id);
            $transaksi->id_user = $user;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move(public_path() . '/bukti_pembayaran', $filename);
                $filehapus = public_path('/bukti_pembayaran/') . $transaksi->gambar;
                if (file_exists($filehapus)) {
                    // hapus file di folder assets
                    @unlink($filehapus);
                }
                $transaksi->gambar = $filename;
            }
            $transaksi->save();
            Alert::success('Berhasil!', 'menambah data transaksi');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'menambah data transaksi');
            return redirect()->back();
        }
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

    public function actiontransaksi($action, $id)
    {
        $operator = Operator::all();
        $transaksi =  Transaksi::where('id', $id)->first();
        if (count($transaksi->get()) > 0) {
            if ($action == "hapus") {
                $returnHTML = view('layouts.user.transaksi.hapus', ['data' => $transaksi])->render();
                return response()->json(['html' => $returnHTML]);
            } elseif ($action == "edit") {
                $returnHTML = view('layouts.user.transaksi.edit', ['data' => $transaksi])->render();
                return response()->json(['html' => $returnHTML]);
            }
        } else {
            Alert::warning('Gagal!', 'Gagal menampilkan data transaksi');
            return redirect()->back();
        }
    }
}