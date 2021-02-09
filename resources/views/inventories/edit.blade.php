@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Edición de inventario ID: {{$inventories->id}}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form method="POST" action="/inventories/{{$inventories->id}}">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputInventoryName">Nombre de parte</label>
                        <input type="text" class="form-control" value="{{$inventories->inventory_name}}" id="inputInventoryName" placeholder="IMAC 27, LAPTOP TOSHIBA, LAPTOP DELL, MOUSE INALAMBRICO, ETC." name="inventory_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputState">Categoría</label>
                        <select id="inputState" class="form-control" name="category_id" required>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$inventories->category_id == $category->id ? 'selected="selected"' : '' }}>{{$category->name_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Marca</label>
                        <select id="inputState" class="form-control" name="brand_id">
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{$inventories->brand_id == $brand->id ? 'selected="selected"' : '' }}>{{$brand->name_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputModel">Modelo</label>
                        <input type="text" class="form-control" value="{{$inventories->model}}" id="inputModel" name="model" value="N/A" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">S/N (Número de Serie)</label>
                        <input type="text" class="form-control" value="{{$inventories->sn}}" id="inputAddress" value="N/A" name="sn" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Procesador</label>
                        <input type="text" class="form-control" value="{{$inventories->processor}}" id="inputCity" value="N/A" name="processor">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Memoria</label>
                        <input type="text" class="form-control" value="{{$inventories->memory}}" id="inputCity" value="N/A" name="memory">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputZip">Disco Duro</label>
                        <input type="text" class="form-control" value="{{$inventories->storage}}" id="inputZip" value="N/A" name="storage">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputZip">Wifi</label>
                        <select id="inputState" class="form-control" name="wifi">
                            <option value="N/A" {{$inventories->wifi == 'N/A' ? 'selected="selected"' : '' }}>N/A</option>
                            <option value="YES" {{$inventories->wifi == 'YES' ? 'selected="selected"' : '' }}>Si</option>
                            <option value="NO" {{$inventories->wifi == 'NO' ? 'selected="selected"' : '' }}>No</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Resolución</label>
                        <input type="text" class="form-control" value="{{$inventories->resolution}}" id="inputCity" value="N/A" name="resolution" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Tamaño pantalla</label>
                        <input type="text" class="form-control" id="inputCity" value="{{$inventories->screen_size}}" value="N/A" name="screen_size" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Fecha de compra</label>
                        <input type="date" class="form-control" id="inputZip" value="{{date('Y-m-d', strtotime($inventories->date_purchase))}}" name="date_purchase" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">Especificaciones adicionales</label>
                        <textarea class="form-control" rows="3" id="inputCity" name="data_add">{{$inventories->data_add}}</textarea>
                        <!--  <input type="text" class="form-control" value="{{$inventories->data_add}}" id="inputCity" name="data_add"> -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>

    </div>
</div>

@endsection