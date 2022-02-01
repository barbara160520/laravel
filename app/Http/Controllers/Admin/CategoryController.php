<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = Category::with('news')->paginate(5);
        $message = "";

        return view('admin.category.index',[
            'categories' => $categories,
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
        //$message='';
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5']
        ]);

        $created = Category::create(
			$request->only(['title','author','description'])
		);

		if($created) {
			return redirect()->route('admin.category.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();

        /*$model = new Category();
		$data = $model->getAction('insert',$request->all('title','description'));

        return view('admin.category.create',['message' => $data]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        /*$message = "";
        $model = new Category();
		$data = $model->getCategoriesById($id);
        */

        return view('admin.category.edit',[
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $updated = $category->fill($request->only([
            'title','author','description'
            ]))
        ->save();

        if($updated) {
            return redirect()->route('admin.category.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Category $category)
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $category = Category::where('id','=',$id)->delete();

        if ($category != null){
            $message = "Категория удалена";
        }
        else {
            $message = "Что пошло не так";
        }

        $response = [
            'message' => $message
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}
