<?php

namespace App\DataTables;

use App\Models\Produck;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProdukDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        dd($query);
        return (new EloquentDataTable($query))
            ->eloquent($query)
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.product.edit', $row->id);
                $showUrl = route('admin.product.show', $row->id);
                $csrfToken = csrf_token();

                return "<div class='d-flex'>
                        <a href='{$editUrl}' class='text-secondary font-weight-bold text-decoration-underline pe-3'>Edit</a>
                        <a href='{$showUrl}' class='text-secondary font-weight-bold text-decoration-underline pe-3'>Detail</a>
                        <form action='#' method='POST' class='p-0'>
                            <input type='hidden' name='_token' value='{$csrfToken}'>
                            <input type='hidden' name='_method' value='DELETE'>
                            <button type='submit' class='border-0 bg-transparent text-secondary font-weight-bold text-decoration-underline'>Hapus</button>
                        </form>
                    </div>";
            })
            ->editColumn('kode_produk', function ($row) {
                return $row->produck_code ?? '-';
            })
            ->editColumn('katagori_produk', function ($row) {
                return $row->sub_katagori->katagori->nama ?? '-';
            })
            ->editColumn('sub_katagori_produk', function ($row) {
                return $row->sub_katagori->name ?? '-';
            })
            ->editColumn('nama_produk', function ($row) {
                return $row->name ?? '-';
            })
            ->editColumn('stock', function ($row) {
                return $row->data_produck->stok ?? '-';
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Produck $model): QueryBuilder
    {
        return $model->with(['sub_katagori.katagori', 'data_produck'])->select('producks.*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dataTabel')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['excel', 'csv', 'pdf'],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('NO')
                ->searchable(false)
                ->orderable(false),
            Column::make('produck_code')->title('Kode Produk'),
            Column::make('katagori_produk')->title('Katagori Produk'),
            Column::make('sub_katagori_produk')->title('Sub Katagori Produk'),
            Column::make('name')->title('Nama Produk'),
            Column::make('data_produck.stok')->title('Stock'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Produck_' . date('YmdHis');
    }
}
