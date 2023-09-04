@extends('userlayout.master')

@section('title')
QUIZZ
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="timer">Temps restant : <span id="time">{{ $quiz->duration }}:00</span></div>
            <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" class="form-horizontal">
                @csrf

                @foreach($quiz->questions as $key => $question)
                <div class="panel" style="margin:5%">
                    <b>Question &nbsp;{{ $key + 1 }}&nbsp;:: {{ $question->question_text }}</b>
                    <br><br>

                    @foreach($question->answers as $answerKey => $answer)
                    <label>
                        @if($question->type == 'multiple')
                        <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $answer->id }}">
                        {{ $answer->text }} &nbsp;
                        @else
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                        {{ $answer->answer_text }} &nbsp;
                        @endif
                    </label>
                    <br><br>
                    @endforeach
                </div>
                @endforeach
                <div class="panel" style="margin:5%">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script>
    let totalSeconds = parseInt('{{ $totalSeconds }}');
    let timerInterval = setInterval(function() {
        totalSeconds--;
        let minutes = Math.floor(totalSeconds / 60);
        let seconds = totalSeconds % 60;

        document.getElementById('time').innerText =
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        if (totalSeconds <= 0) {
            clearInterval(timerInterval);
            document.querySelector('form').submit();

        }

    }, 1000);
</script> -->

@endsection