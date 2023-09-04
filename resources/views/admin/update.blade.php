@extends('userlayout.master')

@section('title')
QUIZ
@endsection
@section('content')
<div class="container">
    <h1>Quiz Details</h1>
    <h2>Quiz Information</h2>

    {{ csrf_field() }}
    <form action="{{ route('update.quiz', ['quiz_id' => $quiz->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Edit Quiz</h1>

        <h2>Quiz Information</h2>
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $quiz->title }}" required><br>

        <label for="number_of_questions">Number of Questions:</label>
        <input type="number" name="number_of_questions" value="{{ $quiz->number_of_questions }}" required><br>

        <label for="duration">Duration:</label>
        <input type="text" name="duration" value="{{ $quiz->duration }}" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required>{{ $quiz->description }}</textarea><br>

        <h2>Questions</h2>
        @foreach ($questions as $question)
        <div class="question">
            <label for="question_text">Question:</label>
            <input type="text" name="question_text[]" value="{{ $question->question_text }}" required>

            <label for="multiple">Multiple:</label>
            <input type="checkbox" name="multiple[]" value="{{ $question->id }}" {{ $question->type === 'multiple' ? 'checked' : '' }}>

            <h3>Answers</h3>
            @foreach ($question->answers as $answer)
            <div class="answer">
                <label for="answer_text">Answer:</label>
                <input type="text" name="answer_text[{{ $question->id }}][]" value="{{ $answer->answer_text }}" required>

                <label for="is_correct">Correct:</label>
                <input type="checkbox" name="is_correct[{{ $question->id }}][]" value="{{ $answer->id }}" {{ $answer->is_correct ? 'checked' : '' }}>
            </div>
            @endforeach
        </div>
        @endforeach

        <button type="submit">Save Changes</button>
    </form>





    @endsection