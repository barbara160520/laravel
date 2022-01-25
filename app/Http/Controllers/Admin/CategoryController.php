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
        $model = new Category();
		$data = $model->getCategories();
        $message = "";

        return view('admin.category.index',[
            'data' => $data,
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
        $message='';
        return view('admin.category.create',['message' => $message]);
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

        $model = new Category();
		$data = $model->getAction('insert',$request->all('title','description'));

        return view('admin.category.create',['message' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = "";
        $model = new Category();
		$data = $model->getCategoriesById($id);
        return view('admin.category.edit',[
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = new Category();
        dd($request->all('id','title','description'),$id);
		$data = $model->getAction('update',$request->all('id','title','description'));

        $response = [
            'message' => $data
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
        //return view('admin.category.index',['message' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Category();
		$data = $model->getAction('delete',$id);

        if ($data == 'success'){
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
