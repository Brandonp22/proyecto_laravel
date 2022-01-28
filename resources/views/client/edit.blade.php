@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar cliente {{$client->name}} {{$client->lastname}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/clients">Regresar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="/clients/ {{ $client->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Nombre cliente:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}">
                    <label for="lastname">Apellido cliente:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $client->lastname) }}">
                    <label for="direction">Direccion:</label>
                    <input type="text" class="form-control" id="direction" name="direction" value="{{ old('direction', $client->direction) }}">
                    <label for="dpi">DPI:</label>
                    <input type="text" class="form-control" id="dpi" name="dpi" value="{{ old('dpi', $client->dpi) }}">
                </div>
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
        </div>
    </div>

@endsection