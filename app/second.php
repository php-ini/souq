<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class second extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'secondlevel';
	
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
    protected $fillable = ['pid', 'group_id', 'clothes', 'title', 'title_ar', 'description', 'description_ar', 'description_ar', 'image', 'flag', 'date', 'meta_title', 'meta_description', 'meta_keyword'];
	
	public function first(){
	    return $this->belongsTo('App\first', 'pid');
	}
	
	/**
     * Get the thirds for the second category.
     */
    public function thirds()
    {
        return $this->hasMany('App\third', 'sid');
    }
	
	
	/**
     * Get the group for the second category.
     */
    public function group()
    {
        return $this->belongsTo('App\groups', 'group_id');
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
		$second = second::findOrFail($id);
		return self::slugify($second->title ." ". $second->id);
	}
}
