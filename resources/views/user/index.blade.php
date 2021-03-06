<!-- Users list with badge -->
@extends('layouts.app')

@section('content')

    <div class="container">

            <h1>Liste des utilisateurs</h1><br>
            @foreach($users as $user)
            <div class="d-flex flex-row align-items-center shadow mb-4 p-4" style="padding-bottom:0!important;border-radius:8px;">
                <h3>{{ $user->name }}<span class="badge">
                @if ($user->alcohol == 0)
                    @if ($user->applications_count < 10)
                        <img src="{{URL::asset('badges/rsa.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @elseif ($user->applications_count >= 10 and $user->applications_count < 30)
                        <img src="{{URL::asset('badges/wati_classic.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @elseif ($user->applications_count >= 30 and $user->applications_count < 50)
                        <img src="{{URL::asset('badges/wati_rose.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @elseif ($user->applications_count >= 50 and $user->applications_count < 100)
                        <img src="{{URL::asset('badges/wati_gold.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @endif
                @else
                    @if ($user->applications_count < 10)
                        <img src="{{URL::asset('badges/rsa.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @elseif ($user->applications_count >= 10 and $user->applications_count < 30)
                        <img src="{{URL::asset('badges/panache.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @elseif ($user->applications_count >= 30 and $user->applications_count < 50)
                        <img src="{{URL::asset('badges/grimbergen.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @elseif ($user->applications_count >= 50 and $user->applications_count < 100)
                        <img src="{{URL::asset('badges/corona.png')}}" alt="" style="position:relative;top:-.5rem;width:3.5rem" >
                    @endif
                @endif
                </span>
                </h3>
                    <p style="font-size:1.2rem; margin-left:auto;display:inline-block;margin-bottom: 1.5rem">
                            <span style="font-weight:bold;">{{ $user->applications_count }}</span> {{ $user->applications_count > 1 ? 'demandes' : 'demande'}}
                    </p>
                </div>
            @endforeach

        {{ $users->links() }}

    </div>


@endsection
