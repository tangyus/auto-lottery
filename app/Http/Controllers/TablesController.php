<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequest;
use App\Models\Table;

class TablesController extends Controller
{
    /**
     * 数据表列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tables = Table::all();

        return view('table.index', compact('tables'));
    }

    /**
     * 新增数据表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('table.create');
    }

    /**
     * 添加保存数据表
     * @param TableRequest $request
     * @param Table $table
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TableRequest $request, Table $table)
    {
        $table->fill($request->all());
        if ($table->save()) {
            return $this->redirectResponse(route('tables/index'), '添加数据表成功', 'success');
        }
        return back()->withInput();
    }

    /**
     * 编辑数据表
     * @param Table $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Table $table)
    {
        return view('table.edit', compact('table'));
    }

    /**
     * 修改保存数据表
     * @param TableRequest $request
     * @param Table $table
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TableRequest $request, Table $table)
    {
        $table->fill($request->all());

        $table->save();
        return $this->redirectResponse(route('tables.index'), '修改数据表成功', 'success');
    }

    /**
     * 删除数据表
     * @param Table $table
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Table $table)
    {
        if ($table->can_del == 1) {
            return $this->redirectResponse(route('tables.index'), '该数据表为默认表，不允许删除', 'message');
        }
        $table->delete();
        return $this->redirectResponse(route('tables.index'), '删除数据表成功', 'success');
    }
}
