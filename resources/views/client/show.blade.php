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
                    <td><strong>Tipo</strong></td>
                    <td><strong>Estatus</strong></td>
                </tr>
                <tr>
                    <td>{{$clientLoan->loans->created_at}}</td>
                    <td>{{$clientLoan->loans->loanBalance}}</td>
                    <td>{{$clientLoan->loans->borrowedCapital}}</td>
                    <td>{{$clientLoan->loans->appliedInterest}}</td>
                    <td>{{$clientLoan->loans->amountInstallments}}</td>

                    @if ($clientLoan->loans->period === 36000)
                        <td>Diario</td>
                    @elseif($clientLoan->loans->period === 4800)
                        <td>Semanal</td>
                    @elseif($clientLoan->loans->period === 1200)
                        <td>Mensual</td>
                    @endif

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

    <td><a class="link-danger" href="/clients/{{$clientLoan->id}}/loans/{{$clientLoan->id}}/loanInstallments/generateInstallments">generar</a></td>

    {{--  --}}
    <div class="row">
        <div class="col">
            @if(isset($clientLoan->loans->loanInstallments))
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
                @foreach($clientLoan->loans->loanInstallments as $installment)
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

@endsection


