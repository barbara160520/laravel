<?php

namespace App\Http\Controllers\Users;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Feedback::query()->select(
            Feedback::$availableFields
        )->get();

        $message = "";
        return view('users.feedback.index',[
            'data'=>$data,
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
        return view('users.feedback.create');
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
			'firstName' => ['required', 'string', 'min:5'],
            'lastName' => ['required', 'string', 'min:4'],
            'message' => ['required', 'string', 'max:1000']
		]);

        $created = Feedback::create(
			$request->only(['firstName', 'lastName','message'])
		);

		if($created) {
			return redirect()->route('users.feedback.create')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback,$id)
    {
       /* $feedback = Feedback::query()->slect(
            Feedback::$availableFields
        )->where('id','=',$id)
        ->get();

        return view('users.feedback.show',[
            'data' => $feedback
        ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback,$id)
    {
        $feedback = Feedback::where('id','=',$id)->delete();
        if ($feedback != null){
            $message = "Комментарий удален";
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
