@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Editar marca No. {{$brands->id}}, {{$brands->name_brand}}
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
            <form method="POST" action="/config/brands/{{$brands->id}}">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="editBrand">Marca</label>
                        <input type="text" class="form-control" name="name_brand" required id="editBrand" placeholder="{{$brands->name_brand}} " value="{{old('name_brand')}}">
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Guardar</button>

            </form>
        </div>

    </div>
</div>
@endsection