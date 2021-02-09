@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row">
        <h1>Partes registradas</h1>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/inventories/create">Registrar </a>
        </div>
    </div>


    <div class="row">
        <table id="table" data-show-pagination-switch="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-show-toggle="true" data-show-fullscreen="true" data-page-list="[10, 25, 50, 100, all]" data-toggle="table" data-url="/inventories/data/json" data-search="true" data-buttons-class="primary" data-pagination-v-align="both" data-auto-refresh="true" data-toolbar="#toolbar" data-trim-on-search="false" data-locale="es-MX" style="font-size: 12px;">
            <thead>
                <tr>
                    <th data-field="id">ID</th>
                    <th data-field="inventory_name" data-formatter="operateInventoryName" data-events="operateEvents">NOMBRE EN INVENTARIO</th>
                    <th data-field="name_category">CATEGORÍA</th>
                    <th data-field="name_brand">MARCA</th>
                    <th data-field="model">MODEL</th>
                    <th data-field="sn">No. SERIE</th>
                    <th data-field="processor">PROCESADOR</th>
                    <th data-field="memory">MEMORIA</th>
                    <th data-field="storage">ALMACENAMIENTO</th>
                    <th data-formatter="operateEmployee" data-events="operateEvents">EMPLEADO</th>
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
        }else{
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
        }
        ,
        'click .activity_log': function(e, value, row, index) {
            window.open('/inventories/activitylog/' + row.id + '/create', '_self')
        }
    }
</script>

@endsection