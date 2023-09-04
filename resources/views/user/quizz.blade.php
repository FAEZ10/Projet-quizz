@extends('userlayout.master')

@section('title')
   QUIZZ
@endsection

@section('content')
 
      <!--container start-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel" style="margin:5%">
              <b>Question &nbsp;1&nbsp;::
              <br />What is Laravel</b><br /><br />
                <form action="" method="POST"  class="form-horizontal">
                  <input type="radio" name="ans" value="624174e59fa97">&nbsp;Laravel is a Python Framework<br /><br />
                  <input type="radio" name="ans" value="624174e59fa97">&nbsp;Laravel is a Python Framework<br /><br />
                  <input type="radio" name="ans" value="624174e59fa98">&nbsp;Laravel is a Java Framework<br /><br />
                  <input type="radio" name="ans" value="624174e59fa99">&nbsp;Laravel is a C# Framework<br /><br /><br />
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection