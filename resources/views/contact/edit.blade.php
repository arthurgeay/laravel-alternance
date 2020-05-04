@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editer un contact</h1>
        <form method="post" action="{{ route('contact.editStore', $contact->id) }}">
            @csrf
            <div class="form-group">
                <label for="fullname">Nom complet</label>
                <input type="text" id="fullname" name="fullname" class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" value="{{ old('fullname', $contact->fullname) }}" />
                @if($errors->has('fullname'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un nom de contact
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="jobname">Poste actuel</label>
                <input type="text" id="jobname" name="jobname" class="form-control {{ $errors->has('jobname') ? 'is-invalid' : '' }}" value="{{ old('jobname', $contact->jobname) }}" />
                @if($errors->has('jobname'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un poste
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="text" id="phone" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone', $contact->phone) }}" />
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un numéro de téléphone
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="mail">Adresse e-mail</label>
                <input type="email" id="mail" name="mail" class="form-control {{ $errors->has('mail') ? 'is-invalid' : '' }}" value="{{ old('mail', $contact->mail) }}" />
                @if($errors->has('mail'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une adresse email
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
