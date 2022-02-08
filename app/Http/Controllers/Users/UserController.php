<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\EditRequest;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::query()
        ->select(User::$availableFields)
        ->paginate(5);

        $message = "";
        return view('users.index',[
            'data' => $users,
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user)
    {
        $updated = $user->fill($request->validate())->save();

        if($updated) {
            return redirect()->route('users.user.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user)
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return response()->json('ok');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }

    }

    public function toggleAdmin(User $user,$id){
        try{
            $role = $user->where('id','=',$id)
            ->value('is_admin');
            $role = ($role == false) ? "1" : "0" ;
            if ($role == 1){
                $text = "Снять админа";
                $user->where('id','=',$id)->update(['is_admin'=> $role]);

            } else {
                $text = "Назначить админа";
                $user->where('id','=',$id)->update(['is_admin'=> $role]);
            };
            return response()->json(['success' =>'ok','text' => $text]);

        }catch(\Exception $e){
            Log::error('Ошибка смены статуса');
        }
    }
}
