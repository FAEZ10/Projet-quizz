@extends('userlayout.master')

@section('title')
Classement des utilisateurs
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Classement des utilisateurs</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Nom de l'utilisateur</th>
                        <th>Score Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ App\Models\User::find($user->user_id)->name }}</td>
                        <td>{{ $user->total_score }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection