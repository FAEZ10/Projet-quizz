<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"> <!-- Définit l'encodage du document. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Rend la page web responsive sur les appareils mobiles. -->

    <!-- Token CSRF pour la sécurité des formulaires -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Le titre de la page est défini par le nom de l'application ou par 'Laravel' si aucun nom n'est défini. -->
    <title>@yield('title') </title>

    <!-- Polices -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <!-- Pré-résolution DNS pour optimiser le chargement des polices -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> <!-- Lien vers la police Nunito. -->

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Intégration de Vite pour compiler et inclure les scripts et styles de l'application. -->
    <title>Project quizz || TEST YOUR SKILL </title>
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/font.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}">

    <script src="{{ asset('style/js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('style/js/bootstrap.min.js') }}" type="text/javascript"></script>


    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


</head>

<body>
    <div class="header">

        <div class="row">
            <!-- Logo à gauche -->
            <div class="col-md-6 text-left">
                <a href="{{ route('home') }}" class="logo">Testez Vos Compétences</a>
            </div>
            <!-- Boutons à droite -->

            @if(Route::currentRouteName() !== 'login')
            <div class="col-md-3 text-right">
                <a href="{{ route('login') }}" class="btn btn-block sub1 btn-yellow">
                    <i class="fas fa-sign-in-alt mr-2"></i>Connexion
                </a>
            </div>
            @endif
            @if(Route::currentRouteName() !== 'register.form')
            <div class="col-md-3 text-right">
                <a href="{{ route('register.form') }}" class="btn btn-block sub1 btn-yellow">
                    <i class="fas fa-user-plus mr-2"></i>Inscription
                </a>
            </div>
            @endif
        </div>
    </div>

    </div>


    <!-- Contenu principal -->
    <main class="py-4">
        @yield('content')
        <!-- Rend le contenu spécifié dans les sections 'content' des vues enfant. -->
    </main>
</body>

</html>