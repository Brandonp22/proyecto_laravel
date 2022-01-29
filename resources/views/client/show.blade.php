@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Show cliente {{$clientLoan->name}} {{$clientLoan->lastname}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/clients">Regresar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3>Prestamos</h3>
            <table class="table">
                @if(isset($clientLoan->loans))
                <tr>
                    <td><strong>Fecha creado</strong></td>
                    <td><strong>Saldo</strong></td>
                    <td><strong>Capital</strong></td>
                    <td><strong>Intereses</strong></td>
                    <td><strong>Cuotas</strong></td>
                    <td><strong>Estatus</strong></td>
                </tr>
                <tr>
                    <td>{{$clientLoan->loans->created_at}}</td>
                    <td>{{$clientLoan->loans->loanBalance}}</td>
                    <td>{{$clientLoan->loans->borrowedCapital}}</td>
                    <td>{{$clientLoan->loans->appliedInterest}}</td>
                    <td>{{$clientLoan->loans->amountInstallments}}</td>

                    @if ($clientLoan->loans->statusLoan === 1)
                    <td>Activo</td>
                    @else
                    <td>Inactivo</td>
                    @endif

                </tr>  
                @else
                    <p>No hay prestamos creados</p>

                    <div class="row">
                        <div class="col">
                            <h4>Realizar Prestamo</h4>

                            <a class="btn btn-primary" href="/clients/{{$clientLoan->id}}/loans/create">Crear Prestamo</a>
                        </div>
                    </div>
                @endif
            </table>
            
        </div>
    </div>

@endsection


