@extends('layouts.base')
@section('content')
<div class="row">
    <h1>Resguardo de equipo usuario No: {{$employee}} </h1>
</div>
<div class="row">
    <a class="btn btn-primary" href="/employee/create">Asignar equipo </a>
</div>
<br>
<div class="row">
    <div class="col">
        <form action="/employee/{{$employee}}/toassign" method="POST">
        @csrf
        @method('put')
            <table class="table table-sm table-bordered">
                <thead align="center">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Parte</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Model</th>
                        <th scope="col">S/N</th>
                        <th scope="col">Procesador</th>
                        <th scope="col">Memoria</th>
                        <th scope="col">Almacenamiento</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px;">
                    @foreach($inventories as $inventory)
                    <tr>
                        <td><input class="form-check" type="checkbox" name="d[]" value="{{$inventory->id}}" id="defaultCheck1"></td>
                        <td scope="row">{{$inventory->id}}</td>
                        <td>{{$inventory->inventory_name}}</td>
                        <td>{{$inventory->name_category}}</td>
                        <td>{{$inventory->name_brand}}</td>
                        <td>{{$inventory->model}}</td>
                        <td>{{$inventory->sn}}</td>
                        <td>{{$inventory->processor}}</td>
                        <td>{{$inventory->memory}}</td>
                        <td>{{$inventory->storage}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>
</div>
@endsection