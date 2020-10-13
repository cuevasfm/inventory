@extends('layouts.base')
@section('content')
<div class="row">
    <h1>Categorías registradas</h1>
</div>
<div class="row">
    <a class="btn btn-primary" href="/config/categories/new">Registrar categoría </a>
</div>
<br>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Categoría</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name_category}}</td>
                <td><a class="btn btn-primary" href="/config/categories/{{$category->id}}/edit">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection