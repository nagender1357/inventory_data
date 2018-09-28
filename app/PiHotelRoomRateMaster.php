<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\ZoneMaster;
class PiHotelRoomRateMaster extends Model
{
    protected $fillable = ['id','fk_hotel_master_id','fk_hotelroom_master_id' ,'rate','from_date','to_date','is_refundable','created_by','created_on','modified_by','modified_on','deleted_by','deleted_on','is_active'];
	protected $primaryKey = 'id';
	public $timestamps = false;    
}
