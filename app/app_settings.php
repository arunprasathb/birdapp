<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class app_settings extends Model
{
    protected $fillable = ['booklist_bg_option', 'specieslist_bg_option', 'voicelist_bg_option', 'pageA_bg_option', 'pageB_bg_option', 'pageC_bg_option'];
	protected $table = 'app_settings';
}
