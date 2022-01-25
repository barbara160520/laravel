<?php

namespace App\Http\Controllers;

use App\Models\{Category,News};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
	{

        $model = new Category();
		$data = $model->getCategories();

		return view('category.index',[
            'category' => $data
        ]);

	}

    public function show(int $id)
	{
		if($id > 15) {
			abort(404);
		}
        $model = new Category();
		$data = $model->getCategoriesById($id);

        $new = new News();
		$news = $new->getNewsByCategory($id);

        $category = $model->getOneCategory($id);

        $count = $model->getCount($id);

		return view('category.show', [
			'categoryItem' => $data,
            'news' => $news,
            'count' => $count,
            'id' => $id,
            'category' => $category
		]);
	}
}
