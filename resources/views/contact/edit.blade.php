<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editer un contact</title>
</head>
<body>
    <h1>Editer un contact</h1>
    <form method="post" action="{{ route('contact.editStore', $contact->id) }}">
        @csrf
        <p>
            <label for="fullname">Nom complet</label>
            <input type="text" id="fullname" name="fullname" value="{{ $contact->fullname }}"/>
        </p>
        <p>
            <label for="jobname">Poste actuel</label>
            <input type="text" id="jobname" name="jobname" value="{{ $contact->jobname }}"/>
        </p>
        <p>
            <label for="phone">Numéro de téléphone</label>
            <input type="text" id="phone" name="phone" value="{{ $contact->phone }}"/>
        </p>
        <p>
            <label for="mail">Adresse e-mail</label>
            <input type="email" id="mail" name="mail" value="{{ $contact->mail }}"/>
        </p>

        <input type="submit" />
    </form>
</body>
</html>
