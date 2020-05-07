@extends('layouts.app')

@section('content')

    <div class="container">

        <a style="position: fixed; top: 10%; left: 1%;font-size:.8rem;" href="{{ route('company.create') }}" class="btn btn-primary">Ajouter une entreprise</a>

        <div class="table-responsive">
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
                        <th scope="row"><img src="{{ $company->img ? $company->img : 'building.png' }}" style="max-width: 25px; max-height: 25px; margin-right: 10px;"><a href="{{ route('company.show', $company->id) }}">{{ $company->name }}
                            </a></th>
                        <td><a href="{{ route('company.edit', $company->id) }}">Editer une entreprise</a></td>
                        <td><a href="{{ route('contact.create', $company->id) }}">Ajouter un contact</a></td>
                        <td><a href="{{ route('company.delete', $company->id) }}">Supprimer une entreprise</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $companies->links() }}
    </div>


@endsection
