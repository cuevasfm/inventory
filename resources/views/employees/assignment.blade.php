@extends('layouts.base')
@section('content')
<div class="row">
    <h1>Resguardo de equipo</h1>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="/employee">Ver Empleados </a>
    </div>
</div>
<br>
<div class="container">
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
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/employee/{{$data->id}}/toassign">Asignar equipo </a>
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
                    <th scope="col">S/N</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventories as $inventory)
                <tr>
                    <th scope="row">{{$inventory->id}}</th>
                    <td><a href="/inventories/{{$inventory->id}}">{{$inventory->inventory_name}} </a> </td>
                    <td>{{$inventory->name_category}}</td>
                    <td>{{$inventory->name_brand}}</td>
                    <td>{{$inventory->model}}</td>
                    <td>{{$inventory->sn}}</td>
                    <td><a href="/employee/{{$inventory->id}}/{{$data->id}}/unassign" class="btn btn-sm btn-danger">Des-Asignar</a></td>
                    @endforeach
            </tbody>
        </table>
    </div>
    <hr>

    <div class="card-columns">
        @foreach($inventories as $inventory)
        @if($inventory->img != null)
        <div class="card p-3">
            <img src="/images/{{$inventory->img}}" class="card-img-top" alt="...">
            <div class="card-body">
                <p>#{{$inventory->id}} {{$inventory->inventory_name}} </p>
            </div>
        </div>
        @endif

        @endforeach

    </div>
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
</div>

@endsection