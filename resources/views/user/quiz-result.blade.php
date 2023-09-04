@extends('userlayout.master')

@section('title')
Résultats du Quiz
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Résultats : {{ $score }}/{{ count($questionsWithAnswers) }}</h1>

            @foreach($questionsWithAnswers as $questionData)
            <div class="panel" style="margin:5%">
                <b>Question: {{ $questionData['question']->question_text }}</b><br><br>

                @foreach($questionData['question']->answers as $answer)
                <div
                    style="color: {{ in_array($answer->id, $questionData['correct_answers']) ? 'green' : (in_array($answer->id, $questionData['selected_answers']) ? 'red' : 'black') }}">
                    - {{ $answer->answer_text }}
                    @if(in_array($answer->id, $questionData['correct_answers']))
                    <i class="fa fa-check" style="color:green"></i>
                    @elseif(in_array($answer->id, $questionData['selected_answers']))
                    <i class="fa fa-times" style="color:red"></i>
                    @endif
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection