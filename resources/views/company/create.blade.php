@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une entreprise</h1>
        <form method="post" action="{{ route('company.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nom de l'entreprise</label>
                <input type="text" id="name" name="name" class="form-control" />
            </div>

            <div class="form-group">
                <label for="area_activity">Secteur d'activité</label>
                <input type="text" id="area_activity" name="area_activity" class="form-control" />
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <textarea id="address" name="address" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="Adresse e-mail" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="text" id="phone" name="phone" placeholder="Numéro de téléphone" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection
