@extends('userlayout.master')

@section('title')
Quiz
@endsection

@section('content')
<div class="container mt-5">
    <!--container start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <h3 class="text-center mb-4">Liste des Quizzes</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>S.N.</th>
                                <th>Titre du Quiz</th>
                                <th>Description</th>
                                <th>Nombre de Questions</th>
                                <th>Nombre d'Utilisateurs Ayant Joué</th>
                                <th>Durée</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($quizzes as $index => $quiz)
                            <tr>
                                <td>{{ ($quizzes->currentPage() - 1) * $quizzes->perPage() + $index + 1 }}</td>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ $quiz->description }}</td>
                                <td>{{ $quiz->number_of_questions }}</td>
                                <td>{{ $quiz->usersPlayedCount() }}</td>
                                <td>{{ $quiz->duration }} min</td>
                                <td>
                                    <a href="{{ route('quiz.play', $quiz->id) }}" class="btn btn-success">Démarrer</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Aucun quiz disponible pour le moment.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $quizzes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection