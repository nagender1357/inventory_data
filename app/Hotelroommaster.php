<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\ZoneMaster;
class Hotelroommaster extends Model
{
    protected $fillable = ['id','fk_hotel_id','room_type' ,'room_name','description','hotel_room_images','fk_category','created_by','created_on','modified_by','modified_on','deleted_by','deleted_on','is_active'];
	protected $primaryKey = 'id';
	public $timestamps = false;
        
     public static function getHotelName(){  
        $hotelNames = DB::table('pi_hotel_masters')->select('id', 'hotel_name')->where('is_active',"1")->get();
        if($hotelNames){
            return $hotelNames;
	}
        else
        {
            return '';
        }
     }   
}
