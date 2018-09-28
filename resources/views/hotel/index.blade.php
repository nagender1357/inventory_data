@extends('layouts.appInnerLayout')
@section('content')

<?php
    // print_r($hotels);
    //  die();
?>
<div class="container">
		<div class="row">
			<div class="content">               
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
                        {{ Session::get('flash_message') }}
                    </div>
          		@endif
					<h2>Hotel Listing</h2>
					<div class="clearfix"></div>
					<div class="col-md-12">
					 <form method="POST" action="{{ route('search_hotel') }}"  aria-label="{{ __('Search Hotel') }}" >
                        @csrf	
					<div class="row">

                            <div class="col-lg-4">
                                <ul class="form-ui">                                
                                    <li><label>Hotel  Name </label><span>
                                            <input type="text" name="hotel_name" class="form-control" value="<?php if(isset($inputs['hotel_name'])) {echo $inputs['hotel_name'] ; }?>">

                                        </span></li>

                                </ul>
                            </div>
                          
                            <div class="col-lg-4">
                                <ul class="form-ui">                                
                                    <li><label>&nbsp;</label><button class="btn btn-sm btn-primary">Search</button></li>
                                </ul>
                            </div>

                        </div>
                        </form>
                        <div class="row" style="margin-top:20px;"	>
							<div class="col-lg-4">
                                <ul class="form-ui">                                
                                    <li> <a href="{{ URL::to('add_hotel') }}" class="btn btn-sm btn-primary">Add hotel</a></li>

                                </ul>
                            </div>
                        </div>
					
					<?php if($search==1) {?>
					<div class="row">
							<div class="col-md-12"><a style="float: right;padding-right: 12px;padding-top: 5px;" href="{{ URL::to('/hotel_listing') }}">Back To Hotel Listing</a></div>
					</div>
					<?php } ?>
					<div class="col-md-12">
						<div class="row">
							<div class="result_box">
								<div class="table-responsive">
							<table class="table  table-striped ">
								<tr><th>Sr. No.</th><th>Hotel Name</th><th>Email</th><th>Action</th></tr>
								 <?php 
								 if($count>0)
								 {
								 $x=1; 
								 ?>
								 @foreach($hotels as $hotel)
								<tr><td><?=$x?></td><td>{{$hotel->hotel_name}} </td><td>{{$hotel->contact_email_id}}</td>
									<td><div class="viewicons"><!-- <a href=""><img src="{{ asset('frontend/img/view.png') }}"></a> -->
									<a href="{{ URL::to('/edit_hotel/'.$hotel->id) }}"><img src="{{ asset('frontend/img/edit_img.png') }}"></a>
									
									<form class="deleted" action="{{ URL::to('/hotel_room_delete/'.$hotel->id) }}" method="POST">
							         {{ csrf_field() }}
							         <input name="_method" type="hidden" value="DELETE">
							         <button class="buttonlink" type="submit">Delete</button>
							   		 </form>
									| 
									<a class="linkCss" href="{{ URL::to('/add_hotel_amenties/'.$hotel->id) }}">Hotel Amenties</a> | 
									<a class="linkCss" href="{{ URL::to('/hotel_landmark/'.$hotel->id) }}">Hotel Landmark</a> | 
									<a class="linkCss" href="{{ URL::to('/hotel_cancellation_policies/'.$hotel->id) }}">Cancellation Policies</a> | 
									<a class="linkCss" href="{{ URL::to('/hotel_terms_conditions/'.$hotel->id) }}">Terms Condition</a>
									</div></td>
								</tr>
								 <?php 
								 $x++;
								  ?>
								 @endforeach
								<?php } else {?> 
								<tr><td colspan="4">No Record Found</th></tr>
								<?php } ?>
							</table>
							</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>              
		</div>          
	</div>
	<script>
      $(".deleted").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>
	@endsection