<?php

namespace App\DataTables;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\TransaksiPulsa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use function GuzzleHttp\Promise\all;

class TransaksiPulsaDataTable extends DataTable
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
                $action = '<button type="button" class="waves-effect btn btn-sm btn-danger" onclick="actiontransaksi(\'' . 'hapus' . '\',\'' . $data->id . '\')">
                <i class="material-icons" style="color:white;">clear</i>
                </button>
                <button type="button" class="waves-effect btn btn-sm btn-primary" onclick="actiontransaksi(\'' . 'edit' . '\',\'' . $data->id . '\')">
                <i class="material-icons" style="color:white;">upload</i>
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
            ->addColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->translatedFormat('l, d F Y');
            })
            ->addColumn('status', function ($data) {
                $pelanggan = Pelanggan::where('id_transaksi_pulsa', $data->id)->first();
                if ($pelanggan == null) {
                    return "PENDING";
                } else {
                    return "SUCCESS";
                };
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
        $user = Auth::user()->id;
        // $users = User::where('id_user', $user)->get();
        return $model->newQuery()->where('id_user', $user);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('transaksipulsadatatable-table')
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
            Column::make('id_operator')->title('Nama Operator'),
            Column::make('jumlah')->title('Jumlah'),
            Column::make('no_hp')->title('No Hp'),
            Column::make('total_harga')->title('Total Harga'),
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
        return 'TransaksiPulsa_' . date('YmdHis');
    }
}