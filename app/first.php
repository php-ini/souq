<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class first extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'firstlevel';
	
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
    protected $fillable = ['title', 'title_ar', 'description', 'description_ar', 'image', 'date'];
	
	/**
     * Get the seconds for the main category.
     */
    public function seconds()
    {
        return $this->hasMany('App\second', 'pid');
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
		$first = first::findOrFail($id);
		return self::slugify($first->title ." ". $first->id);
	}
	
}
