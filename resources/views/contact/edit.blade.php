@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editer un contact</h1>
        <form method="post" action="{{ route('contact.editStore', $contact->id) }}">
            @csrf
            <div class="form-group">
                <label for="fullname">Nom complet</label>
                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $contact->fullname }}"/>
            </div>

            <div class="form-group">
                <label for="jobname">Poste actuel</label>
                <input type="text" id="jobname" name="jobname" class="form-control" value="{{ $contact->jobname }}"/>
            </div>

            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone }}"/>
            </div>

            <div class="form-group">
                <label for="mail">Adresse e-mail</label>
                <input type="email" id="mail" name="mail" class="form-control" value="{{ $contact->mail }}"/>
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
