@extends('layouts.base')
@section('content')
<div class="row">
    <form method="POST" action="/inventory/new">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputCity">Nombre de parte</label>
                <input type="text" class="form-control" id="inputCity" value="N/A" name="name" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputState">Categoría</label>
                <select id="inputState" class="form-control" name="category" required>
                    <option value="CPU">CPU</option>
                    <option value="">Laptop</option>
                    <option value="">Unidad almacenamiento</option>
                    <option value="">Periferico</option>
                    <option value="">Impresión</option>
                    <option value="">Monitor</option>
                    <option value="">Redes</option>
                    <option value="">Televisión</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Marca</label>
                <select id="inputState" class="form-control" name="brand">
                    <option value="Generico">Generic</option>
                    <option>Logitech</option>
                    <option value="">Asus</option>
                    <option value="">HP</option>
                    <option value="">Dell</option>
                    <option value="">Apple</option>
                    <option value="">LG</option>
                    <option value="">Toshiba</option>
                    <option value="">Samsung</option>
                    <option value="">Lenovo</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputModel">Modelo</label>
                <input type="text" class="form-control" id="inputModel" name="model" value="N/A" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">S/N (Número de Serie)</label>
                <input type="text" class="form-control" id="inputAddress" value="N/A" required>
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
                    <option value="na">N/A</option>
                    <option>Si</option>
                    <option>No</option>
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
                <input type="text" class="form-control" id="inputCity" value="N/A" name="screensize" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Fecha de compra</label>
                <input type="date" class="form-control" id="inputZip" name="date_purscharse" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputCity">Especificaciones adicionales</label>
                <input type="text" class="form-control" id="inputCity" value="N/A" name="specs">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection