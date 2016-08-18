<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class third_color extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_color';
	
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
    protected $fillable = ['pid', 'sid', 'product_id', 'color_id'];
	
	
	public function third(){
		return $this->belongsTo('App\third', 'product_id');
	}
	
	public function color(){
		return $this->belongsTo('App\colors', 'color_id');
	}
	
}
