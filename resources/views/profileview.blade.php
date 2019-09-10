@extends('layouts.app')

@section('content')
   <link href="{{ asset('css/ratings.css') }}" rel="stylesheet" type="text/css" >

<div class="container">

<h2>{{ $jobseeker->name }}'s Profile</h2>

<table class= 'table table-striped' style="width:100%">
  <tr>
    <th>Name:</th>
    <td>{{ $jobseeker->name }}</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>{{ $jobseeker->email }}</td>
  </tr>
  <tr>
    <th>Web Address</th>
    <td>{{ $jobseeker->webaddress }}</td>
  </tr>
    <tr>
   <th>Cover letter</th>
    <td>{{ $jobseeker->coverletter }}</td>
  </tr>
    <tr>
    <th>CV name</th>
    <td> <a href="/download/{{ $jobseeker->cvname }}">{{ $jobseeker->cvname }}</a></td>
  </tr>
    <tr>
    <th>Like working</th>
    <td>{{ $jobseeker->like_working }}</td>
  </tr>
    <tr>
    <th>IP Address</th>
    <td>{{ $jobseeker->ip_address }}</td>
  </tr>
    </tr>
    <tr>
    <th>Time created</th>
    <td>{{ $jobseeker->created_at }}</td>
  </tr>
</table>
@if( isset( $position) )
<h2>LOCATION</h2>

<table class = "table table-striped" style="width:50%">
  <tr>
    <th>country Name</th>
    <td>{{ $position->countryName }}</td>
  </tr>
  <tr>
    <th>Region Name</th>
    <td>{{ $position->regionName  }}</td>
  </tr>
  <tr>
    <th>City Name</th>
    <td>{{ $position->cityName }}</td>
  </tr>
  <tr>
    <th>Latitude</th>
    <td>{{ $position->latitude }}</td>
  </tr>
  <tr>
    <th>Longitude</th>
    <td>{{ $position->longitude }}</td>
  </tr>
  <tr>
    <th>postalCode</th>
    <td>{{ $position->postalCode }}</td>
  </tr>
</table>
@endif

<div class="form-group">
  <label for="comment"><h2>Comments</h2></label> <span id='successcomment'></span>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>

<link href="{{ asset('css/ratings.css') }}" rel="stylesheet">

<h2>Ratings</h2>

<section class='rating-widget'>
  
  <!-- Rating Stars Box -->
  <div class='rating-stars text-center'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
  </div>
</section>


<a id="postcomments"  class="btn btn-primary">Submit</a>

<!-- <a href="javascript:history.back()" class="btn btn-primary">Back</a> -->

<script type="application/javascript"> 

$(document).ready(function(){

// Send Comment to server

$('#postcomments').click(function(){
$comment = $('#comment').val();

$.ajax({ 
     type:'POST',
     url:'/postcomments',
     data:{'comment':$comment,'jobseeker_id':{{ $jobseeker->id }}},
     success:function(data){
      var obj = JSON.parse(data);
      if(obj.responce == true){
      $('#successcomment').html("<span class='alert alert-success'>Comment Successfully posted</span>").delay(3000).fadeOut(300);
      $('#comment').attr('disabled','disabled');
      $('#postcomments').hide();
      }
     }
  });
})


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});







  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    alert('fdsfd');
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
    
  });

});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
</script>
@endsection

