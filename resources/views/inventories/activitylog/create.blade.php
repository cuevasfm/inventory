@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <h1>Crear registro de bitácotra de inventario: {{$inventories_id}}</h1>
    </div>
    <br>
    <div class="row">
        <form action="/inventories/activitylog/{{$inventories_id}}/create" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="inputSelectType" class="col-sm-3 col-form-label"><strong>Tipo de Servicio</strong></label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="" id="inputSelectType" name="type">
                        <option value="MAINTENANCE">MANTENIMIENTO</option>
                        <option value="REPAIR">REPARACIÓN</option>
                        <option value="HARDWARE UPGRADE">ACTUALIZACIÓN HARDWARE</option>
                        <option value="HARDWARE DOWNGRADE">DEGRADACIÓN HARDWARE</option>
                        <option value="BACKUP">RESPALDO</option>
                        <option value="DAMAGED EQUIPMENT">EQUIPO DAÑADO</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date" class="col-sm-3 col-form-label"><strong>Fecha</strong></label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="date" name="date">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputDescription" class="col-sm-3 col-form-label"><strong>Descripción</strong></label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="inputDescription" rows="3" name="description"></textarea>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Guardar Registro</button>
        </form>
    </div>
</div>

@endsection