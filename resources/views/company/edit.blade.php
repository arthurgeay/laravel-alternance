<!-- Company edit page -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editer une entreprise</h1>
        <form method="post" action="{{ route('company.editStore', $company->id) }}">
            @csrf
            
            <div style="text-align: center;">
                <img src="{{ $company->img ? $company->img : '' }}" style="max-width: 80px; max-height: 80px;">
            </div>
            <div class="form-group">
                <label for="name">Nom de l'entreprise</label>
                <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $company->name) }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un nom d'entreprise
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="area_activity">Secteur d'activité</label>
                <input type="text" id="area_activity" name="area_activity" class="form-control {{ $errors->has('area_activity') ? 'is-invalid' : '' }}" value="{{ old('area_activity', $company->area_activity) }}"/>
                @if($errors->has('area_activity'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un secteur d'activité
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <textarea id="address" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}">{{ old('address', $company->address) }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une adresse
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="Adresse e-mail" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email', $company->email) }}"/>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        Veuillez renseigner une adresse e-mail
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="text" id="phone" name="phone" placeholder="Numéro de téléphone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone', $company->phone) }} "/>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        Veuillez renseigner un numéro de téléphone
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="phone">Lien du logo <i>(optionnel)<i></label>
                <input type="text" id="imgLink" class="form-control" name="imgLink" value="{{ old('imgLink', $company->imgLink) }}"/>
            </div>
            <input type="button" value="Retour" class="btn btn-primary" onclick="history.go(-1)">
            <button type="submit" class="btn btn-success" >Modifier</button>
        </form>
        <hr>
    </div>
@endsection

