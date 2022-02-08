<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\User\EditRequest;
//use Illuminate\Support\Facades\Log;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('account.index');
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
        dd($request,$user);
        $updated = $user->fill($request->validate())->save();

        if($updated) {
            return redirect()->route('account')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }
}
