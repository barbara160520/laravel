<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $table = 'categories';

    public function news(): HasMany
	{
		return $this->hasMany(News::class, 'category_id', 'id');
	}

    public static $availableFields = [
		'id', 'title', 'description', 'created_at'
	];

	protected $fillable = [
		'title',
		'description'
	];
}
