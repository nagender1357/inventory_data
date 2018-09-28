@extends('layouts.appInnerLayout')
@section('content')
<div class="container"> 
		<div class="row">
			<div class="content">	

                        @csrf	

				<div class="formui">
				@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
<div class="clearfix"></div>
					
					<div class="row">
							<div class="col-md-12"><h2>Update Hotel Room Amenties</h2></div>
					</div>
					<div class="row">
							<div class="col-md-12"><a style="float: right;padding-right: 12px;padding-top: 5px;" href="{{ URL::to('/hotel_room_listing') }}">Back</a></div>
					</div>
					
					<div class="clearfix"></div>
               <form method="POST" action="{{ route('room_rate_save') }}" aria-label="{{ __('Create') }}" enctype="multipart/form-data">	                          {{ csrf_field() }}
					<div class="col-md-12">
					<div class="row">
				
                                            <input type="hidden" name="fk_hotel_master_id" value="{{$hotel_id}}">
                                            <input type="hidden" name="fk_hotelroom_master_id" value="{{$id}}">
						<div class="col-md-12">
							<div class="infosec">
                                                      
								<ul>
								<li><label>From Date <sm></sm></label><span><input type="text" name="from_date" id="from_date" class="form-control" value="{!! old('from_date') !!}"></span>
                                                                </li>
								<li><label>From Date<sm></sm></label><span><input type="text" name="to_date" id="to_date" class="form-control" value="{!! old('to_date') !!}"></span></li>
                                                                <li><label>Rate &nbsp;<span id="errmsg"></span><sm></sm></label><span><input type="text" name="rate" id="rate" class="form-control" value="{!! old('rate') !!}"></span></li>
								</ul>
							
							</div>
                                                    
							</div>

						
            <div class="col-md-12 text-right btnwrap"><button class="btn btn-sm btn-primary">Submit</button></div>                   
					</div>
					</div>  </form>
				</div>

				
			</div>				
		</div>			
	</div>
<!-- this line for calendra-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
        $('#from_date').datepicker({
            dateFormat: 'yy-mm-dd'
        });
          $('#to_date').datepicker({
            dateFormat: 'yy-mm-dd'
        });
  </script> 
 <script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#rate").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
  </script>
  <style>
      #errmsg
        {
        color: red;
        }
  </style>
  <!-- end of calendra -->
@endsection