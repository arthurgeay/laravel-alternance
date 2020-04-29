@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editer une entreprise</h1>
        <form method="post" action="{{ route('company.editStore', $company->id) }}">
            @csrf
            <div class="form-group">
                <label for="name">Nom de l'entreprise</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $company->name }}"/>
            </div>

            <div class="form-group">
                <label for="area_activity">Secteur d'activité</label>
                <input type="text" id="area_activity" name="area_activity" class="form-control" value="{{ $company->area_activity }}"/>
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <textarea id="address" name="address" class="form-control">{{ $company->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="Adresse e-mail" class="form-control" value="{{ $company->email }}"/>
            </div>

            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="text" id="phone" name="phone" placeholder="Numéro de téléphone" class="form-control"  value="{{ $company->phone }}"/>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>

        <hr>

        <h2>Ajouter un contact</h2>
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

            <button type="submit" class="btn btn-success">Editer</button>

        </form>
    </div>
@endsection

