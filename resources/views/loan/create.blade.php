@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Nuevo Prestamo</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/clients/{{$clientLoan->id}}">Regresar</a>
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
            <form action="/clients/{{$clientLoan->id}}/loans" method="post">
                @csrf
                <div class="form-group">
                    <label for="borrowedCapital">Capital a prestar</label>
                    <input type="text" class="form-control" id="borrowedCapital" name="borrowedCapital" placeholder="Capital" value ="{{old('borrowedCapital')}}">
                    <label for="type">Tipo:</label>
                    <select class="form-select" name="type">
                        <option selected>Seleccionar</option>
                        <option value="36000">Dia</option>
                        <option value="4800">Semana</option>
                        <option value="1200">Mes</option>
                    </select>
                    <label for="amountInstallments">Cuotas:</label>
                    <input type="text" class="form-control" id="amountInstallments" name="amountInstallments" placeholder="Intereses" value ="{{old('amountInstallments')}}">
                    <label for="appliedInterest">Tasa de intereses</label>
                    <input type="text" class="form-control" id="appliedInterest" name="appliedInterest" placeholder="Cuotas" value ="{{old('appliedInterest')}}">
                </div>
                <button class="btn btn-primary" type="submit">Crear</button>
                
            </form>
        </div>
    </div>
@endsection