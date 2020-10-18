@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col">
        <h1>
            Registro de empleado
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
        <form method="POST" action="/employee">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="inputEmployee">Nombre Empleado</label>
                    <input type="text" class="form-control" name="name_employee" required id="inputEmployee" placeholder="Pedro Gomez" value="{{old('name_employee')}}" autofocus>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="inputEmail">E-Mail</label>
                    <input type="text" class="form-control" name="email_employee" required id="inputEmail" placeholder="pedro@dospuntas.com.mx" value="{{old('email_employee')}}">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Guardar</button>

        </form>
    </div>

</div>
@endsection