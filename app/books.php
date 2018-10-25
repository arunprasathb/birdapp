<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
	protected $fillable = ['bookName', 'price', 'description', 'imageUrl', 'paidPdfUrl', 'unpaidPdfUrl'];
	protected $table = 'books';

	public function species() {
		return $this->belongsToMany('species', 'birds_species');
	}
	
}
