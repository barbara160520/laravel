<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

	public static $availableFields = [
		'id', 'firstName', 'lastName', 'email', 'phone', 'created_at','order'
	];
    protected $fillable = [
		'firstName',
        'lastName',
        'email',
        'phone',
        'order'
	];

}
