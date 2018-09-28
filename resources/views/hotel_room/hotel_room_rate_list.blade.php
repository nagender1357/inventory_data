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
                <h2>Hotel Room Rate Listing</h2>
                <div class="row">
							<div class="col-md-12"><a style="float: right;padding-right: 12px;padding-top: 5px;" href="{{ URL::to('/hotel_room_listing') }}">Back</a></div>
					</div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="result_box">
                                <div class="table-responsive">
                                    <table class="table  table-striped ">
                                        <tr><th>Sr. No.</th><th>Hotel Name</th><th>Hotel Room Name</th><th>Rate</th><th>From Date</th><th>To Date</th><th>Action</th></tr>
                                        <?php $x = 1 ?>
                                      
                                        @foreach($hotel_room_rate as $room_rate)
                                        <tr><td><?= $x ?></td>
                                            <td> 
                                                <?php
                                                $room_rateName = \App\PiHotelRoomMaster::getHotelNameList($room_rate->fk_hotel_master_id);
                                                echo $room_rateName[0]->hotel_name;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $room_rateName = \App\PiHotelRoomMaster::getHotelRoomNameList($room_rate->fk_hotelroom_master_id);
                                                echo $room_rateName[0]->room_name;
                                                ?>
                                            </td>
                                             <td><?php 
                                                       if(empty($room_rate->rate)){ ?>
                                                           <span id="errmsg">default
                                                           <?php echo $hotel_room_rate_default[0]->rate; ?>
                                                           </span>
                                                     <?php  } else {
                                                         echo $room_rate->rate;
                                                       }
                                                     ?></td>
                                             <td>{{$room_rate->from_date}}</td>
                                             <td>{{$room_rate->to_date}}</td>
                                            <td><div class="viewicons"><a href=""><img src="{{ asset('frontend/img/view.png') }}"></a>
                                                    <a href="{{ URL::to('/edit_hotel_room/'.$room_rate->id) }}"><img src="{{ asset('frontend/img/edit_img.png') }}"></a>
                                                    <a href="{{ URL::to('/hotel_room_delete/'.$room_rate->id) }}" onclick="return confirm('Are you sure you want to delete hotel room?');"><img src="{{ asset('frontend/img/delete_icon.jpg') }}"></a>
                                                              
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
<style>
      #errmsg
        {
        color: red;
        }
  </style>
@endsection