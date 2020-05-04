@extends('layouts.app')

@section('content')

    <div class="container">

            <h1>Liste des utilisateurs</h1><br>
            @foreach($users as $user)
                <h3>{{ $user->name }}<span class="badge">
                @if ($user->applications_count < 10)
                    <img src="{{URL::asset('badges/rsa.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($user->applications_count >= 10 and $user->applications_count < 30)
                    <img src="{{URL::asset('badges/wati_classic.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($user->applications_count >= 30 and $user->applications_count < 50) 
                    <img src="{{URL::asset('badges/wati_rose.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($user->applications_count >= 50 and $user->applications_count < 100) 
                    <img src="{{URL::asset('badges/wati_gold.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @endif

                @if ($user->applications_count < 10)
                    <img src="{{URL::asset('badges/rsa.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($user->applications_count >= 10 and $user->applications_count < 30)
                    <img src="{{URL::asset('badges/wati_classic.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($user->applications_count >= 30 and $user->applications_count < 50) 
                    <img src="{{URL::asset('badges/wati_rose.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @elseif ($user->applications_count >= 50 and $user->applications_count < 100) 
                    <img src="{{URL::asset('badges/wati_gold.png')}}" alt="" style="position:relative;top:-.5rem;width:4rem" >
                @endif
                
                </span></h3>
            @endforeach

    </div>


@endsection
