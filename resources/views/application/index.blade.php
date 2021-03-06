<!-- Application main page -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"  style="color: #007bff;font-weight:bold;">Vos demandes</h1>
        <a href="{{ route('application.create') }}" class="btn btn-primary mb-2">Ajouter une demande</a>
        <div class="d-flex flex-row align-items-center">
            <p class="mb-0">Trier par</p>
            <button class="btn btn-danger m-2" id="all">Tout</button>
            <button class="btn btn-secondary m-2" id="todo">A faire</button>
            <button class="btn btn-primary m-2" id="running">En cours</button>
            <button class="btn btn-success m-2" id="ended">Terminé</button>
            <button class="btn btn-warning m-2" id="reported">Rappel</button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="color: #007bff;font-size:1.2rem;font-weight:bold;">Nom de l'entreprise</th>
                    <th scope="col" style="color: black;font-size:1.2rem;">Statut</th>
                    <th scope="col" style="color: green;font-size:1.2rem;">Editer</th>
                    <th scope="col" style="color: red;font-size:1.2rem;">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <th scope="row"><a href="{{ route('company.show', $application->company->id) }}">{{ $application->company->name }}</a></th>
                        @if($application->state == 'to-do')
                            <td><span class="badge badge-secondary">A faire</span></td>
                        @elseif($application->state == 'in-progress')
                            <td><span class="badge badge-primary">En cours</span></td>
                        @elseif($application->state == 'done')
                            <td><span class="badge badge-success">Terminé</span></td>
                        @else
                            <td><span class="badge badge-warning">Rappel</span></td>
                        @endif
                        <td><a href="{{ route('application.edit', $application->id) }}" style="color: green;font-weight:bold;">Editer une demande</a></td>
                        <td><a href="{{ route('application.delete', $application->id) }}" data-toggle="modal" style="color: red;font-weight:bold;" data-target="#application{{$application->id}}">Supprimer une demande</a></td>
                        <div class="modal fade" id="application{{$application->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="border-bottom: 0;">
                                        <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLongTitle">Supprimer une demande</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="margin-bottom: 2rem;">
                                    Voulez-vous vraiment supprimer cette demande ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Annuler</button>
                                        <a href="{{ route('application.delete', $application->id) }}"><button type="button" class="btn btn-danger font-weight-bold">Supprimer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
    const badges = document.querySelectorAll("td span.badge");

    document.querySelector('#all').addEventListener('click', ()=>{
        for (let i = 0; i < badges.length; i++) {
            badges[i].parentElement.parentElement.classList.remove('disappear');
        }
    });
    document.querySelector('#todo').addEventListener('click', ()=>{
        sortBadge("A faire")
    });
    document.querySelector('#running').addEventListener('click', ()=>{
        sortBadge("En cours")
    });
    document.querySelector('#ended').addEventListener('click', ()=>{
        sortBadge("Terminé")
    });
    document.querySelector('#reported').addEventListener('click', ()=>{
        sortBadge("Rappel")
    });

    function sortBadge(status) {
        for (let y = 0; y < badges.length; y++) {
            badges[y].parentElement.parentElement.classList.remove('disappear');
            if(badges[y].innerHTML != status){
                badges[y].parentElement.parentElement.classList.add('disappear');
            }
        }
    }

    </script>
@endsection
