@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ Auth::user()->name }}
                <span class="badge">
                @if ($badge < 10)
                    <img src="{{URL::asset('badges/rsa.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($badge >= 10 and $badge < 30)
                    <img src="{{URL::asset('badges/wati_classic.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($badge >= 30 and $badge < 50) 
                    <img src="{{URL::asset('badges/wati_rose.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($badge >= 50 and $badge < 100) 
                    <img src="{{URL::asset('badges/wati_gold.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @endif
                </span>
            </h1>
            <div class="card">
                <div class="card-header">Bonjour {{ Auth::user()->name }}, vous êtes membres                @if ($badge < 10)
                    <span class="text-secondary">chômeurs RSA</span>
                @elseif ($badge >= 10 and $badge < 30)
                    <span class="text-success">WATIBULLE CLASSIC</span>
                @elseif ($badge >= 30 and $badge < 50) 
                    <span class="text-danger">WATIBULLE ROSE</span>
                @elseif ($badge >= 50 and $badge < 100) 
                    <span class="text-warning">WATIBULLE GOLD</span>
                @endif</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Vous êtes connecté !
                    Votre nombre de demande est de <span class="text-success">{{ $badge }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
