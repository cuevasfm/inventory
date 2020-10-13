@extends('layouts.base')
@section('content')
<div class="row">
    <h1>Partes registradas</h1>
</div>
<div class="row">
    <a class="btn btn-primary" href="/inventory/new">Registrar </a>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Parte</th>
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
                <td>{{$part->brand_id}}</td>
                <td>{{$part->model}}</td>
                <td>{{$part->sn}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection