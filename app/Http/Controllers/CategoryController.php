<?php

namespace App\Http\Controllers;

use App\Models\{Category,News};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
	{

		$category = Category::query()->select(
            Category::$availableFields
        )->get();

		return view('category.index',[
            'category' => $category
        ]);

	}

    public function show(Category $category)
	{

        $news = News::query()->select(
            News::$availableFields
        )->where('category_id','=',$category->id)
        ->get();

		return view('category.show', [
			'category' => $category,
            'news' => $news
		]);
	}
}
