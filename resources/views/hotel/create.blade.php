@extends('layouts.appInnerLayout')
@section('content')
<div class="container">
		<div class="row">
			<div class="content">	

			  <form method="POST" action="{{ route('add_hotel') }}" aria-label="{{ __('Create') }}" enctype="multipart/form-data">
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
					<h2>Add Hotel</h2>

					<div class="row">
							<div class="col-md-12"><a class="back" href="{{ URL::to('/hotel_listing') }}">Back To Hotel Listing</a></div>
					</div>
					
					<div class="clearfix"></div>
					<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="infosec">
								<ul >
									<li><label>Hotel Name <sm>*</sm></label><span><input type="text" name="hotel_name" class="form-control" value="<?php echo old('hotel_name') ;?>"></span></li>
									<li><label>Hotel Code <sm>*</sm></label><span><input type="text" name="hotel_code" class="form-control" value="<?php echo old('hotel_code') ;?>"></span></li>
								<li><label>Conact Person <sm>*</sm></label><span><input type="text" name="contact_person" class="form-control" value="{!! old('contact_person') !!}"></span></li>
								
								</ul>
								
							</div>
						</div>
						
						


						<div class="col-md-12">
							<div class="infosec">
								<ul>
								<li><label>Contact Email Id <sm>*</sm></label><span><input type="text" name="contact_email_id" class="form-control" value="{!! old('contact_email_id') !!}"></span></li>
									<li><label>Address Line1 <sm>*</sm></label><span><textarea value="{!! old('address_line1') !!}" name="address_line1" class="form-control"></textarea></span></li>
								<li><label>Address Line2</label><span><textarea value="{!! old('address_line2') !!}" name="address_line2" class="form-control"></textarea></span></li>
								
								</ul>
								
							</div>
						</div>

						<div class="col-md-12">
							<div class="infosec">
								<ul>
								<li><label>Start Rating <sm>*</sm></label><span><input value="{!! old('star_rating') !!}" type="text" name="star_rating" class="form-control"></span></li>	
								<li><label>Latitude <sm>*</sm></label><span><input value="{!! old('latitude') !!}" type="text" name="latitude" class="form-control"></span></li>
								<li><label>Longitude <sm>*</sm></label><span><input value="{!! old('longitude') !!}" type="text" name="longitude" class="form-control"></span></li>
								</ul>
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="infosec">
								<ul>
								<li><label>Country <sm>*</sm></label><span>
								<select id="country_id" name="country" class="form-control" onchange="countryClick();" >
								<option value="">--Select Country--</option> 
								<?php
								foreach($country_listing as $country_listings)
								{
								?>
									<option <?php if(old('country')!='' && old('country')==$country_listings->country_id) { echo "selected";} ?> value="<?=$country_listings->country_id?>"><?=$country_listings->country_name?></option>
								<?php
								}
								?>
								</select> 
								</span></li> 
								<li><label>State <sm>*</sm></label><span>

									<select onchange="stateClick();" id="state_id" name="state_id" class="form-control">
								<option value="">--Select State--</option>
								</select> 

								</span></li>
									<li><label>City <sm>*</sm></label><span>
									<select id="city_id" name="city_id" class="form-control">
										<option value="">--Select City--</option>
										</select> 
									</li>
								</ul>
								
							</div>
						</div>
						
							<div class="col-md-12">
							<div class="infosec">
							<ul class="form-ui">
							<li><label>Images</label><span>
									<div class="file-loading">
			                            <input id="image-file" type="file" name="file[]" accept="image/*" data-min-file-count="1" multiple>
			                        </div>
								</span></li>
							</ul>
							</div>
							</div>
						<div class="col-md-12 text-right btnwrap"><button class="btn btn-sm btn-primary">Submit</button></div>
					</div>
					</div>
				</div>

				</form>
			</div>				
		</div>			
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

	<script type="text/javascript">
        $("#image-file").fileinput({
            theme: 'fa',
            uploadUrl: "{{route('image.upload')}}",
            uploadExtraData: function() {
                return {
                    _token: "{{ csrf_token() }}",
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
            overwriteInitial: false,
            maxFileSize:2048,
            showUpload: false,
            maxFilesNum: 10
        });
    </script>
     <script type="text/javascript">
function countryClick()
        	{
               var cat=$("#country_id").val();
               //alert('cat==='+cat);
			   if(cat!='')
			   {
						$.ajax({
						type: "GET",
						 url: "{{ URL::to('ajax_state') }}/"+cat,
						 //data: "cat=" + cat,
						 success: function(result){

							 $("#state_id").html(result);
						  }
						});
			   }
			   else{
				 $("#state_id").html('<option value="">--Select State--</option>'); 
				  $("#city_id").html('<option value="">--Select City--</option>');   
				   
			   }
			}

			function stateClick()
        	{
                 var state_id=$("#state_id").val();
			   if(state_id!='')
			   {
						$.ajax({
						type: "GET",
						 url: "{{ URL::to('ajax_city') }}/"+state_id,
						 //data: "cat=" + cat,
						 success: function(result){

							 $("#city_id").html(result);
						  }
						});
			   }
			   else{

				 $("#city_id").html('<option value="">--Select City--</option>');  
				   
			   }
			}
			 <?php if(old('country')!='') {?>
				getstateData("{!! old('country') !!}",{!! old('state_id') !!});
        <?php } ?>
			 <?php if(old('state_id')!='') {?>
				getstateData("{!! old('country') !!}",{!! old('state_id') !!});
		        getcityData({!! old('state_id') !!},{!! old('city_id') !!});
        <?php } ?>
        <?php if(old('city_id')!='') {?>
				getcityData({!! old('state_id') !!},{!! old('city_id') !!});
        <?php } ?>

        function getstateData(country,state)
		        	{
					  var xhttp; 
					  xhttp = new XMLHttpRequest();
					  xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200) {
					   $("#state_id").html(this.responseText) ;
					    }
					  };
					  xhttp.open("GET", "{{ URL::to('ajax_state') }}/"+country+"/"+state, true);
					  xhttp.send();
		          }
     function getcityData(state,city)
		        	{
		        		alert('state---'+state);
		        		alert('city---'+city);
					  var xhttp; 
					  xhttp = new XMLHttpRequest();
					  xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200) {
					   $("#city_id").html(this.responseText) ;
					    }
					  };
					  xhttp.open("GET", "{{ URL::to('ajax_city') }}/"+state+"/"+city, true);
					  xhttp.send();
		          }
		
</script> 
@endsection