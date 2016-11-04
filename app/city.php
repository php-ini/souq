<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';
	
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
    protected $fillable = ['name', 'state_id'];
	
	
	public function state(){
		return $this->belongsTo('App\state', 'state_id');
	}
	
}
