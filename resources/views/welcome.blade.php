@extends('layouts.app')

@section('content')

<div class="container">
      <center><h2>Job Seekers Form</h2><br/></center>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

</h3>
      <form method="post" action="{{url('insertjobseeker')}}" enctype="multipart/form-data">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="email">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="webaddess">Web Address</label>
              <input type="text" class="form-control" name="webaddress">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="coverletter">Cover Letter</label>
              <input type="text" class="form-control" name="coverletter">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="cvname">Attachment</label>
              <input type="file" class="form-control" name="cvname">
            </div>
          </div>
              <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="cv">Do you like working?</label>
              <label class="radio-inline"> <input type="radio" class="" name="like_working" value="1" checked>Yes</label>
               <label class="radio-inline"> <input type="radio" class="radio-inline " name="like_working" value="0">No</label>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
             <div class="captcha">
               <span>{{ captcha_img() }}</span>
               <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
               </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
             <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"></div>
          </div>
        <div id = 'forIPaddress'>
            <input type="hidden" class="form-control"  name="ip_address" value="{{ $_SERVER['REMOTE_ADDR']}}">
        </div>
    
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>


<script type="text/javascript">
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'refreshcaptcha',
     success:function(data){

        $(".captcha span").html(data.captcha);
     }
  });
});
</script>
</html>

@endsection
