<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class third extends Model
{
    // protected $fillable = ['title', 'title_ar', '', '', '', '', '', '', '', '', '', '', ''];
	
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'thirdlevel';
	
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
    protected $fillable = ['pid', 'sid', 'title', 'title_ar', 'indx', 'description', 'description_ar',
     'description_ar', 'price', 'price_before', 'sale', 'stars', 'brand', 'brand_ar', 'color', 'size',
      'flag', 'available', 'code', 'video', 'date', 'parent_id', 'uid', 'status_id', 'qty', 'ship_fees', 'site_commission', 'extra_fees',
      'meta_title', 'meta_description', 'meta_keyword'];
	
	
	public function parent_product(){
	    return $this->belongsTo('App\third', 'parent_id');
	}
	
	public function member(){
	    return $this->belongsTo('App\User', 'uid');
	}
	
	public function status(){
	    return $this->belongsTo('App\statuses', 'status_id');
	}
	
	public function second(){
	    return $this->belongsTo('App\second', 'sid');
	}
	
	public function first(){
	    return $this->belongsTo('App\first', 'pid', 'id');
	}
	
	public function images()
    {
        return $this->hasMany('App\image', 'pid');
    }
	
	/**
     * Get the colors from the product_color table.
     */
    public function colors()
    {
        return $this->hasMany('App\third_color', 'product_id');
    }
	
	
	/**
     * Get the sizes from the product_size table.
     */
    public function sizes()
    {
        return $this->hasMany('App\third_size', 'product_id', 'id');
    }
	
	/**
     * Get the brand from the brand table.
     */
    public function brandz()
    {
        return $this->belongsTo('App\brands', 'brand');
    }
	
	public static function slugify($text = ""){ 
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	
	  // trim
	  $text = trim($text, '-');
	
	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	
	  // lowercase
	  $text = strtolower($text);
	
	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);
	
	  if (empty($text))
	  {
	    return 'n-a';
	  }
	
	  return $text;
	}


	public static function slug($id){
		$third = third::findOrFail($id);
		return self::slugify($third->title ." ". $third->id);
	}
	
}
