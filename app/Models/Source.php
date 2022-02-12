<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'source';

	public static $availableFields = [
		'id', 'title', 'url','description','image', 'created_at'
	];
    protected $fillable = [
		'title',
        'url',
        'description',
        'image'
	];

}
