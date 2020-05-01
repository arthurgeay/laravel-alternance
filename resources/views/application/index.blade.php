@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Vos demandes</h1>
        <a href="{{ route('application.create') }}" class="btn btn-primary">Ajouter une demande</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom de l'entreprise</th>
                <th scope="col">Statut</th>
                <th scope="col">Editer</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <th scope="row"><a href="{{ route('company.show', $application->company->id) }}">{{ $application->company->name }}</a></th>
                    @if($application->state == 'to-do')
                        <td><span class="badge badge-primary">A faire</span></td>
                    @elseif($application->state == 'in-progress')
                        <td><span class="badge badge-info">En cours</span></td>
                    @elseif($application->state == 'done')
                        <td><span class="badge badge-success">Terminé</span></td>
                    @else
                        <td><span class="badge badge-warning">Rappel</span></td>
                    @endif
                    <td><a href="{{ route('application.edit', $application->id) }}">Editer une demande</a></td>
                    <td><a href="{{ route('application.delete', $application->id) }}">Supprimer une demande</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
