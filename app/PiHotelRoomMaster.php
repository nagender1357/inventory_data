<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\ZoneMaster;
class PiHotelRoomMaster extends Model
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
     
       public static function getRoomCatName(){  
        $hotelNames = DB::table('pi_room_category_masters')->select('id', 'category_name')->where('is_active',"1")->get();
        if($hotelNames){
            return $hotelNames;
	}
        else
        {
            return '';
        }
     }
     
      public static function getHotelNameList($data){  
        $hotelNames = DB::table('pi_hotel_masters')->select('hotel_name')->where('id',$data)->where('is_active',"1")->get();
        if($hotelNames){
            return $hotelNames;
	}
        else
        {
            return '';
        }
     } 
    public static function getHotelRoomNameList($data){  
        $hotelRoomNames = DB::table('pi_hotel_room_masters')->select('room_name')->where('id',$data)->where('is_active',"1")->get();
        if($hotelRoomNames){
            return $hotelRoomNames;
	}
        else
        {
            return '';
        }
     }  
}
