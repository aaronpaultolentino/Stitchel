<?php

namespace App\DataTables\Modules\Integrations;

use App\Integrations;
use App\DataTables\BaseDatatable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IntegrationsDataTable extends BaseDatatable
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
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Modules/IntegrationsDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Integration $model)
    {
        return $this->getQuery();
    }

    

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('user_id'),
            Column::make('type'),
            Column::make('data'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(20)
            //     ->addClass('text-center')
            //     ->title(''),
        ];
    }

    /**
     * Get default builder parameters.
     *
     * @return array
     */
    protected function getBuilderParameters()
    {
        return [
            'dom' => 'B<"row">lfrtip', //Bfrtip
            'processing' => false,
            "pageLength" => 25,
            'language' => [
                'paginate' => [
                    'previous' => '<',
                    'next' => '>',
                ],
            'order' => [[count($this->getColumns()) - 2, 'desc']],
            'buttons' => [
                //     'create',
                //     'csv',
                //     // 'print',
                //     'reset',
                //     'reload',
            ],
            'drawCallback' => "function (){
                                $('div.dataTables_filter input').attr({
                                    'autocomplete': 'off',
                                    'autocorrect': 'off',
                                    'autocapitalize': 'off',
                                    'spellcheck': 'off',
                                });
                                $('body').loading('stop');
                            }",
            'preDrawCallback' => "function (){
                                $('body').loading();
                            }",
            'infoCallback' => "function (settings, start, end, max, total, pre){
                                return '<b>'+ total +'</b> results';
                            }",
        ];
    }
}
