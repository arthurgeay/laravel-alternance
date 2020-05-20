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
                        <td><a href="" data-toggle="modal" data-target="#exampleModalCenter">Supprimer une entreprise</a></td>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Supprimer l'entreprise</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    Voulez-vous vraiment supprimer l'entreprise ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <a href="{{ route('company.delete', $company->id) }}"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $companies->links() }}
    </div>


@endsection
