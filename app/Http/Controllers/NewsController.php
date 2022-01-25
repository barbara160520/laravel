<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
	public function index()
	{
		$model = new News();
		$news = $model->getNews();

		return view('news.index', [
			'news' => $news
		]);

	}

	public function show(int $id)
	{
		if($id > 10) {
			abort(404);
		}
		$model = new News();
		$news = $model->getNewsById($id);
        $category = $model->getIdCategory($id);

		return view('news.show', [
			'newsItem' => $news,
            'category_id' => $category
		]);
	}

}
