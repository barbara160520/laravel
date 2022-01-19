<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=json_decode(file_get_contents('doc/order.json'), true);
        return view('users.order.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message='';
        return view('users.order.create',['message'=>$message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //вычисления ключа
        $doc = json_decode(file_get_contents('doc/order.json'), true);
        if ($doc == null) {
            $number = 1;
        } else{
            $number = count($doc)+1;
        }

        //вырезание скобки
        $contents = file_get_contents('doc/order.json');
        rtrim($contents);
        $contents = substr($contents, 0, -2);

        file_put_contents(public_path('doc/order.json'), $contents);

        /*$request->validate([
			'firstName' => ['required', 'string', 'min:5'],
            'lastName' => ['required', 'string', 'min:4']
		]);*/

        //добавление новых данных
        $data = json_encode($request->all());

        $data = ',"'.$number.'": ' . $data . '}';

        file_put_contents(public_path('doc/order.json'), $data, FILE_APPEND | LOCK_EX);

        if (!empty(response()->json($request->all()))){
            $message = 'success';
            //echo $message;
        }

        return view('users.order.index',['message'=>$message]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
