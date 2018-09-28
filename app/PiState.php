<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PiState extends Model
{
    protected $fillable = ['state_id','state_name','country_id','status'];
	protected $primaryKey = 'state_id';
	protected $table = 'pi_states';
	public $timestamps = false;
	   
}
