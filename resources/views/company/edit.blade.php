<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editer une entreprise</title>
</head>
<body>
<h1>Editer une entreprise</h1>
    <form method="post" action="{{ route('company.editStore', $company->id) }}">
        @csrf
        <p>
            <label for="name">Nom de l'entreprise</label>
            <input type="text" id="name" name="name" value="{{ $company->name }}"/>
        </p>
        <p>
            <label for="area_activity">Secteur d'activité</label>
            <input type="text" id="area_activity" name="area_activity" value="{{ $company->area_activity }}"/>
        </p>
        <p>
            <label for="address">Adresse</label>
            <textarea id="address" name="address">{{ $company->address }}</textarea>
        </p>
        <p>
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" placeholder="Adresse e-mail" value="{{ $company->email }}"/>
        </p>
        <p>
            <label for="phone">Numéro de téléphone</label>
            <input type="text" id="phone" name="phone" placeholder="Numéro de téléphone" value="{{ $company->phone }}"/>
        </p>
        <input type="submit" />
    </form>

    <h2>Ajouter un contact</h2>
    <form method="post" action="{{ route('contact.store', $company->id) }}">
        @csrf
        <p>
            <label for="fullname">Nom complet</label>
            <input type="text" id="fullname" name="fullname" />
        </p>
        <p>
            <label for="jobname">Poste actuel</label>
            <input type="text" id="jobname" name="jobname" />
        </p>
        <p>
            <label for="mail">Adresse e-mail</label>
            <input type="text" id="mail" name="mail" />
        </p>
        <p>
            <label for="phone">Numéro de téléphone</label>
            <input type="text" id="phone" name="phone" />
        </p>

        <input type="submit" />

    </form>
</body>
</html>
