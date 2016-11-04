<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderline extends Model
{
    
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orderlines';
	
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
    protected $fillable = ['order_id','product_id', 'qty', 'unit_price', 'ship_fees_per_unit', 'total_price', 'color_id', 'size_id'];
	
	
	public function order(){
		return $this->belongsTo('App\order', 'order_id');
	}
	
	public function product(){
		return $this->belongsTo('App\third', 'product_id');
	}
	
	public function color(){
		return $this->belongsTo('App\colors', 'color_id');
	}
	public function size_(){
		return $this->belongsTo('App\sizes', 'size_id');
	}
}
