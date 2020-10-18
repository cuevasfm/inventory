@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col">
        <h1>
            Registro de inventario
        </h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <form method="POST" action="/inventory/new">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputCity">Nombre de parte</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="IMAC 27, LAPTOP TOSHIBA, LAPTOP DELL, MOUSE INALAMBRICO, ETC." name="name_part" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputState">Categoría</label>
                    <select id="inputState" class="form-control" name="category_id" required>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Marca</label>
                    <select id="inputState" class="form-control" name="brand_id">
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name_brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputModel">Modelo</label>
                    <input type="text" class="form-control" id="inputModel" name="model" value="N/A" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress">S/N (Número de Serie)</label>
                    <input type="text" class="form-control" id="inputAddress" value="N/A" name="sn" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Procesador</label>
                    <input type="text" class="form-control" id="inputCity" value="N/A" name="processor">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Memoria</label>
                    <input type="text" class="form-control" id="inputCity" value="N/A" name="memory">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Disco Duro</label>
                    <input type="text" class="form-control" id="inputZip" value="N/A" name="storage">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Wifi</label>
                    <select id="inputState" class="form-control" name="wifi">
                        <option value="N/A">N/A</option>
                        <option value="YES">Si</option>
                        <option value="NO">No</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">Resolución</label>
                    <input type="text" class="form-control" id="inputCity" value="N/A" name="resolution" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Tamaño pantalla</label>
                    <input type="text" class="form-control" id="inputCity" value="N/A" name="screen_size" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Fecha de compra</label>
                    <input type="date" class="form-control" id="inputZip" name="date_purchase" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputCity">Especificaciones adicionales</label>
                    <input type="text" class="form-control" id="inputCity" name="data_add">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</div>
@endsection