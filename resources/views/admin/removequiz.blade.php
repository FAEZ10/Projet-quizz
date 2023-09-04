@extends('userlayout.master')

@section('title')
REMOVE QUIZ
@endsection

@section('content')

<div class="container">
  <!--container start-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel">
        <div class="table-responsive">
          <table class="table table-striped title1">
            <tr>
              <td><b>S.N.</b></td>
              <td><b>Title</b></td>
              <td><b>Number of Question</b></td>
              <td><b>Duration</b></td>
              <td><b>Created By</b></td>
              <td><b>Description</b></td>
              <td></td>
            </tr>


            <input type="hidden" {{$increment=1}}>
            @foreach($quizzes as $quiz)
            <tr>
              <td>{{$increment}}</td>
              <td>{{$quiz->title}}</td>
              <td>{{$quiz->number_of_questions}}</td>
              <td>{{$quiz->duration}}&nbsp;min</td>
              <td>{{$quiz->created_by}}</td>
              <td>{{$quiz->description}}</td>
              <td><b><a href="/admin/delete/{{ $quiz->id }}" class="pull-right btn sub1" style="margin:0px;background:red">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1">
                      <b>Remove</b></span></a></b></td>
            </tr>
            <input type="hidden" {{$increment++}}>
            @endforeach

        </div>
        <!--container closed-->
        @endsection