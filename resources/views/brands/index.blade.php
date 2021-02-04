@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row">
        <h1>Marcas registradas</h1>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/config/brands/new">Registrar Marca </a>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-bordered border-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">MARCA</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td>{{$brand->name_brand}}</td>
                    <td><a class="btn btn-primary btn-sm" href="/config/brands/{{$brand->id}}/edit">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection