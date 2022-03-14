@extends('layouts.app')

@section('content')
    
        <div class="db-container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card p-4">
                            {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                            <div class="card-body text-center">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {{-- <div class="row">
                                    <div class="col-6">
                                        Nome Utente
                                        FOto
                                    </div>
                                    <div class="col-6">
                                        I tuoi Guadagni
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-6">
                                        Vai ai ristoranti
                                    </div>
                                    <div class="col-6">
                                        Statistiche
                                    </div>
                                </div> --}}
                                <h2>
                                    Benvenuto <span class="font-weight-bolder">{{ Auth::user()->name }}</span> {{ __('nella tua area personale!') }}
                                </h2>
                                <h5 class="mt-4">Grazie di far parte della nostra rete dal <strong>{{ date_format(Auth::user()->created_at, 'd/m/Y') }}</strong>!</h5>
                            </div>
                            {{-- <a href="{{ route('admin.ristoranti.index') }}" class="btn w-25 m-2 gs-btn">I tuoi ristoranti</a> --}}
                            <div class="p-4 gs-card-text">
                                <span><i class="fa-solid fa-right-long"></i></span>
                                <span><a href="{{ route('admin.ristoranti.index') }}" class="gs-link">i tuoi ristoranti</a></span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
@endsection
