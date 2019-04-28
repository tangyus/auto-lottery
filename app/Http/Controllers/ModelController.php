<?php

namespace App\Http\Controllers;

use App\Models\Model;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('model')->get();

        return view('model.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('model.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            DB::table('model')->insert([
                'name'      => $input['name'],
                'table'     => $input['table'],
                'operates'  => implode('-', $input['operate']),
                'created'   => Carbon::now()
            ]);

            return $this->redirectResponse(route('model.index', $request->route('name')), '操作成功', 'success');
        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model  $modelGenerate
     * @return \Illuminate\Http\Response
     */
    public function show(ModelGenerate $modelGenerate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model  $modelGenerate
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelGenerate $modelGenerate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model  $modelGenerate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelGenerate $modelGenerate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model  $modelGenerate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelGenerate $modelGenerate)
    {
        //
    }
}
