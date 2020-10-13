@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col">
        <h1>
            Registro de categorias
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
        <form method="POST" action="/config/categories">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationDefault01">Categoría</label>
                    <input type="text" class="form-control" name="category" required id="validationDefault01" placeholder="Nombre de la categoría" value="{{old('category')}}">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Guardar</button>

        </form>
    </div>

</div>
@endsection