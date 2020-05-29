@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="flex-row d-flex align-items-center justify-content-between">
                <h1 style="color: #007bff;font-weight:bold;">{{ Auth::user()->name }}
                    <span class="badge">
                    @if (Auth::user()->alcohol == 0)
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
                <div class="card-header" style="background-color: #007bff; color: white;">Bonjour {{ Auth::user()->name }}, vous êtes membre
                @if (Auth::user()->alcohol == 0)
                        @if ($badge < 10)
                            <span class="text-secondary font-weight-bold badge badge-light">chômeurs RSA</span>
                        @elseif ($badge >= 10 and $badge < 30)
                            <span class="text-success font-weight-bold badge badge-light">WATIBULLE CLASSIC</span>
                        @elseif ($badge >= 30 and $badge < 50) 
                            <span class="text-danger font-weight-bold badge badge-light">WATIBULLE ROSE</span>
                        @elseif ($badge >= 50 and $badge < 100) 
                            <span class="text-warning font-weight-bold badge badge-light">WATIBULLE GOLD</span>
                        @endif
                    @else
                        @if ($badge < 10)
                            <span class="text-secondary font-weight-bold badge badge-light">chômeurs RSA</span>
                        @elseif ($badge >= 10 and $badge < 30)
                            <span class="text-success font-weight-bold badge badge-light">Panaché</span>
                        @elseif ($badge >= 30 and $badge < 50) 
                            <span class="text-danger font-weight-bold badge badge-light">GRIMBERGEN</span>
                        @elseif ($badge >= 50 and $badge < 100) 
                            <span class="text-warning font-weight-bold badge badge-light">CORONA KING</span>
                        @endif
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Votre nombre de demande est de <span class="text-success font-weight-bold" style="font-size: 1.5rem;">{{ $badge }}</span><br>
                    Adresse mail: <span class="text-primary font-weight-bold">{{ Auth::user()->email }}</span><br>
                    Inscrit le : <span class="text-success font-weight-bold">{{ Auth::user()->created_at }}</span>
                </div>
            </div>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 1rem;">Supprimer votre compte</button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Supprimer votre compte</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Voulez-vous vraiment supprimer votre compte ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <a href="{{ route('user.delete', Auth::user()->id) }}"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
