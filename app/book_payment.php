<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_payment extends Model
{
    protected $fillable = ['book_id', 'user_id', 'payment_status', 'amount', 'download_count'];
	protected $table = 'book_payments';
}
