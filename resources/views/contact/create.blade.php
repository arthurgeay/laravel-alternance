@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Ajouter un contact chez {{ $company->name }}</h2>
        <form method="post" action="{{ route('contact.store', $company->id) }}">
            @csrf
            <div class="form-group">
                <label for="fullname">Nom complet</label>
                <input type="text" id="fullname" name="fullname" class="form-control" />
            </div>

            <div class="form-group">
                <label for="jobname">Poste actuel</label>
                <input type="text" id="jobname" name="jobname" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="mail">Adresse e-mail</label>
                <input type="text" id="mail" name="mail" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="text" id="phone" name="phone" class="form-control" />
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>

        </form>
<div>
@endsection