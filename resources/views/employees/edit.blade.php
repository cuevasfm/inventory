@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Editar información del empleado No: {{$employees->id}}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form method="POST" action="/employee/{{$employees->id}}">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="editemployee">Marca</label>
                        <input type="text" class="form-control" name="name_employee" required id="editemployee" placeholder="{{$employees->name_employee}} " value="{{old('name_employee', $employees->name_employee )}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputEmail">E-Mail</label>
                        <input type="text" class="form-control" name="email_employee" required id="inputEmail" placeholder="{{$employees->email_employee}} " value="{{old('email_employee', $employees->email_employee)}}">
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Guardar</button>

            </form>
        </div>
    </div>
</div>

@endsection