@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>{{ Auth::user()->name }} <span class="badge"><img src="{{URL::asset('badges/wati_gold.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" ></span></h1>
            <div class="card">
                <div class="card-header">Bonjour {{ Auth::user()->name }}, vous êtes membres <span class="text-warning">WATIBULLE GOLD</span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
