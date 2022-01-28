@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Nuevo cliente</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/clients">Regresar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/clients" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre cliente:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del cliente" value ="{{old('name')}}">
                    <label for="lastname">Apellido cliente:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido del cliente" value ="{{old('lastname')}}">
                    <label for="direction">Direccion:</label>
                    <input type="text" class="form-control" id="direction" name="direction" placeholder="Direccion" value ="{{old('direction')}}">
                    <label for="dpi">DPI:</label>
                    <input type="text" class="form-control" id="dpi" name="dpi" placeholder="DPI" value ="{{old('dpi')}}">
                </div>
                <button class="btn btn-primary" type="submit">Crear</button>
            </form>
        </div>
    </div>

@endsection