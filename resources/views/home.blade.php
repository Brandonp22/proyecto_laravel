@extends('layouts.base')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                        <div>Acceso como administrador</div>
                        <a href="/clients/">Clientes</a>
                    @else
                        <div>Acceso usuario</div>
                        <a href="/myLoan/{{$user}}/show">Ver prestamo</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
