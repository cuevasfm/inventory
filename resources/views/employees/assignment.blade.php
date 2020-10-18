@extends('layouts.base')
@section('content')
<div class="row">
    <h1>Resguardo de equipo</h1>
</div>
<div class="row">
    <a class="btn btn-primary" href="/employee/create">Asignar equipo </a>
</div>
<br>
<div class="row">
    <div class="col">
        <dl class="row">
            <dt class="col-sm-3">Empleado</dt>
            <dd class="col-sm-9">{{$data->name_employee}}</dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{$data->email_employee}}</dd>
        </dl>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Dispositivos Asignados</h3>
    </div>
</div>
<div class="row">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Parte</th>
                <th scope="col">Categoría</th>
                <th scope="col">Marca</th>
                <th scope="col">Model</th>
                <th scope="col">S/N</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parts as $part)
            <tr>
                <th scope="row">{{$part->id}}</th>
                <td>{{$part->name_part}}</td>
                <td>{{$part->name_category}}</td>
                <td>{{$part->name_brand}}</td>
                <td>{{$part->model}}</td>
                <td>{{$part->sn}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr>
<div class="row">
    <div class="col">
        <h3>Histórico</h3>
    </div>
</div>
<div class="row">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">id_assignment</th>
                <th scope="col">id_part</th>
                <th scope="col">state</th>
                <th scope="col">created_at</th>
            </tr> 
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
            <tr>
                <th scope="row">{{$assignment->id}}</th>
                <td>{{$assignment->id_part}}</td>
                <td>{{$assignment->state}}</td>
                <td>{{$assignment->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection