<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiRoomAmentie extends Model
{
    protected $fillable = ['room_amenity_name','description','is_active','created_by','created_on','modified_by','modified_on','deleted_by','deleted_on'];
	protected $primaryKey = 'id';
	
	public $timestamps = false;
	   
}
