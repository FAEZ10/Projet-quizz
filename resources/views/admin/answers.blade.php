@extends('userlayout.master')

@section('title')
REPONSE
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span class="title1" style="margin-left:40%;font-size:30px;"><b>Insérer des Réponses</b></span><br /><br />
            <form class="form-horizontal" name="form" action="{{ url('/admin/saveanswer') }}" method="POST">
                {{ csrf_field() }}

                @foreach($questions as $i => $question)
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="hidden" name="answers[{{ $i }}][question_id]" value="{{ $question->id }}">
                        <p><b>Question:</b> {{ $question->question_text }}</p>
                        <input type="hidden" name="answers[{{ $i }}][number_of_answers]"
                            value="{{ $question->number_of_answers }}">
                    </div>
                </div>

                @for ($j = 1; $j <= $question->number_of_answers; $j++)
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="reponse{{ $i }}_{{ $j }}">Réponse {{ $j }}:</label>
                        <div class="col-md-8">
                            <input type="text" name="answers[{{ $i }}][answer_text][]" class="form-control"
                                placeholder="Saisissez la réponse {{ $j }}" required>
                            <input type="checkbox" name="answers[{{ $i }}][is_correct][]" value="{{ $j }}"
                                id="correct{{ $i }}_{{ $j }}"> Correct
                        </div>
                    </div>
                    @endfor
                    @endforeach

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Ajouter la Réponse</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelector('form[name="form"]').addEventListener('submit', function(event) {
    var questionGroups = document.querySelectorAll('.question-group');
    var error = false;

    questionGroups.forEach(function(group) {
        var questionType = group.getAttribute('data-type');
        var checkboxes = group.querySelectorAll('input[type="checkbox"]:checked');

        if (questionType === 'single' && checkboxes.length > 1) {
            error = true;
            alert(
                'Opération impossible ! Vous ne pouvez cocher qu\'une seule case pour les questions de type "single".'
                );
        }
    });

    if (error) {
        event.preventDefault();
    }
});
</script>

@endsection