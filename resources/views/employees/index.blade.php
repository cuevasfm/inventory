@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <h1>Empleados Registrados</h1>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/employee/create">Registrar Empleado </a>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-sm table-bordered border-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CATEGORÍA</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->name_employee}}</td>
                    <td>{{$employee->email_employee}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/employee/{{$employee->id}}/edit">Editar</a>
                        <a class="btn btn-primary btn-sm" href="/employee/{{$employee->id}}/assignment">Resguardo</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection