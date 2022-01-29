@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Clientes</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/clients/create">Nuevo Cliente</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <td><strong>DPI</strong></td>
                    <td><strong>Nombre</strong></td>
                    <td><strong>Apellido</strong></td>
                    <td><strong>Direccion</strong></td>
                </tr>
                @foreach($clients as $client)
                    <tr>
                        <td><a href="/clients/{{$client->id}}">{{$client->dpi}}</a></td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->lastname}}</td>
                        <td>{{$client->direction}}</td>
                        <td><a href="/clients/{{$client->id}}/edit">Editar</a></td>
                        <td><a class="link-danger" href="/clients/{{$client->id}}/confirmDelete">Borrar</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection