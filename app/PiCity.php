<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiCity extends Model
{
    protected $fillable = ['city_id','city_name','state_id','country_id','status'];
	protected $primaryKey = 'city_id';
	protected $table = 'pi_cities';
	public $timestamps = false;
	   
}
