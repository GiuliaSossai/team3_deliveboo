@extends('layouts.app')

@section('content')
    {{-- <div class="container">
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
    </div> --}}

    <div class="dashboard">
        <div class="d-header">
            <h1>Bentornato {{ Auth::user()->name }}</h1>

        </div>
        <div class="row1-container">
            <div class="box box-down cyan">
                <h2>Supervisor</h2>
                <p>Monitors activity to identify project roadblocks</p>
                <img src="https://assets.codepen.io/2301174/icon-supervisor.svg" alt="">
            </div>

            <div class="box red">
                <h2>Team Builder</h2>
                <p>Scans our talent network to create the optimal team for your project</p>
                <img src="https://assets.codepen.io/2301174/icon-team-builder.svg" alt="">
            </div>

            <div class="box box-down blue">
                <h2>Calculator</h2>
                <p>Uses data from past projects to provide better delivery estimates</p>
                <img src="https://assets.codepen.io/2301174/icon-calculator.svg" alt="">
            </div>
        </div>
        <div class="row2-container">
            <div class="box orange">
                <h2>Karma</h2>
                <p>Regularly evaluates our talent to ensure quality</p>
                <img src="https://assets.codepen.io/2301174/icon-karma.svg" alt="">
            </div>
        </div>
        <footer>
            <p class="attribution">
                Challenge by <a href="https://www.frontendmentor.io?ref=challenge" target="_blank">Frontend Mentor</a>.
                Coded by <a href="#">Jared Parsons</a>.
            </p>
        </footer>
    </div>
@endsection
