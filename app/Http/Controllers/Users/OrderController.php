<?php

namespace App\Http\Controllers\Users;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Order\CreateRequest;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::query()->select(
            Order::$availableFields
        )->get();

        $message="";
        return view('users.order.index',[
            'data'=>$data,
            'message'=>$message
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $created = Order::create($request->validated());

		if($created) {
			return redirect()->route('users.order.create')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,$id)
    {
        /*$order = Order::query()->select(
            Order::$availableFields
        )->where('id','=',$id)
        ->get();

        return view('users.order.show',[
            'data' => $order
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
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try{
            $order->delete();
            return response()->json('ok');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }
        /*
        $order = Order::where('id','=',$id)->delete();
        if ($order != null){
            $message = "Заказ №{$id} удален";
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
