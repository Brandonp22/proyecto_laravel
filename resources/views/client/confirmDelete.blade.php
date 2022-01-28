@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Borrar cliente {{$client->name}} {{$client->lastname}}</h1>
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
                @method('Delete')
                <button class="btn btn-primary" type="submit">Borrar</button>
            </form>
        </div>
    </div>

@endsection