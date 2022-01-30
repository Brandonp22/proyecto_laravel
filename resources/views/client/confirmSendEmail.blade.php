@extends('layouts.base')


@section('content')
    <div class="row">
        <div class="col">
            <h1>Enviar Correo al cliente</h1>
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
            <form action="/clients/{{$client->id}}/sendEmail" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email cliente:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email del cliente" value ="{{old('email')}}">
                </div>
                <button class="btn btn-primary" type="submit">Enviar Correo</button>
            </form>
        </div>
    </div>

@endsection