@extends('userlayout.master')

@section('title')
    RANKING
@endsection

@section('content')
<div class="container"><!--container start-->
        <div class="row">
          <div class="col-md-12">
            <div class="panel title">
              <div class="table-responsive">
                <table class="table table-striped title1" >
                  <tr style="color:red">
                    <td><b>Rank</b></td>
                    <td><b>Name</b></td>
                    <td><b>Gender</b></td>
                    <td><b>College</b></td>
                    <td><b>Score</b></td>
                  </tr><br />
                  <tr>
                    <td style="color:#99cc32"><b>4</b></td>
                    <td>Héritier</td>
                    <td></td>
                    <td></td>
                    <td>1</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td style="color:#99cc32"><b>5</b></td>
                    <td>Héritier</td>
                    <td>M</td>
                    <td>ISPT_KIN</td>
                    <td>-1</td>
                    <td></td>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection