@extends('layouts.appInnerLayout')
@section('content')
<?php

//print_r($TermsCondition_get);die();
?>
<div class="container">
		<div class="row">
			<div class="content">	

			  <form method="POST" action="{{ route('update_hotel_terms_conditions', ['id' => $id]) }}"  aria-label="{{ __('Update Terms Conditions') }}" >
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
							<div class="col-md-12"><h2>Update Hotel Terms and Conditions</h2></div>
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
						
						<div class="col-md-12">
						<div class="info_text_editor">
							<ul >
									<li><label>Short Description Terms & Conditions  <sm>*</sm></label><span><textarea  name="terms_conditions1" class="form-control" id="terms_conditions1" ><?php if(old('terms_conditions1')!='') { echo old('terms_conditions1');} else { if($count>0) { echo $TermsCondition_get->terms_conditions1; } 
										} ?></textarea></span></li>
									<li><label>Full Description Terms & Conditions <sm>*</sm></label><span><textarea  name="terms_conditions2" class="form-control" id="terms_conditions2"><?php if(old('terms_conditions2')!='') { echo old('terms_conditions2');  } else { if($count>0) {  echo $TermsCondition_get->terms_conditions2;
										} } ?></textarea></span></li>
									
								
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
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'terms_conditions1' );
</script>
<script>
    CKEDITOR.replace( 'terms_conditions2' );
</script>
<!-- <script>
    CKEDITOR.replace( 'cancellation3' );
</script> -->
@endsection