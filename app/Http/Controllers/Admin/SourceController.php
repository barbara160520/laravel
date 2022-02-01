<?php

namespace App\Http\Controllers\Admin;

use App\Models\Source;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOption\Some;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = Source::query()->select(
            Source::$availableFields
        )->paginate(5);
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
        //$message='';
        return view('admin.source.create');
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

        $created = Source::create(
			$request->only(['title','url'])
		);

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
        return view('admin.source.edit',[
            'data' => $source
        ]);
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
        $updated = $source->fill($request->only([
            'title','url'
            ]))
        ->save();

        if($updated) {
            return redirect()->route('admin.source.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Source $source)
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source,$id)
    {
        $source = Source::where('id','=',$id)->delete();

        if ($source != null){
            $message = "Ресурс удален";
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
