@extends('userlayout.master')

@section('title')
Historique des Quiz
@endsection

@section('content')
<div class="container mt-5">
    <!--container start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <h3 class="text-center mb-4">Historique des Quiz</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>S.N.</th>
                                <th>Titre du Quiz</th>
                                <th>Date de participation</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($quizScores as $index => $quizScore)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $quizScore->quiz->title }}</td>
                                <td>{{ $quizScore->created_at->format('d-m-Y') }}</td>
                                <td>{{ $quizScore->score }}</td>
                                <td>
                                    <a href="{{ route('quiz.detail', $quizScore->quiz_id) }}" class="btn btn-info">Voir
                                        les détails</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Pas d'historique de quiz trouvé.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection