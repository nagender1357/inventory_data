@extends('layouts.appInnerLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="content">               
            <div class="formui">
                	@if(Session::has('flash_message'))
                    <div class="alert alert-success">
                  <!--   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> -->
                        {{ Session::get('flash_message') }}
                    </div>
                      @endif    
                <h2>Hotel Room Listing</h2>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <form method="POST" action="{{ route('hotel_room_search') }}" >
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="col-lg-4">
                                <ul class="form-ui">                                
                                    <li><label>Hotel  Name </label><span>
                                            <select name="fk_hotel_id" id="fk_hotel_id" class="form-control">
                                                <option value="">Hotel Select </option>
                                                @foreach(\App\PiHotelRoomMaster::getHotelName() as $key => $hotelName)
                                                <option value="{{ $hotelName->id}}">{{ $hotelName->hotel_name}}</option>
                                                @endforeach
                                            </select>  

                                        </span></li>

                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="form-ui">                                
                                    <li><label>Hotel Room Name </label><span><input type="text" name="hotel_room_name" class="form-control"></span></li>

                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="form-ui">                                
                                    <li><label>&nbsp;</label><button class="btn btn-sm btn-primary">Search</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-primary"><a href="{{ URL::to('/hotel_room_listing/') }}" class=" btn-primary">Reset</a></button></li>
                                    
                                </ul>
                            </div>

                        </div> </form>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="result_box">
                                <div class="table-responsive">
                                    <table class="table  table-striped ">
                                        <tr><th>Sr. No.</th><th>Hotel Type</th><th>Hotel Name</th><th>Hotel Room Name</th><th>Discription</th><th>Action</th></tr>
                                        <?php $x = 1 ?>
                                      
                                        @foreach($hotels as $hotel)
                                        <tr><td><?= $x ?></td><td>{{$hotel->room_type}} </td>
                                            <td> 
                                                <?php
                                                $hotelName = \App\PiHotelRoomMaster::getHotelNameList($hotel->fk_hotel_id);
                                                echo $hotelName[0]->hotel_name;
                                                ?>
                                            </td>
                                            <td>{{$hotel->room_name}}</td><td>{{$hotel->description}} </td>
                                            <td><div class="viewicons"><a href=""><img src="{{ asset('frontend/img/view.png') }}"></a>
                                                    <a href="{{ URL::to('/edit_hotel_room/'.$hotel->id) }}"><img src="{{ asset('frontend/img/edit_img.png') }}"></a>
                                                    <a href="{{ URL::to('/hotel_room_delete/'.$hotel->id) }}" onclick="return confirm('Are you sure you want to delete hotel room?');"><img src="{{ asset('frontend/img/delete_icon.jpg') }}"></a>
                                                   | <a href="{{ URL::to('/add_hotel_room_amenties/'.$hotel->id) }}">Hotel Room Amenties</a>                                       |  <a href="{{ URL::to('/add_hotel_room_rate/'.$hotel->fk_hotel_id.'/'.$hotel->id) }}">Upload Room Rate</a>                        
                                                </div></td> 
                                        </tr>
                                        <?php $x++; ?>
                                        @endforeach
                                        
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
@endsection