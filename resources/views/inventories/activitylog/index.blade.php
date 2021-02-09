@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row">
        <h1>Log de Actividades o Bitácora</h1>
    </div>
    <br>
    <div class="row">
        <table class="table table-sm table-bordered border-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">EQUIPO</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">DESCRIPCIÓN</th>
                    <th scope="col">FECHA</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activitylogs as $activitylog)
                <tr>
                    <th scope="row">{{$activitylog->id}}</th>
                    <td>{{$activitylog->inventories_id}}</td>
                    <td>{{$activitylog->type}}</td>
                    <td>{{$activitylog->description}}</td>
                    <td>{{$activitylog->date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection