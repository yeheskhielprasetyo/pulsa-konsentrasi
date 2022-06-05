<?php

namespace App\Http\Controllers;

use App\DataTables\PelangganKonfirmasiDataTable;
use App\Models\Pelanggan;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganKonfirmasiController extends Controller
{
    public function index(PelangganKonfirmasiDataTable $dataTable)
    {
        return $dataTable->render('layouts.admin.pelanggan.index-pelanggan');
    }

    public function delete($id)
    {
        try {
            Pelanggan::where('id', $id)->delete();
            Alert::success('Berhasil!', 'menghapus pelanggan');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::warning('Gagal!', 'menghapus pelanggan');
            return redirect()->back();
        }
    }

    public function actionkonfirmasi($action, $id)
    {
        $pelanggan =  Pelanggan::where('id', $id)->first();
        if (count($pelanggan->get()) > 0) {
            if ($action == "hapus") {
                $returnHTML = view('layouts.admin.pelanggan.hapus-pelanggan', ['data' => $pelanggan])->render();
                return response()->json(['html' => $returnHTML]);
            }
        } else {
            Alert::warning('Gagal!', 'Gagal menampilkan pelanggan');
            return redirect()->back();
        }
    }
}