<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voice extends Model
{
    public $table = "voices";
    public $fillable = ['name', 'mediaUrl'];
}
