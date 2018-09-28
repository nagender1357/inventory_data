<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiHotelCancellationPolicie extends Model
{
    protected $fillable = ['id','fk_hotel_master_id','cancellation_policy1' ,'cancellation_policy2','cancellation_policy3','CreatedBy','CreatedOn','ModifiedBy','ModifiedOn','DeletedBy','DeletedOn','IsActive'];
	protected $primaryKey = 'id';
	protected $table = 'pi_hotel_cancellation_policies';
	public $timestamps = false;
	   
}
