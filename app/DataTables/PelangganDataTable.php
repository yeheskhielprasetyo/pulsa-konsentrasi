<?php

namespace App\DataTables;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Illuminate\Database\Query\Builder;
use Yajra\DataTables\Html\Column;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PelangganDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                $action = ' <button type="button" class="waves-effect btn btn-sm btn-primary" onclick="actionpelanggan(\'' . 'konfirmasi' . '\',\'' . $data->id . '\')">
                <i class="material-icons" style="color:white;">done</i>
                </button>
                <a href="pelanggan/detail/' . $data->id . '" class="waves-effect btn btn-sm btn-success">
                <i class="material-icons" style="color:white;">visibility</i>
                </a>
                <button type="button" class="waves-effect btn btn-sm btn-danger" onclick="actionpelanggan(\'' . 'hapus' . '\',\'' . $data->id . '\')">
                <i class="material-icons" style="color:white;">clear</i>
                </button>';
                return $action;
            })
            ->addColumn('id_user', function ($data) {
                return $data->user->name;
            })
            ->addColumn('id_operator', function ($data) {
                return $data->operator->nama_operator;
            })
            ->addColumn('gambar', function ($data) {
                if ($data->gambar > 0) {
                    $file = "bukti_pembayaran/" . $data->gambar;
                    return '<a href=' . asset($file) . ' target="_blank">' . '<img class="mg-thumbnail" width="100" height="70" src=' . asset($file) . '>' . '</a>';
                } else {
                    return "Tidak Ada";
                }
            })
            ->addColumn('status', function ($data) {
                $pelanggan = Pelanggan::where('id_transaksi_pulsa', $data->id)->first();
                if ($pelanggan == null) {
                    return "PENDING";
                } else {
                    return "SUCCESS";
                };
            })
            ->addColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->translatedFormat('l, d F Y');
            })
            ->rawColumns(['gambar', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Transaksi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transaksi $model)
    {
        // $models = $model->user->name;
        // $nilai = DB::table('users')->distinct()->pluck('name');
        // $sh = Transaksi::get('id_user');
        // $tes  = Transaksi::where('id_user', '!=', $sh)
        // // ->where('status', '!=', '4')
        // ->orderBy('id');
        // ->paginate(18, ['*'], 'faults_page');
        // $tes  = Transaksi::all();
        // $show = DB::table('transaksis')
        //             ->select('id_user', DB::raw('count(`id_user`) as occurences'))
        //             ->groupBy('id_user')
        //             ->having('occurences', '>', 1);
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('pelanggandatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->orderBy(0, 'desc')
            ->autoWidth(false);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title' => 'No', 'orderable' => true, 'searchable' => true, 'render' => function () {
                return 'function(data,type,fullData,meta){return meta.settings._iDisplayStart+meta.row+1;}';
            }],
            Column::make('id_user')->title('Nama Pembeli'),
            Column::make('gambar')->title('Bukti Pembayaran'),
            Column::make('status')->title('Status'),
            Column::make('created_at')->title('Tanggal'),
            Column::computed('action')
                ->exportable(FALSE)
                ->printable(FALSE)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Pelanggan_' . date('YmdHis');
    }
}
