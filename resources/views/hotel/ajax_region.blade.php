<option value="">Select Region</option>
@foreach($regions as $i => $region)    
                                 
        <option value="{{$region->id}}">{{$region->region_name}}</option> 
                                                   
@endforeach