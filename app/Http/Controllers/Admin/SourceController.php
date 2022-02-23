<?php

namespace App\Http\Controllers\Admin;

use App\Models\Source;
use App\Services\ResourceService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Source\CreateRequest;
use Illuminate\Support\Facades\Log;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Source::all()->isEmpty()){
            app(ResourceService::class)->getData();
        }

		$data = Source::query()->select(
            Source::$availableFields
        )->paginate(15);
        $message = "";

        return view('admin.source.index',[
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
        return view('admin.source.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $created = Source::create($request->validate());

		if($created) {
			return redirect()->route('admin.source.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        /*return view('admin.source.edit',[
            'data' => $source
        ]);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  source $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        /*$updated = $source->fill($request->only([
            'title','url'
            ]))
        ->save();

        if($updated) {
            return redirect()->route('admin.source.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();*/
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Source $source)
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        try{
            $source->delete();
            return response()->json('ok');
        }catch(\Exception $e){
            Log::error("Ошибка удаления");
        }

    }
}
