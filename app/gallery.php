<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    public $table = "galleries";
    public $fillable = ['imageUrl'];
}
