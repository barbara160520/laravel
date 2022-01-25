<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new News();
		$news = $model->getNews();

        $message = "";
        $status = "";
        return view('admin.news.index', [
			'data' => $news,
            'message' => $message,
            'status' => $status
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
        return view('admin.news.create',['message' => $message]);
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
			'title' => ['required', 'string', 'min:5'],
            'author' => ['required', 'string', 'min:4']
		]);

        $model = new News();
		$data = $model->getAction('insert',$request
        ->all('title', 'author','slug','category_id', 'status', 'description'));

        return view('admin.news.create',['message' => $data]);
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
        $model = new News();
		$data = $model->getNewsById($id);
        return view('admin.news.edit',[
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
        $model = new News();
		$data = $model->getAction('insert',$request
        ->all('title', 'author','slug','category_id', 'status', 'description'));

        return view('admin.news.index',['message' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new News();
		$data = $model->getAction('delete',$id);

        if ($data == 'success'){
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
        die();
    }
}
