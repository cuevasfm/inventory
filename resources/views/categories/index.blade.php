@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <h1>Categorías registradas</h1>
    </div>
    <div class="row">
        <div>
            <a class="btn btn-primary" href="/config/categories/new">Registrar categoría </a>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-bordered border-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CATEGORÍAS</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name_category}}</td>
                    <td><a class="btn btn-primary btn-sm" href="/config/categories/{{$category->id}}/edit">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection