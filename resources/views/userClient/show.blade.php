@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @php
                    /* dd($userLoan); */
                @endphp
                <h1>Datos cliente {{$userLoan->client->name}} {{$userLoan->client->lastname}}</h1>
            </div>
        </div>
    
        <div class="row">
            <div class="col">
                <h3>Prestamos</h3>
                <table class="table">
                    @if(isset($userLoan->client->loans))
                    <tr>
                        <td><strong>Fecha creado</strong></td>
                        <td><strong>Saldo</strong></td>
                        <td><strong>Capital</strong></td>
                        <td><strong>Intereses</strong></td>
                        <td><strong>Cuotas</strong></td>
                        <td><strong>Tipo</strong></td>
                        <td><strong>Estatus</strong></td>
                    </tr>
                    <tr>
                        <td>{{$userLoan->client->loans->created_at}}</td>
                        <td>{{$userLoan->client->loans->loanBalance}}</td>
                        <td>{{$userLoan->client->loans->borrowedCapital}}</td>
                        <td>{{$userLoan->client->loans->appliedInterest}}</td>
                        <td>{{$userLoan->client->loans->amountInstallments}}</td>
    
                        @if ($userLoan->client->loans->period === 36000)
                            <td>Diario</td>
                        @elseif($userLoan->client->loans->period === 4800)
                            <td>Semanal</td>
                        @elseif($userLoan->client->loans->period === 1200)
                            <td>Mensual</td>
                        @endif
    
                        @if ($userLoan->client->loans->statusLoan === 1)
                        <td>Activo</td>
                        @else
                        <td>Inactivo</td>
                        @endif
    
                    </tr>  
                    @else
                        <p>No hay prestamos creados</p>
                    @endif
                </table>
            </div>
        </div>
    
        {{--  --}}
        <div class="row">
            <div class="col">
                @if(isset($userLoan->client->loans->loanInstallments))
    
                    <h3>Cuotas del Prestamo</h3>
                    <table class="table">
                    <tr>
                        <td><strong>Cuota</strong></td>
                        <td><strong>Fecha de Pago</strong></td>
                        <td><strong>Fecha Pagada</strong></td>
                        <td><strong>Intereses</strong></td>
                        <td><strong>Saldo a pagar</strong></td>
                        <td><strong>Capital Pendinte</strong></td>
                        <td><strong>Estado</strong></td>
                    </tr>
                    @php
                    $num = 0;
                    @endphp
                    @foreach($userLoan->client->loans->loanInstallments as $installment)
                    <tr>
                        <td>{{$num = $num+1}}</td>
                        <td>{{$installment->payDate}}</td>
                        <td>{{$installment->paidDate}}</td>
                        <td>{{$installment->InterestInstallment}}</td>
                        <td>{{$installment->installmentBalance}}</td>
                        <td>{{$installment->capital}}</td>
    
                        @if ($installment->statusLoanInstallment === 1)
                        <td>Pendiente pago</td>
                        @else
                        <td>Pagado</td>
                        @endif
                    </tr>
                    @endforeach  
                    @else
                    
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection


