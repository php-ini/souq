<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statuses extends Model
{
    // protected $fillable = ['title', 'title_ar', '', '', '', '', '', '', '', '', '', '', ''];
	
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statuses';
	
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
    protected $fillable = ['status', 'status_ar'];
	
}
