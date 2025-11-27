<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Category> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('image', function ($row) {
                return '<img src="'.asset($row->image).'" width="100" />';
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->diffForHumans() : 'N/A';
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at ? $row->updated_at->diffForHumans() : 'N/A';
            })
            ->addColumn('action', function ($row) {
                return view('backend.layouts.blog-category.action', compact('row'));
            })
            ->setRowId('id')
            ->rawColumns([ 'image', 'name']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Category>
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'buttons' => [
                            'copy', 'csv', 'excel',
                        ],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('image'),
            Column::make('name'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'Category_' . date('YmdHis');
    }
}
