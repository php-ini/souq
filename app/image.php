<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';
	
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
    protected $fillable = ['pid', 'type', 'image', 'thumb', 'status', 'date'];
	
	
	public function third(){
		return $this->belongsTo('App\third', 'pid');
	}
	
}
