@extends('userlayout.master')

@section('title')
DASHBOARD
@endsection

@section('content')
<div class="container">
  <!--container start-->
  <div class="row">
    <div class="col-md-12">
      <!--home start-->
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

            </tr>
            <input type="hidden" {{$increment++}}>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--container closed-->
@endsection