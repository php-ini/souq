<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    // protected $fillable = ['title', 'title_ar', '', '', '', '', '', '', '', '', '', '', ''];
	
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';
	
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
    protected $fillable = ['name', 'value'];
	
	public static function idFromSlug($slug){
		$split = explode("-" , $slug);
		$id = $split[count($split) - 1];
		return $id;
	}
}
