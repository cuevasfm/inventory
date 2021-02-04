@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <h1>Resguardo de equipo</h1>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary d-print-none" href="/employee">Ver Empleados </a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <dl class="row" style="font-size: 22px;">
                <dt class="col-sm-3">EMPLEADO</dt>
                <dd class="col-sm-9">{{$data->name_employee}}</dd>

                <dt class="col-sm-3">E-MAIL</dt>
                <dd class="col-sm-9">{{$data->email_employee}}</dd>
            </dl>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary d-print-none" href="/employee/{{$data->id}}/toassign">Asignar equipo </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Dispositivos Asignados</h3>
        </div>
    </div>
    <div class="row">
        <table class="table table-sm table-bordered border-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOMBRE DE PARTE</th>
                    <th scope="col">CATEGORÍA</th>
                    <th scope="col">MARCA</th>
                    <th scope="col">MODEL</th>
                    <th scope="col">S/N</th>
                    <th scope="col" class="d-print-none">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventories as $inventory)
                <tr>
                    <th scope="row">{{$inventory->id}}</th>
                    <td><a href="/inventories/{{$inventory->id}}">{{$inventory->inventory_name}} </a> </td>
                    <td>{{$inventory->name_category}}</td>
                    <td>{{$inventory->name_brand}}</td>
                    <td>{{$inventory->model}}</td>
                    <td>{{$inventory->sn}}</td>
                    <td class="d-print-none"><a href="/employee/{{$inventory->id}}/{{$data->id}}/unassign" class="btn btn-sm btn-danger d-print-none">Des-Asignar</a></td>
                    @endforeach
            </tbody>
        </table>
    </div>
    <hr>

    <div class="card-columns">
        @foreach($inventories as $inventory)
        @if($inventory->img != null)
        <div class="card p-3">
            <img src="/images/{{$inventory->img}}" class="card-img-top" alt="...">
            <div class="card-body">
                <p>#{{$inventory->id}} {{$inventory->inventory_name}} </p>
            </div>
        </div>
        @endif

        @endforeach

    </div>
    <div class="row">
        <div class="col">
            <h3>Historía de Asignaciones</h3>
        </div>
    </div>
    <div class="row">
        <table class="table table-sm table-bordered border-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID EQUIPO</th>
                    <th scope="col">NOMBRE PARTE</th>
                    <th scope="col">ASIGNADO/DESASIGNADO</th>
                    <th scope="col">FECHA DE ASIGNACIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $assignment)
                <tr>
                    <th scope="row">{{$assignment->id}}</th>
                    <td>{{$assignment->id_part}}</td>
                    <td>{{$assignment->inventory_name}}</td>
                    <td>{{$assignment->state == 'ASSIGNED' ? 'ASIGNADO' : 'DESASIGNADO' }} </td>
                    <td>{{$assignment->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title ">ING. MIGUEL CUEVAS</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Jefe Sistemas</h6>
                    <br><br><br><br>
                    <hr>
                    <p class="card-text text-cente">Elaboró</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title ">LIC. CARLOS BALDERAS</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Contralor</h6>
                    <br><br><br><br>
                    <hr>
                    <p class="card-text text-cente">Vo. Bo.</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title ">{{$data->name_employee}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$data->email_employee}}</h6>
                    <br><br><br><br>
                    <hr>
                    <p class="card-text text-cente">Aceptó</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <p class="lead">Yo {{$data->name_employee}} Me comprometo a cuidar y mantener en buen estado el equipo arriba mencionado e informar de alguna falla o desperfecto en cuanto se manifieste, y devolver cuando la empresa así lo requiera y aplicar los cargos correspondientes por mal uso.</p>
    </div>
</div>

@endsection