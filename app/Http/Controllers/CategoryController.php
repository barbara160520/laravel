<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
	{
        /*$news = $this->getNews();
		$сategory = $this->getCategory($news);*/
        $data = json_decode(file_get_contents('doc/category.json'), true);

		return view('category.index',[
            'category' => $data
        ]);

	}

    public function show(int $id)
	{
		if($id > 10) {
			abort(404);
		}
		$category = $this->getCategoryById($id);

		return view('category.show', [
			'categoryItem' => $category
		]);
	}
}
