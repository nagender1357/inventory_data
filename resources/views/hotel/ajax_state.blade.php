<option value="">--Select State--</option>
@foreach($states as $i => $state)    
                                 
        <option <?php if($state_id==$state->state_id) {echo "selected";}?> value="{{$state->state_id}}">{{$state->state_name}}</option> 
                                                   
@endforeach