<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';
	
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['member_id','address_id', 'qty', 'price', 'currency_code', 'status', 'delivery_fees'];
	
	
	public function member(){
		return $this->belongsTo('App\User', 'member_id');
	}
	
	public function address(){
		return $this->belongsTo('App\address', 'address_id');
	}
	
	public function orderlines(){
		return $this->hasMany('App\orderline', 'order_id');
	}
	
}
