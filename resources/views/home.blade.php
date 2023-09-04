<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet quizz || TESTEZ VOS COMPÉTENCES </title>
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
                <span class="logo">Testez Vos Compétences</span>
            </div>
            <!-- Boutons à droite -->
            <div class="col-md-3 text-right">
                <a href="{{ route('login') }}" class="btn btn-block sub1 btn-yellow">
                    <i class="fas fa-sign-in-alt mr-2"></i>Connexion
                </a>
            </div>
            <div class="col-md-3 text-right">
                <a href="{{ route('register.form') }}" class="btn btn-block sub1 btn-yellow">
                    <i class="fas fa-user-plus mr-2"></i>Inscription
                </a>
            </div>
        </div>
    </div>




    <div class="bg1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="display-4">Bienvenue sur Testez Vos Compétences!</h2>
                    <p class="lead">Inscrivez-vous ou connectez-vous pour commencer le quizz.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="" target="_blank">À propos de nous</a>
                </div>
                <div class="col-md-4">
                    <a href="#" data-toggle="modal" data-target="#developers">Développeurs</a>
                </div>
                <div class="col-md-4">
                    <a href="" target="_blank">Retour d'information</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal For Developers-->
    <div class="modal fade title1" id="developers">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                    <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Développeurs</span>
                    </h4>
                </div>
                <div class="modal-body">
                    <p>
                    <div class="row">
                        <div class="col-md-5">
                            <a href="" style="color:#202020; font-family:'typo' ; font-size:18px" title="Trouver sur Facebook">GROUPE 4 ESGI</a>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--footer end-->
</body>

</html>