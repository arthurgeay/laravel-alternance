<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Entreprise</title>
    </head>
    <body>

    <a href="{{ route('company.create') }}">Ajouter une entreprise</a>
    @foreach($companies as $company)
        <p>
            <a href="{{ route('company.show', $company->id) }}">{{ $company->name }}
            </a> - <a href="{{ route('company.edit', $company->id) }}">Editer une entreprise</a>
            - <a href="{{ route('company.delete', $company->id) }}">Supprimer une entreprise</a>
        </p>
    @endforeach


    </body>
</html>
