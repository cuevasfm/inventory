@extends('layouts.base')
@section('content')
<div class="row">
    <h1>Partes registradas</h1>
</div>
<div class="row">
    <a class="btn btn-primary" href="/inventories/create">Registrar </a>
</div>
<div class="row">
    <table class="table table-sm table-bordered" style="font-size: 12px;">
        <thead align="center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Parte</th>
                <th scope="col">Categoría</th>
                <th scope="col">Marca</th>
                <th scope="col">Model</th>
                <th scope="col">S/N</th>
                <th scope="col">Procesador</th>
                <th scope="col">Memoria</th>
                <th scope="col">Almacenamiento</th>
                <th scope="col">Asignado</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody style="font-size: 11px;">
            @foreach($inventories as $inventory)
            <tr>
                <th scope="row"><a href="/inventories/{{$inventory->id}}">{{$inventory->id}}</a></th>
                <td><a href="/inventories/{{$inventory->id}}">{{$inventory->inventory_name}}</a></td>
                <td>{{$inventory->name_category}}</td>
                <td>{{$inventory->name_brand}}</td>
                <td>{{$inventory->model}}</td>
                <td>{{$inventory->sn}}</td>
                <td>{{$inventory->processor}}</td>
                <td>{{$inventory->memory}}</td>
                <td>{{$inventory->storage}}</td>
                <td><a href="/employee/{{$inventory->employee_id}}/assignment">{{$inventory->name_employee}}</a></td>
                <td><a href="/inventories/{{$inventory->id}}/edit" class="btn btn-primary btn-sm">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection