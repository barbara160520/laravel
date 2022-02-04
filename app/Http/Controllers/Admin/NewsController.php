<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$news = News::query()
			/*->whereHas('category', function ($query) {
				$query->where('id', '<', 10);
			})*/
			->with('category')
			->select(News::$availableFields)
			->paginate(5);

        $message = "";
        return view('admin.news.index', [
			'data' => $news,
            'message' => $message
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create',[
            'categories' =>$categories
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $created = News::create($request->validated());

		if($created) {
			return redirect()->route('admin.news.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit',[
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest   $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest  $request, News $news)
    {
		$updated = $news->fill($request->validated())->save();

        if($updated) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try{
            $news->delete();
            return response()->json('ok');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
        /*$news = News::where('id','=',$id)->delete();
        if ($news != null){
            $message = "Новость удалена";
            $status = "success";
        }
        else {
            $message = "Что пошло не так";
            $status = "error";
        }

        $response = [
            'message' => $message,
            'status' => $status
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();*/
    }
}
