<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\ZoneMaster;
class Roomamentie extends Model
{
    protected $fillable = ['id','room_amenity_name','description' ,'created_by','created_on','modified_by','modified_on','deleted_by','deleted_on','is_active'];
	protected $primaryKey = 'id';
	public $timestamps = false;
	   
}
