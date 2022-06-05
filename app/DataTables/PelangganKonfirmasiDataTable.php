<?php

namespace App\DataTables;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PelangganKonfirmasiDataTable extends DataTable
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
                $action = '<button type="button" class="waves-effect btn btn-sm btn-danger" onclick="actionkonfirmasi(\'' . 'hapus' . '\',\'' . $data->id . '\')">
                <i class="material-icons" style="color:white;">clear</i>
                </button>';
                return $action;
            })
            ->addColumn('id_transaksi_pulsa', function ($data) {
                return $data->transaksi->user->name . ' | ' . 'Operator' . ' ' .  $data->transaksi->operator->nama_operator . ' | ' . ' Total Harga ' . 'Rp.' .  $data->transaksi->total_harga;
            })
            ->addColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->translatedFormat('l, d F Y');
            })
            ->addColumn('id', function ($data) {
                if ($data->transaksi->gambar > 0) {
                    $file = "bukti_pembayaran/" . $data->transaksi->gambar;
                    return '<a href=' . asset($file) . ' target="_blank">' . '<img class="mg-thumbnail" width="100" height="70" src=' . asset($file) . '>' . '</a>';
                } else {
                    return "Tidak Ada";
                }
            })
            ->rawColumns(['id', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pelanggan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pelanggan $model)
    {
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
            ->setTableId('pelanggankonfirmasidatatable-table')
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

            Column::make('id_transaksi_pulsa')->title('Keterangan'),
            Column::make('id')->title('Bukti Pembayaran'),
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
        return 'PelangganKonfirmasi_' . date('YmdHis');
    }
}
