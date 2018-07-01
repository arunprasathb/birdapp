<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class species extends Model
{
   	protected $table = 'species';
   	protected $fillable = ['speciesName', 'short_description', 'description', 'image_url', 'book_id'];

  	public function books() {
    	return $this->belongsToMany('books', 'birds_species');
  	}
}
