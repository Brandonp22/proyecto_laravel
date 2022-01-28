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
                {{-- @if(isset($almacen->actividades)) --}}
                <tr>
                    <td>{{$clientLoan->loans->create_at }}</td>
                    <td>{{$clientLoan->loans->loanBalance}}</td>
                    <td>{{$clientLoan->loans->borrowedCapital}}</td>
                    <td>{{$clientLoan->loans->appliedInterest}}</td>
                    <td>{{$clientLoan->loans->amountInstallments}}</td>
                    <td>{{$clientLoan->loans->statusLoan}}</td>
                </tr>
                {{-- @endif --}}
            </table>
            
        </div>
    </div>

@endsection


