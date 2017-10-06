<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

	protected $table = 'requests';

    protected $fillable = [
    	'names', 
    	'email', 
    	'passport_no',
    	'request_type',
    	'amount',
    	'travel_date',
    	'ticket_upload',
    	'passport_upload',
];
