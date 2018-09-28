<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiHotelLandmark extends Model
{
    protected $fillable = ['id','fk_hotel_master_id','landmard_name' ,'discription','cancellation_policy3','distance_km','CreatedBy','CreatedOn','ModifiedBy','ModifiedOn','DeletedBy','DeletedOn','IsActive'];
	protected $primaryKey = 'id';
	protected $table = 'pi_hotel_landmarks';
	public $timestamps = false;
	   
}
