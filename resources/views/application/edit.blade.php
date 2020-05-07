@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Editer une demande</h1>

        <form action="{{ route('application.editStore', $application->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="company">Entreprise</label>
                <select class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}" id="company" name="company_id">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" @if($application->company->id == $company->id) selected @endif}}>{{ $company->name }}</option>
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
                        @foreach($application->company->contacts as $contact)
                            <option class="companyContact" value="{{ $contact->id }}" @if($application->contact->id == $contact->id) selected @endif}}><strong>{{ $contact->fullname }}</strong> - {{ $contact->jobname }}</option>
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
                    <option value="tel" @if($application->contact_type == 'tel') selected @endif>Téléphone</option>
                    <option value="mail" @if($application->contact_type == 'mail') selected @endif>Mail</option>
                    <option value="visio" @if($application->contact_type == 'visio') selected @endif>Visio conférence</option>
                    <option value="autre" @if($application->contact_type == 'autre') selected @endif>Autre</option>
                </select>
                @if($errors->has('contact_type'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un type de contact
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description', $application->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une description
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="state">Etat de la demande</label>
                <select class="form-control {{ $errors->has('contact_state') ? 'is-invalid' : '' }}" id="state" name="state">
                    <option value="to-do" @if($application->state == 'to-do') selected @endif>A faire</option>
                    <option value="in-progress" @if($application->state == 'in-progress') selected @endif>En cours</option>
                    <option value="done" @if($application->state == 'done') selected @endif>Terminé</option>
                    <option value="call" @if($application->state == 'call') selected @endif>Rappel</option>
                </select>
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une description
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        <script src="/laravel-alternance/resources/js/contact.js"></script>
    </div>
@endsection
