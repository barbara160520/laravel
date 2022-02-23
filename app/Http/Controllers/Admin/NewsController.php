<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest  $request, News $news)
    {
		$validated = $request->validated();


		if($request->hasFile('image')) {
			$validated['image'] = app(UploadService::class)->start($request->file('image'));

            //dd($validated['image'],$updated);
        }
        $updated = $news->fill($validated)->save();

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

        if(substr($_SERVER['HTTP_REFERER'],-4) == "edit"){
            $validated['image'] = null;
            Storage::disk('public')->delete($news->image);
            $updated = $news->fill($validated)->save();
            return back();
        }
        else{
            try{
                $news->delete();
                return response()->json('ok');

            }catch(\Exception $e){
                Log::error("Ошибка удаления");
            }
        }
    }
}
