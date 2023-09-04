<div class="header">
    <div class="row">
        <div class="col-lg-6">
            <span class="logo">Testez Vos Compétences</span>
        </div>
        <div class="col-md-4 col-md-offset-2">
            @auth
            <span class="pull-right top title1">
                <span class="log1">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;Bonjour, {{ Auth::user()->name }}
                </span>

                &nbsp;|&nbsp;
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="log">
                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Se déconnecter
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </span>
            @endauth
        </div>
    </div>
</div>

<div class="bg">
    <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Netcamp</b></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{request()->is('user/home')?'active':''}}">
                        <a href="{{url('/quizzes')}}"><span class="glyphicon glyphicon-home"
                                aria-hidden="true"></span>&nbsp;Accueil</a>
                    </li>
                    <li class="{{request()->is('user/history')?'active':''}}">
                        <a href="{{url('/quiz-history')}}"><span class="glyphicon glyphicon-list-alt"
                                aria-hidden="true"></span>&nbsp;Historique</a>
                    </li>
                    <li class="{{request()->is('user/ranking')?'active':''}}">
                        <a href="{{url('/leaderboard')}}"><span class="glyphicon glyphicon-stats"
                                aria-hidden="true"></span>&nbsp;Classement</a>
                    </li>
                    @role('admin')
                    <li class="{{request()->is('admin/dashboard')?'active':''}}"><a
                            href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                    <li class="{{request()->is('admin/users')?'active':''}}"><a
                            href="{{url('/admin/users')}}">Utilisateurs</a></li>

                    <li class="dropdown  {{request()->is('admin/questionsdetails')?'active':''}} {{request()->is('admin/quizdetails')?'active':''}} 
                        {{request()->is('admin/removequiz')?'active':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Quiz<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/admin/quizz')}}">Ajouter un Quiz</a></li>
                            <li><a href="{{url('/admin/removequiz')}}">Supprimer un Quiz</a></li>
                        </ul>
                    </li>

                    @endrole

                </ul>

            </div>
        </div>
    </nav>