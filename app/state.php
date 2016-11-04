<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';
	
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
    protected $fillable = ['name', 'country_id'];
	
	
	public function country(){
		return $this->belongsTo('App\country', 'country_id');
	}
	
	public function cities(){
		return $this->hasMany('App\city', 'state_id');
	}
}
