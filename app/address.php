<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';
	
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['member_id','city_id', 'state_id', 'country_id', 'address', 'tel', 'mobile'];
	
	
	public function state(){
		return $this->belongsTo('App\state', 'state_id');
	}
	
	public function city(){
		return $this->belongsTo('App\city', 'city_id');
	}
	
	public function country(){
		return $this->belongsTo('App\country', 'country_id');
	}
}
