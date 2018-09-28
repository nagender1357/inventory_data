<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiHotelAmenityMapping extends Model
{
    protected $fillable = ['fk_hotel_master_id','fk_hotel_amenties_master_id','is_active'];
	protected $primaryKey = 'id';
	protected $table = 'pi_hotel_amenity_mappings';
	public $timestamps = false;
	   
}
