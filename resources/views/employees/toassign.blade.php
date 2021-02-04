@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row">
        <h1>Resguardo de equipo usuario No: {{$employee}} </h1>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/inventories/create">Registrar Equipo </a>
        </div>
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
                            <th scope="col">NOMBRE DE PARTE</th>
                            <th scope="col">CATEGORÍA</th>
                            <th scope="col">MARCA</th>
                            <th scope="col">MODEL</th>
                            <th scope="col">S/N</th>
                            <th scope="col">PROCESADOR</th>
                            <th scope="col">MEMORIA</th>
                            <th scope="col">ALMACENAMIENTO</th>
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
                <button type="submit" class="btn btn-primary">Asignar Equipo</button>
            </form>
        </div>
    </div>
</div>

@endsection