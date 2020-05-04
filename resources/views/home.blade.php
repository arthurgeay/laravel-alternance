@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="flex-row d-flex align-items-center justify-content-between">
                <h1>{{ Auth::user()->name }} {{ Auth::user()->alcohol }}
                    <span class="badge">
                    @if (Auth::user()->alcohol = 0)
                        @if ($badge < 10)
                            <img src="{{URL::asset('badges/rsa.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @elseif ($badge >= 10 and $badge < 30)
                            <img src="{{URL::asset('badges/wati_classic.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @elseif ($badge >= 30 and $badge < 50) 
                            <img src="{{URL::asset('badges/wati_rose.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @elseif ($badge >= 50 and $badge < 100) 
                            <img src="{{URL::asset('badges/wati_gold.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @endif
                    @else
                        @if ($badge < 10)
                            <img src="{{URL::asset('badges/rsa.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @elseif ($badge >= 10 and $badge < 30)
                            <img src="{{URL::asset('badges/panache.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @elseif ($badge >= 30 and $badge < 50) 
                            <img src="{{URL::asset('badges/grimbergen.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @elseif ($badge >= 50 and $badge < 100) 
                            <img src="{{URL::asset('badges/corona.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                        @endif
                    @endif
                    </span>
                </h1>
                <form method="POST" action="{{ route('home.alcohol') }}" class="mb-2">
                    @csrf
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    @if (Auth::user()->alcohol)
                        <input type="hidden" value="0" name="newAlcohol">
                        <input class="btn btn-info" type="submit" value="Je ne bois pas d'alcool !">
                    @else
                        <input type="hidden" value="1" name="newAlcohol">
                        <input class="btn btn-info" type="submit" value="Je suis un gros soifard !">
                    @endif
                </form>
            </div>
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
