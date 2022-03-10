@extends('layouts.app')

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
                        <div class="row">
                            <div class="col-6">
                                Nome Utente
                                FOto
                            </div>
                            <div class="col-6">
                                I tuoi Guadagni
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                Vai ai ristoranti
                            </div>
                            <div class="col-6">
                                Statistiche
                            </div>
                        </div>
                        Ciao
                        {{ Auth::user()->name }}
                        {{ __('You are logged in!') }}
                    </div>
                    <a href="{{ route('admin.ristoranti.index') }}" class="btn w-25 btn-primary m-2">Vai ai Ristoranti</a>
                </div>
            </div>
        </div>
    </div>
@endsection
