@extends('layouts.appInnerLayout')
@section('content')
<div class="container">
		<div class="row">
			<div class="content">	

			  <form method="POST" action="{{ route('edit_hotel', ['id' => $id]) }}" aria-label="{{ __('Update') }}" enctype="multipart/form-data">
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
@if(Session::has('flash_message'))
    <div class="alert alert-success">
  <!--   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button> -->
        {{ Session::get('flash_message') }}
    </div>
@endif
        <div class="col-md-12">
			<h2>Update Hotel </h2>
		 </div>
		<div class="row">
			<div class="col-md-12"><a class="back" href="{{ URL::to('/hotel_listing') }}">Back To Hotel Listing</a></div>
		</div>
			<div class="clearfix"></div>
					<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="infosec">
								<ul>
									<li><label>Hotel Name <sm>*</sm></label><span><input type="text" name="hotel_name" class="form-control" value="<?php if(old('hotel_name')!='') { echo old('hotel_name');} else { echo $hotel->hotel_name;} ?>"></span></li>
									<li><label>Hotel Code <sm>*</sm></label><span><input type="text" name="hotel_code" class="form-control" value="<?php if(old('hotel_code')!='') { echo old('hotel_code');} else { echo $hotel->hotel_code;} ?>"></span></li>
								<li><label>Conact Person <sm>*</sm></label><span><input type="text" name="contact_person" class="form-control" value="<?php if(old('hotel_name')!='') { echo old('contact_person');} else { echo $hotel->contact_person;} ?>"></span></li>
								
								</ul>
								
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="infosec">
								<ul>
								<li><label>Contact Email Id <sm>*</sm></label><span><input type="text" name="contact_email_id" class="form-control" value="<?php if(old('contact_email_id')!='') { echo old('contact_email_id');} else { echo $hotel->contact_email_id;} ?>"></span></li>
									<li><label>Address Line1 <sm>*</sm></label><span><textarea name="address_line1" class="form-control"><?php if(old('address_line1')!='') { echo old('address_line1');} else { echo $hotel->address_line1;} ?></textarea></span></li>
								<li><label>Address Line2</label><span><textarea  name="address_line2" class="form-control"><?php if(old('address_line2')!='') { echo old('address_line2');} else { echo $hotel->address_line2;} ?></textarea></span></li>
								
								</ul>
								
							</div>
						</div>

						<div class="col-md-12">
							<div class="infosec">
								<ul>
								<li><label>Start Rating <sm>*</sm></label><span><input value="<?php if(old('star_rating')!='') { echo old('star_rating');} else { echo $hotel->star_rating;} ?>" type="text" name="star_rating" class="form-control"></span></li>	
								<li><label>Latitude <sm>*</sm></label><span><input value="<?php if(old('latitude')!='') { echo old('latitude');} else { echo $hotel->latitude;} ?>" type="text" name="latitude" class="form-control"></span></li>
								<li><label>Longitude <sm>*</sm></label><span><input value="<?php if(old('longitude')!='') { echo old('longitude');} else { echo $hotel->longitude;} ?>" type="text" name="longitude" class="form-control"></span></li>
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
									<option <?php if(old('country')!='' && old('country')==$country_listings->country_id) { echo "selected";} 
										elseif($country_listings->country_id==$hotel->country)
										{
										  echo "selected";	
										}
									?> value="<?=$country_listings->country_id?>"><?=$country_listings->country_name?></option>
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
							<li>

  <div class="media">
                            <div class="med_list media-left">
                            <?php
								$hotel_images=$hotel->hotel_images;
								if($hotel_images!='')
								{
								$hotel_images_arr=explode(',', $hotel_images);
								$count_image =count($hotel_images_arr);
								}
								else
								{
									$count_image =0;
								}
                            
                                if(isset($id) && $count_image>0)
                                {
                                	$y=1;
                                    for($x=0 ; $x <  $count_image ; $x++)
									{
								?>
                                        <div id="abcd_1" class="abcd">
                                         <img src="{{ URL::asset('images/'.$hotel_images_arr[$x]) }}" width="100" alt="image">
                                         <a href="{{ url('galleryimage_delete/'.$hotel->id.'/'.$x) }}"><img id="img" src="{{ asset('frontend/img/x.png') }}" alt="delete"></a>
                                        </div>
                                        <?php
                                        $y++;
                                    }
                                }
                                ?>  

                                                             
                            </div>
                             
                        </div>
							<label>Images</label><span>
									<div class="file-loading">
			                            <input id="image-file" type="file" name="file[]" accept="image/*" data-min-file-count="1" multiple>
			                        </div>
								</span></li>
							</ul>
							</div>
							</div>
						<div class="col-md-12 text-right btnwrap"><button class="btn btn-sm btn-primary">Update</button></div>
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
      		    <?php } else{?>
				 getstateData("<?=$hotel->country?>",<?=$hotel->state?>);
               	<?php } ?>




				 <?php if(old('state_id')!='') {?>
					getstateData("{!! old('country') !!}",{!! old('state_id') !!});
			        getcityData({!! old('state_id') !!},{!! old('city_id') !!});
	        	<?php } else { ?>
	        		getstateData("<?=$hotel->country?>",<?=$hotel->state?>);
			        getcityData(<?=$hotel->state?>,<?=$hotel->city?>);
	        	<?php  } ?>



		        <?php if(old('city_id')!='') {?>
					getcityData({!! old('state_id') !!},{!! old('city_id') !!});
		        <?php } else { ?>
		        	getcityData(<?=$hotel->state?>,<?=$hotel->city?>);
		        <?php  } ?>

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