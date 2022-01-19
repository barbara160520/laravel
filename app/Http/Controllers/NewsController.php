<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
	public function index()
	{
		//$news = $this->getNews();
        $data = json_decode(file_get_contents('doc/news.json'), true);
		return view('news.index', [
			'news' => $data
		]);

	}

	public function show(int $id)
	{
		if($id > 10) {
			abort(404);
		}
		$news = $this->getNewsById($id);

		return view('news.show', [
			'newsItem' => $news
		]);
	}
}
