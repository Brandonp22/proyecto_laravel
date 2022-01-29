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

{{--     <div class="row">
        <div class="col">
            
        </div>    
    </div> --}}

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Calculadora</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Calculadora</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">


            <form action="/clients/calculator" method="post">
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
                <button class="btn btn-primary" type="submit">Calcular</button>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection