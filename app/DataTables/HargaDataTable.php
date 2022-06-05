<?php

namespace App\DataTables;

use App\Models\Harga;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HargaDataTable extends DataTable
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
                $action = '<button type="button" class="waves-effect btn btn-sm btn-danger" onclick="actionharga(\'' . 'hapus' . '\',\'' . $data->id . '\')">
                <i class="material-icons" style="color:white;">clear</i>
                </button>
                <button type="button" class="waves-effect btn btn-sm btn-primary" onclick="actionharga(\'' . 'edit' . '\',\'' . $data->id . '\')">
                <i class="material-icons" style="color:white;">edit</i>
                </button>';
                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Harga $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Harga $model)
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
            ->setTableId('hargadatatable-table')
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
            Column::make('harga')->title('Harga'),
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
        return 'Harga_' . date('YmdHis');
    }
}