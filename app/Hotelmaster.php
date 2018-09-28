<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiHotelmaster extends Model
{
    protected $fillable = ['id','latitude','longitude' ,'hotel_name','CreatedBy','CreatedOn','ModifiedBy','ModifiedOn','DeletedBy','DeletedOn','IsActive'];
	protected $primaryKey = 'id';
	protected $table = 'pi_hotel_masters';
	public $timestamps = false;
	   
}
