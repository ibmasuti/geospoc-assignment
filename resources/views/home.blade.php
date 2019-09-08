@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
          
                <div class="well">Jobseekers

                    <div class="input-group">
                        <input type="text" class="form-control" id="searchjobseekers"
                            placeholder="Search jobseekers"> <span class="input-group-btn">
                            <button id="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                
                </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="jobseekerstable">
    
                </div>
                      
    </div>
</div>


<script type="application/javascript"> 

$(document).ready(function() {

//----- To View to Job seekers all profile list    
$value = '';
jobseekerview();

$('#submit').unbind('click').click(function() {
//----- To View to Job seekers all profile list with search       
 $value=$('#searchjobseekers').val();
 jobseekerview();
})

function jobseekerview(){
    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data:{'search':$value},
    success:function(data){

    $('.jobseekerstable').html(data);
    }
    });
}

//----- To Open Job Seekers Profile   
$('#openprofile').unbind('click').click(function() {
alert('fdf');
 $value=$('#openprofile').val();

 $.ajax({
    type : 'get',
    url : '{{URL::to('profileview')}}',
    data:{'profileview':$value},
    success:function(data){

    $('.jobseekerstable').html(data);
    }
    });
});

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });


});

</script>

@endsection


