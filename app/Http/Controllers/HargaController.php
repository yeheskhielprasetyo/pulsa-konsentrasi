<?php

namespace App\Http\Controllers;

use App\DataTables\HargaDataTable;
use App\Models\Harga;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HargaDataTable $dataTable)
    {
        return $dataTable->render('layouts.admin.harga.index');
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
        $request->validate([
            'harga' => 'required'
        ]);

        try {
            $harga = new Harga();
            $harga->harga = $request->harga;
            $harga->save();
            Alert::success('Berhasil!', 'menambah data harga');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'menambah data harga');
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
            $harga = Harga::find($id);
            $harga->harga = $request->harga;
            $harga->save();
            Alert::success('Berhasil!', 'merubah data harga');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'merubah data harga');
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
            Harga::where('id', $id)->delete();
            Alert::success('Berhasil!', 'menghapus data harga');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'menghapus data harga');
            return redirect()->back();
        }
    }


    public function actionharga($action, $id)
    {
        $harga =  Harga::where('id', $id)->first();
        if (count($harga->get()) > 0) {
            if ($action == "hapus") {
                $returnHTML = view('layouts.admin.harga.hapus', ['data' => $harga])->render();
                return response()->json(['html' => $returnHTML]);
            } elseif ($action == "edit") {
                $returnHTML = view('layouts.admin.harga.edit', ['data' => $harga])->render();
                return response()->json(['html' => $returnHTML]);
            }
        } else {
            Alert::warning('Gagal!', 'Gagal menampilkan data harga');
            return redirect()->back();
        }
    }
}