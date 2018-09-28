@extends('layouts.appInnerLayout')
@section('content')
<div class="container">
		<div class="row">
			<div class="content">	

			  <form method="POST" action="{{ route('add_hotel_room') }}" aria-label="{{ __('Create') }}" enctype="multipart/form-data">
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
					<h2>Add Hotel Room</h2>
					<div class="clearfix"></div>
					<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="infosec">
								<ul>
                                                     <li><label>Hotel Name <sm>*</sm></label><span>
                                                    <select name="fk_hotel_id" id="fk_hotel_id" class="form-control">
                                                        <option value="">Hotel Name</option>
                                                        @foreach(\App\PiHotelRoomMaster::getHotelName() as $key => $hotelName)
                                                        <option value="{{ $hotelName->id}}">{{ $hotelName->hotel_name}}</option>
                                                        @endforeach
                                                    </select>        
                                                                        </span></li>
								<li><label>Room Type <sm>*</sm></label><span><input type="text" name="room_type" class="form-control" value="{!! old('room_type') !!}"></span></li>
								<li><label>Room Name<sm>*</sm></label><span><input type="text" name="room_name" class="form-control" value="{!! old('room_name') !!}"></span></li>
								</ul>
								
							</div>
						</div>
						
						<div class="col-md-12">
                                                    <div class="infosec">
								<ul>
                                                                    <li><label>Category <sm>*</sm></label><span>
                                                    <select name="fk_category" id="fk_category" class="form-control">
                                                        <option value="">Hotel Category</option>
                                                        @foreach(\App\PiHotelRoomMaster::getRoomCatName() as $key => $CatName)
                                                        <option value="{{ $CatName->id}}">{{ $CatName->category_name}}</option>
                                                        @endforeach
                                                    </select>  
                                                                        </span></li>   
								<li><label>Description <sm>*</sm></label><span>
                                                                   <textarea value="{!! old('description') !!}" name="description" class="form-control"></textarea>
                                                                    </span></li>	
								
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
@endsection