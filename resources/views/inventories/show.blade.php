@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4">Artículo de inventario: {{$id}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/inventories">Listado </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <dl class="row">
                    @foreach($inventories as $inventory)
                    <dt class="col-sm-3">NOMBRE DE PARTE</dt>
                    <dd class="col-sm-9">{{$inventory->inventory_name}}</dd>
                    <dt class="col-sm-3">CATEGORÍA</dt>
                    <dd class="col-sm-9">{{$inventory->name_category}}</dd>
                    <dt class="col-sm-3">MARCA</dt>
                    <dd class="col-sm-9">{{$inventory->name_brand}}</dd>
                    <dt class="col-sm-3">MODELO</dt>
                    <dd class="col-sm-9">{{$inventory->model}}</dd>
                    <dt class="col-sm-3">S/N</dt>
                    <dd class="col-sm-9">{{$inventory->sn}}</dd>
                    <dt class="col-sm-3">PROCESADOR</dt>
                    <dd class="col-sm-9">{{$inventory->processor}}</dd>
                    <dt class="col-sm-3">MEMORIA</dt>
                    <dd class="col-sm-9">{{$inventory->memory}}</dd>
                    <dt class="col-sm-3">ALMACENAMIENTO</dt>
                    <dd class="col-sm-9">{{$inventory->storage}}</dd>
                    <dt class="col-sm-3">ASIGNADO</dt>
                    <dd class="col-sm-9"><a href="/employee/{{$inventory->employee_id}}/assignment">{{$inventory->name_employee}}</a> </dd>
                    <dt class="col-sm-3">WIFI</dt>
                    <dd class="col-sm-9">{{$inventory->wifi}}</dd>
                    <dt class="col-sm-3">RESOLUCIÓN</dt>
                    <dd class="col-sm-9">{{$inventory->resolution}}</dd>
                    <dt class="col-sm-3">TAMAÑO PANTALLA</dt>
                    <dd class="col-sm-9">{{$inventory->screen_size}}</dd>
                    <dt class="col-sm-3">ADICIONALES</dt>
                    <dd class="col-sm-9">{{nl2br(e($inventory->data_add))}}</dd>
                    <dt class="col-sm-3">CREADO</dt>
                    <dd class="col-sm-9">{{$inventory->created_at}}</dd>
                    <dt class="col-sm-3">EDITADO</dt>
                    <dd class="col-sm-9">{{$inventory->updated_at}}</dd>
                    <dt class="col-sm-3">FOTOGRAFÍA</dt>
                    <dd class="col-sm-9">
                        @if($inventory->img == null)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Subir Foto
                        </button>
                        @else
                        <img src="/images/{{$inventory->img}}" class="img-fluid" alt="Responsive image">
                        <a href="/inventories/delete/image/{{$id}}/{{$inventory->img}}" class="btn btn-danger">ELIMINAR FOTO</a>
                        @endif

                    </dd>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
    @if($activity_logs->count() > 0)
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">FECHA</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activity_logs as $activity_log)
                <tr>
                    <th scope="row">{{$activity_log->id}}</th>
                    <td>{{$activity_log->type}}</td>
                    <td>{{$activity_log->description}}</td>
                    <td><?= strftime('%d %b %Y', strtotime($activity_log->date)) ?>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SUBIR FOTOGRAFÍA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/inventories/{{$id}}/uploadphoto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <input type="file" id="customFileLang" lang="es" name="file">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection