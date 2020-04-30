@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{ route('company.create') }}" class="btn btn-primary">Ajouter une entreprise</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom de l'entreprise</th>
                <th scope="col">Editer</th>
                <th scope="col">Contacts</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row"><a href="{{ route('company.show', $company->id) }}">{{ $company->name }}
                        </a></th>
                    <td><a href="{{ route('company.edit', $company->id) }}">Editer une entreprise</a></td>
                    <td><a href="{{ route('contact.create', $company->id) }}">Ajouter un contact</a></td>
                    <td><a href="{{ route('company.delete', $company->id) }}">Supprimer une entreprise</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
