@extends('userlayout.master')

@section('title')
Détails du Quiz
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Score : {{ $score ? $score : 'Score non disponible' }}/{{ count($quizDetails) }}</h1>

            @foreach($quizDetails as $questionData)
            <div class="panel" style="margin:5%">
                <b>Question: {{ $questionData->question->question_text }}</b><br><br>

                @foreach($questionData->question->answers as $answer)
                <div
                    style="color: {{ $questionData->answer && $answer->id == $questionData->answer->id ? ($answer->is_correct ? 'green' : 'red') : 'black' }}">
                    - {{ $answer->answer_text }}
                    @if($questionData->answer && $answer->id == $questionData->answer->id)
                    <i class="fa fa-check" style="color: {{ $answer->is_correct ? 'green' : 'red' }}"></i>
                    @endif
                    @if($answer->is_correct)
                    <i class="fa fa-check" style="color:green"></i>
                    @endif
                </div>
                @endforeach

                <div style="margin-top: 10px;">
                    <b>Votre réponse: </b>
                    {{ $questionData->answer ? $questionData->answer->answer_text : 'Pas de réponse' }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection