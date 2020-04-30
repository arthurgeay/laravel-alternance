@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Vos demandes</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom de l'entreprise</th>
                <th scope="col">Editer</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    <tr>
                        <th scope="row"><a href="">{{ $application->company->name }}</a></th>
                        <td><a href="#">Editer une demande</a></td>
                        <td><a href="#">Supprimer une demande</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
