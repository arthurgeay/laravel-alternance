<!-- Application creation page -->
@extends('layouts.app')

@section('content')
    <?php
        $allPath = dirname(__DIR__);
        if (strrpos($allPath, '/', 0) == false){
            $explodePath = explode('\\', $allPath);
        } else {
            $explodePath = explode('/', $allPath);
        }
        $directory = $explodePath[count($explodePath)-3];
    ?>

    <div class="container" id="mainContainer" data-directory="{{ $directory }}">
        <h1 class="text-center">Créer une demande</h1>

        <form action="{{ route('application.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="company">Entreprise</label>
                <select class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}" id="company" name="company_id">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('company_id'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une entreprise valide
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="contact">Contact de l'entreprise</label>
                <select class="form-control {{ $errors->has('contact_id') ? 'is-invalid' : '' }}" id="contact" name="contact_id">
                        @foreach($companies->first()->contacts as $contact)
                            <option class="companyContact" value="{{ $contact->id }}"><strong>{{ $contact->fullname }}</strong> - {{ $contact->jobname }}</option>
                        @endforeach
                </select>
                @if($errors->has('contact_id'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un contact valide
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="contact_type">Type de contact</label>
                <select class="form-control {{ $errors->has('contact_type') ? 'is-invalid' : '' }}" id="contact_type" name="contact_type">
                    <option value="tel">Téléphone</option>
                    <option value="mail">Mail</option>
                    <option value="visio">Visio conférence</option>
                    <option value="autre">Autre</option>
                </select>
                @if($errors->has('contact_type'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un type de contact
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une description
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="state">Etat de la demande</label>
                <select class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" id="state" name="state">
                    <option value="to-do">A faire</option>
                    <option value="in-progress">En cours</option>
                    <option value="done">Terminé</option>
                    <option value="call">Rappel</option>
                </select>
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une description
                    </div>
                @endif
            </div>
            <input type="button" value="Retour" class="btn btn-primary" onclick="history.go(-1)">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <script src="{{ asset('js/contact.js') }}"></script>
    </div>
@endsection
