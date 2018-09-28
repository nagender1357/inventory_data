@extends('layouts.appInnerLayout')
@section('content')
<div class="container">
		<div class="row">
			<div class="content">	

			  <form method="POST" action="{{ route('post_hotel_landmark', ['id' => $id]) }}"  aria-label="{{ __('Update Landmark') }}" >
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
	@if(Session::has('flash_message_err'))
        <div class="alert alert-danger">
            {{ Session::get('flash_message_err') }}
        </div>
    @endif
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
<div class="clearfix"></div>
					
					<div class="row">
							<div class="col-md-12"><h2>Update Hotel Landmark</h2></div>
					</div>
					<div class="row">
							<div class="col-md-12"><a style="float: right;padding-right: 12px;padding-top: 5px;" href="{{ URL::to('/hotel_listing') }}">Back to hotel listing</a></div>
					</div>
					
					<div class="clearfix"></div>

					<div class="col-md-12">
					<div class="row">

						<div class="col-md-12">
							<div class="infosecDa">
								<ul>
									<li><b>Hotel Name:</b>  <?=$hotel->hotel_name?> </li>
									<li><b>Hotel Code:</b> <?=$hotel->hotel_code?> </li>
								</ul>
								
							</div>
						</div>
<?php 
if($count > 0) { 
	$y=1;
foreach($HotelLandmark as $HotelLandmarks)
	{
	?>

						<div class="col-md-12" id="rowCount1">
							<div class="infosec5">
								<ul >
								<li><label>S No. </label><span><?=$y?></span></li>
									<li><label>Landmark Name <sm>*</sm></label><span><input type="text" name="landmark_name[]" class="form-control" value="<?=$HotelLandmarks->landmark_name?>"></span></li>
									
								<li><label>Distance KM<sm>*</sm></label><span><input onkeypress="return myFunction(event,this.id)" type="text" name="distance_km[]" autocomplete="off" id="km1" class="form-control km" value="<?=$HotelLandmarks->distance_km?>"></span><span id="errmsgdata1" class="errmsgdata"></span></li> 
								<li><label>Description </label><span><textarea  name="description[]" class="form-control" ><?=$HotelLandmarks->description?></textarea></span></li>
								<li><label>&nbsp;</label><a href="{{ URL::to('/delete_landmark/'.$id.'/'.$HotelLandmarks->id) }}">Delete</a></li>
								</ul>
								
							</div>
						</div>
<?php  $y++;} ?>
<?php } else { ?>

					<div class="col-md-12" id="rowCount1">
							<div class="infosec5">
								<ul >
								<li><label>S No. </label><span>1</span></li>
									<li><label>Landmark Name <sm>*</sm></label><span><input type="text" name="landmark_name[]" class="form-control" value="<?=old('landmark_name.0')?>"></span></li>
									
								<li><label>Distance KM<sm>*</sm></label><span><input onkeypress="return myFunction(event,this.id)" type="text" name="distance_km[]" autocomplete="off" id="km1" class="form-control km" value="<?=old('distance_km.0')?>"></span><span id="errmsgdata1" class="errmsgdata"></span></li> 
								<li><label>Description </label><span><textarea  name="description[]" class="form-control" ><?=old('description.0')?></textarea></span></li>
								<li><label>&nbsp;</label><a href="">Delete</a></li>
								</ul>
								
							</div>
						</div>

<?php   } ?> 				
						<div id="ab">
							
						</div>
						<div onclick="addMoreRows(this.form);" class="col-md-12 text-right btnwrap"><a class="btn btn-sm btn-primary">Add More</a></div>
						
						
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
    <script>
    <?php 
    if($count>0)
    	{ 
    ?>
    var rowCount = <?=$count?>;
    <?php } else {  ?>
    	var rowCount = 1;
    <?php } ?>
    function addMoreRows(frm) {
    	//alert('addMoreRows');
   rowCount ++;
 
    var recRow = '<div class="col-md-12" id="rowCount'+rowCount+'"><div class="infosec5"><ul><li><label>&nbsp; </label><span>'+rowCount+'</span></li><li><label>Landmark Name </label><span><input type="text" name="landmark_name[]" class="form-control" value=""></span></li><li><label>Distance KM</label><span><input type="text" autocomplete="off" id="km'+rowCount+'"  name="distance_km[]" class="form-control km" onkeypress="return myFunction(event,this.id)" value=""><span id="errmsgdata'+rowCount+'" class="errmsgdata"></span></span></li><li><label>Description </label><span><textarea  name="description[]" class="form-control" ></textarea></span></li><li><label>&nbsp;</label><a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></li></ul></div></div>'; 
   jQuery('#ab').append(recRow);onclick="removeRow('+rowCount+');"
}
function removeRow(removeNum) {
jQuery('#rowCount'+removeNum).remove();
}

function myFunction(e,id)
{
	 var res = id.replace("km", "");
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        jQuery("#errmsgdata"+res).html("Integer Only").show().fadeOut("slow");
               return false;
    }
}

</script>
@endsection