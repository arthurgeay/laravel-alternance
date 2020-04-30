@extends('layouts.app')

@section('content')

    <div class="container">

            <h1>Liste des utilisateurs</h1><br>
            @foreach($users as $user)
                <h3>{{ $user->name }}</h3>
            @endforeach

    </div>


@endsection
