<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiHotelTermsCondition extends Model
{
    protected $fillable = ['id','fk_hotel_master_id','terms_conditions1' ,'terms_conditions2','terms_conditions3','CreatedBy','CreatedOn','ModifiedBy','ModifiedOn','DeletedBy','DeletedOn','IsActive'];
	protected $primaryKey = 'id';
	protected $table = 'pi_hotel_terms_conditions';
	public $timestamps = false;
	   
}
