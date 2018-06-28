<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
	protected $fillable = ['bookname', 'price', 'short_description', 'description', 'image_url', 'paid_pdf_url', 'unpaid_pdf_url'];
	protected $table = 'books';

	public function species() {
		return $this->belongsToMany('Species', 'birds_species');
	}
	
}
