<option value="">--Select City--</option>
@foreach($city as $i => $cities)    
                                 
        <option <?php if($city_id==$cities->city_id) {echo "selected";}?>  value="{{$cities->city_id}}">{{$cities->city_name}}</option> 
                                                   
@endforeach