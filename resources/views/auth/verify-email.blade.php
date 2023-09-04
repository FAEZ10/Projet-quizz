@extends('base')
@section('title', 'Vérification de l\'adresse e-mail')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __("Vérification de l'adresse e-mail") }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-sm text-dark dark:text-blue-400">
                        Bienvenue dans notre communauté ! Pour finaliser votre inscription, nous vous invitons à
                        vérifier votre adresse
                        e-mail en cliquant sur le lien que nous venons de vous envoyer. Si l'email n'a pas atteint votre
                        boîte de
                        réception, cliquez sur le bouton ci-dessous pour en recevoir un nouveau.
                    </div>

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        Le lien de vérification a été renvoyé avec succès ! Veuillez vérifier votre boîte de réception.
                    </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Renvoyer l'e-mail
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection