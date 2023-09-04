@extends('userlayout.master')

@section('title')
QUESTIONS
@endsection

@section('content')

<!--container start-->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question
                        Details</b></span><br /><br />
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form class="form-horizontal title1" name="form" action="{{url('/admin/savequestion')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                        @for ($i = 1; $i <= $quiz->number_of_questions; $i++)
                            <div class="form-group row">
                                <label class="col-md-4 control-label" for="qns{{$i}}">Question number {{$i}}:</label>
                                <div class="col-md-4">
                                    <textarea rows="3" cols="5" name="questions[{{$i}}][question_text]" class="form-control" placeholder="Write question number {{$i}} here..." required></textarea>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="questions[{{$i}}][points]" class="form-control" id="points{{$i}}" placeholder="Points" min="2" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="type{{$i}}">Multiple:</label>
                                    <input type="checkbox" name="questions[{{$i}}][type]" class="form-check-input" id="checkbox{{$i}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="num_answers{{$i}}">Number of Answers:</label>
                                    <input type="number" name="questions[{{$i}}][number_of_answers]" class="form-control" id="num_answers{{$i}}" placeholder="Number of Answers" min="1" required>
                                </div>
                            </div>
                            @endfor

                            <div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12">
                                    <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary" />
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




</form>
</div>
</div>
</div>
</div>
</div>
<!-- end container -->
@endsection