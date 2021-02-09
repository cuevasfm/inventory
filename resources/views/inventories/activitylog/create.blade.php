@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <h1>Crear registro de bitácotra de inventario: {{$inventories_id}}</h1>
    </div>
    <br>
    <div class="row">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="">
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
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" class="form-control-plaintext" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Despcripción</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </div>
</div>

@endsection