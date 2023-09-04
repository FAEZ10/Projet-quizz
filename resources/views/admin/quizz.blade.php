@extends('userlayout.master')

@section('title')
QUIZ
@endsection

@section('content')


<!--container start-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz
            Details</b></span><br /><br />
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <form class="form-horizontal title1" name="form" action="{{url('/admin/savequiz')}}" method="POST">
            {{ csrf_field() }}
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="name"></label>
              <div class="col-md-12">
                <input id="name" name="title" placeholder="Enter Quiz title" class="form-control input-md" type="text">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="total"></label>
              <div class="col-md-12">
                <input id="total" name="number_of_questions" placeholder="Enter total number of questions" class="form-control input-md" type="number">

              </div>
            </div>

            <!-- Text input-->


            <!-- Text input
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="wrong"></label>  
                    <div class="col-md-12">
                    <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                      
                    </div>
                  </div> -->

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="time"></label>
              <div class="col-md-12">
                <input id="time" name="duration" placeholder="Enter duration for test in minute" class="form-control input-md" min="1" type="number">

              </div>
            </div>

            <!-- Text input-->
            <!-- <div class="form-group">
                    <label class="col-md-12 control-label" for="tag"></label>  
                    <div class="col-md-12">
                    <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
                      
                    </div>
                  </div> -->

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="desc"></label>
              <div class="col-md-12">
                <textarea rows="8" cols="8" name="description" class="form-control" placeholder="Write description here..."></textarea>
              </div>
            </div>



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
@endsection