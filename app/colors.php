<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colors extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'colors';
	
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
    protected $fillable = ['title', 'title_ar'];
	
	
	
	public function third_color(){
		return $this->hasMany('App\third_color', 'color_id');
	}
	
}
