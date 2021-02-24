@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row">
        <h1 class="display-4">Inventario registrado</h1>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/inventories/create">Registrar 🆕</a>
        </div>
    </div>


    <div class="row">
        <table id="table" data-show-pagination-switch="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-show-toggle="true" data-show-fullscreen="true" data-page-list="[10, 25, 50, 100, all]" data-toggle="table" data-url="/inventories/data/json" data-search="true" data-buttons-class="primary" data-pagination-v-align="both" data-auto-refresh="true" data-toolbar="#toolbar" data-trim-on-search="true" data-locale="es-MX" data-show-export="true" data-show-refresh="true" data-auto-refresh="true" data-mobile-responsive="true" data-check-on-init="true" style="font-size: 12px;">
            <thead>
                <tr>
                    <th data-field="id" data-sortable="true">ID</th>
                    <th data-field="inventory_name" data-formatter="operateInventoryName" data-events="operateEvents" data-sortable="true">NOMBRE EN INVENTARIO</th>
                    <th data-field="name_category" data-sortable="true">CATEGORÍA</th>
                    <th data-field="name_brand" data-sortable="true">MARCA</th>
                    <th data-field="model" data-sortable="true">MODEL</th>
                    <th data-field="sn" data-sortable="true">No. SERIE</th>
                    <th data-field="processor" data-sortable="true">PROCESADOR</th>
                    <th data-field="memory" data-sortable="true">MEMORIA</th>
                    <th data-formatter="operateEmployee" data-events="operateEvents" data-sortable="true">EMPLEADO</th>
                    <th data-formatter="operateEdit" data-events="operateEvents"></th>
                    <th data-formatter="operateActivityLog" data-events="operateEvents"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    function operateInventoryName(value, row, index) {
        return [
            '<a class="inventory_name" href="javascript:void(0)" title="Like">',
            '' + row.inventory_name + '',
            '</a>  '
        ].join('')
    }

    function operateEmployee(value, row, index) {
        if (row.name_employee != null) {
            return [
                '<a class="employee" href="javascript:void(0)" title="Like">',
                '' + row.name_employee + '',
                '</a>  '
            ].join('')
        } else {
            return [
                'Sin Usuario',
            ].join('')
        }
    }

    function operateEdit(value, row, index) {
        return [
            '<a class="edit btn btn-light btn-sm" href="javascript:void(0)" title="Editar">',
            '✏️',
            '</a>  '
        ].join('')
    }

    function operateActivityLog(value, row, index) {
        return [
            '<a class="activity_log btn btn-light btn-sm" href="javascript:void(0)" title="Bitácora del Inventario">',
            '🔧',
            '</a>  '
        ].join('')
    }

    window.operateEvents = {
        'click .employee': function(e, value, row, index) {
            window.open('/employee/' + row.employee_id + '/assignment', '_self')
        },
        'click .inventory_name': function(e, value, row, index) {
            window.open('/inventories/' + row.id, '_self')
        },
        'click .edit': function(e, value, row, index) {
            window.open('/inventories/' + row.id + '/edit', '_self')
        },
        'click .activity_log': function(e, value, row, index) {
            window.open('/inventories/activitylog/' + row.id + '/create', '_self')
        }
    }
</script>

@endsection