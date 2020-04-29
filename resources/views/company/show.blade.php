@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $company->name }}</h1>
        <p>Secteur d'activité : {{ $company->area_activity }}</p>
        <p>Adresse : {{ $company->address }}</p>
        <p>Adresse e-mail :{{ $company->email }}</p>
        <p>Numéro de téléphone : {{ $company->phone }}</p>

        <a href="{{ route('company.edit', $company->id) }}">Editer l'entreprise</a>
        <a href="{{ route('company.delete', $company->id) }}">Supprimer l'entreprise</a>

        <h2>Liste des contacts - <a href="{{ route('company.edit', $company->id) }}">Ajouter un contact</a></h2>
        @foreach($contacts as $contact)
            <p>{{ $contact->fullname }} - {{ $contact->jobname }} - {{ $contact->phone }} - {{ $contact->mail }} - <a href="{{ route('contact.edit', $contact->id) }}">Modifier</a> | <a href="{{ route('contact.delete', $contact->id) }}">Supprimer</a></p>
        @endforeach
    </div>

@endsection
