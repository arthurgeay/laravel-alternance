@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-company" style="padding-bottom: 2rem!important;background: rgba(0,0,0,0.05);border-radius:15px; width: max-content;padding: 1rem 1.5rem;">
        <div style="display:flex;text-align: center;justify-content:space-between;margin-bottom:2rem;">
        <h1 style="font-weight:bold;">{{ $company->name }}</h1>
        <img src="{{ $company->img ? $company->img : '' }}" style="max-width: 80px; max-height: 80px;border-radius:10px;">
        </div>
        <p><span style="font-weight:bold;">Secteur d'activité : </span>{{ $company->area_activity }}</p>
        <p><span style="font-weight:bold;">Adresse : </span>{{ $company->address }}</p>
        <p><span style="font-weight:bold;">Adresse e-mail :</span> {{ $company->email }}</p>
        <p style="margin-bottom: 1rem;"><span style="font-weight:bold;">Numéro de téléphone :</span> {{ $company->phone }}</p>
        
        <a href="{{ route('company.edit', $company->id) }}" style="background-color:green;font-weight:bold;margin-right:1rem;color:white;padding:.5rem 1rem;border-radius:7px;">Editer l'entreprise</a>
        <a href="{{ route('company.delete', $company->id) }}" style="background-color:red;font-weight:bold;color:white;padding:.5rem 1rem;border-radius:7px;">Supprimer l'entreprise</a>
        </div>

        <h2 style="margin-top: 3rem;">Liste des contacts</h2>
        <a href="{{ route('contact.create', $company->id) }}" style="font-size:1rem;margin-bottom:1.5rem;display:block;font-weight:bold;">Ajouter un contact</a>
        @foreach($contacts as $contact)
            <p>{{ $contact->fullname }} - {{ $contact->jobname }} - {{ $contact->phone }} - {{ $contact->mail }} - <a href="{{ route('contact.edit', $contact->id) }}" style="color: green;font-weight:bold;">Modifier</a> | <a href="{{ route('contact.delete', $contact->id) }}" style="color: red;font-weight:bold;">Supprimer</a></p>
        @endforeach
        <form>
            <input type="button" value="Retour" class="btn btn-primary" onclick="history.go(-1)">
        </form>
    </div>

@endsection
