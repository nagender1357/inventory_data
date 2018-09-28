<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\ZoneMaster;
class PiHotelroomAmenityMapping extends Model
{
    protected $fillable = ['id','fk_hotelroom_master_id','fk_hotelroom_amenties_master_id' ,'created_by','created_on','modified_by','modified_on','deleted_by','deleted_on','is_active'];
	protected $primaryKey = 'id';
	public $timestamps = false;
	   
}
