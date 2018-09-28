<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiHotelAmentie extends Model
{
    protected $fillable = ['amenity_name','description','is_active'];
	protected $primaryKey = 'id';
	protected $table = 'pi_hotel_amenties';
	public $timestamps = false;
	   
}
