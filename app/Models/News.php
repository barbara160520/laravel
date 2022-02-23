<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;

class News extends Model
{
    use HasFactory;
    //use Sluggable;

    protected $table = 'news';

	public static $availableFields = [
		'id',
        'title',
        'author',
        'status',
        'description',
        'created_at',
        'image',
        'category_id'
	];

	protected $fillable = [
		'category_id',
		'title',
		'slug',
		'author',
		'status',
		'description',
        'image'
	];

    protected $casts = [
		'display' => 'boolean'
	];

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

    public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

}
