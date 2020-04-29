<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $company->name }}</title>
</head>
    <body>
        <h1>{{ $company->name }}</h1>
        <p>Secteur d'activité : {{ $company->area_activity }}</p>
        <p>Adresse : {{ $company->address }}</p>
        <p>Adresse e-mail :{{ $company->email }}</p>
        <p>Numéro de téléphone : {{ $company->phone }}</p>

        <a href="{{ route('company.edit', $company->id) }}">Editer l'entreprise</a>
        <a href="{{ route('company.delete', $company->id) }}">Supprimer l'entreprise</a>

        <h2>Liste des contacts - <a href="{{ route('company.edit', $company->id) }}">Ajouter un contact</a></h2>
        @foreach($contacts as $contact)
            <p>{{ $contact->fullname }} - {{ $contact->jobname }} - {{ $contact->phone }} - {{ $contact->mail }} - <a href="{{ route('contact.edit', $contact->id) }}">Modifier</a> | <a href="{{ route('contact.delete', $contact->id) }}">Supprimer</a></p>
        @endforeach
    </body>
</html>
