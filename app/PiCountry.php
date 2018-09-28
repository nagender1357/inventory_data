<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiCountry extends Model
{
    protected $fillable = ['country_id','country_name','status'];
	protected $primaryKey = 'id';
	protected $table = 'pi_countries';
	public $timestamps = false;
	   
}
