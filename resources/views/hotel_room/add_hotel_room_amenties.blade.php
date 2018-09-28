@extends('layouts.appInnerLayout')
@section('content')
<div class="container">
		<div class="row">
			<div class="content">	

			  <form method="POST" action="{{ route('add_hotel_room_amenties', ['id' => $id]) }}"  aria-label="{{ __('Update Amenties') }}" >
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
					<div class="col-md-12">
					<div class="row">
						
						
						<div class="col-md-12">
							<div class="infosec">
							<ul class="form-ui">
							<li><label>Hotel Room Amenties <span style="color:green;">( <?=$hotel_room->room_name?> )</span></label>
									<?php
								foreach($amentie_listing as $amentie_listings)
								{ 
										$Selected_HotelAmenity =  \App\PiHotelroomAmenityMapping::where(
						                [
						                    ['fk_hotelroom_master_id', '=', $id],
						                    ['fk_hotelroom_amenties_master_id', '=', $amentie_listings->id],
						                    ['is_active', '=', '1'],
						                ]
					        		)->count();
										//echo"Selecte_HotelAmenity-$Selecte_HotelAmenity<br>";
								?>
								<div class="ckhotel">
							
			                            <input <?php if($Selected_HotelAmenity==1) 
			                            { echo "checked";} ?> type="checkbox" name="hotel_room_amentie[]" value="<?=$amentie_listings->id?>">
			                            <?=$amentie_listings->room_amenity_name?>
			                      </div>      
			                       <?php } ?>
			                      
								</li>
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
@endsection