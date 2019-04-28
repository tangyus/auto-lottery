<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Http\Requests\FieldRequest;
use App\Models\Field;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class FieldsController extends Controller
{
    public function index($tableName)
    {
        $title = $this->checkTitle($tableName);
        $fields = Field::where('table_name', $tableName)->get();

        return view('fields.index', compact('fields', 'title'));
    }

    public function create($tableName)
    {
        $title = $this->checkTitle($tableName);

        return view('fields.create', compact('title'));
    }

    public function store(FieldRequest $request, $tableName, Field $field)
    {
        $field->fill($request->all());
        $field->table_name = $tableName;
        if ($field->save()) {
            return $this->redirectResponse(route('fields.index', $request->route('name')), '操作成功', 'success');
        }
        return back()->withInput();
    }

    public function edit($tableName, Field $field)
    {
        $title = $this->checkTitle($tableName);

        return view('fields.edit', compact('field', 'title'));
    }

    public function update(FieldRequest $request, $tableName, Field $field)
    {
        $field->fill($request->all());
        $field->save();

        return redirect()->back()->with('success', '操作成功');
    }

    public function destroy($tableName, Field $field)
    {
        if ($field->can_del == 1) {
            return redirect()->back()->with('message', '该条记录无法删除');
        }

        $field->delete();
        return redirect()->back()->with('success', '操作成功');
    }

    /**
     * 检测路由对应的表名是否存在
     * @param $tableName 路由对应的表名
     * @return string
     */
    private function checkTitle($tableName) {
        $allTable = Table::all();
        foreach ($allTable as $table) {
            if ($tableName == $table->name) {
                return $table->alias;
            }
        }
        return '表名不存在';
    }

    /**
     * 生成数据表及对应字段
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generate($name)
    {
        $fields = Field::where('table_name', $name)->get();
        $config = Config::first();
        $table = Table::where('name', $name)->first();
        if (!$config) {
            return redirect()->back()->with('message', '项目未配置，请先设置 config');
        }
        if (!$table) {
            return redirect()->back()->with('message', '数据表不存在');
        }

        // 表名
        $tableName = "g_{$config->project_id}_{$name}";
        $prefix = '';
        foreach (explode('_', $name) as $value) {
            $prefix .= $value[0];
        }
        $prefix .= '_';

        $query = "DROP TABLE IF EXISTS `{$tableName}`;";
        DB::statement($query);

        $query = "CREATE TABLE `{$tableName}`(`{$prefix}id` int(11) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT, ";
        foreach ($fields as $item) {
            // 字段类型
            if (in_array($item->type, ['int', 'tinyint'])) {
                $query .= "`{$prefix}{$item->name}` {$item->type}({$item->length}) unsigned ";
            } elseif (in_array($item->type, ['float', 'decimal'])) {
                // 默认保留两位小数点
                $query .= "`{$prefix}{$item->name}` {$item->type}({$item->length}, 2) unsigned ";
            } elseif (in_array($item->type, ['char', 'varchar'])) {
                $query .= "`{$prefix}{$item->name}` {$item->type}({$item->length}) ";
            } else {
                $query .= "`{$prefix}{$item->name}` {$item->type} ";
            }

            // 默认值
            if ($item->default == null) {
                $query .= "DEFAULT NULL ";
            } elseif ($item->default == '') {
                $query .= "DEFAULT '' ";
            } else {
                $query .= "DEFAULT '{$item->default}' ";
            }

            // 备注
            if (!empty($item->comment)) {
                $query .= "COMMENT '{$item->comment}', ";
            }
        }
        // 生成索引
        foreach ($fields as $item) {
            if ($item->indexes == 'normal') {
                $query .= "KEY `{$prefix}{$item->name}` (`{$prefix}{$item->name}`), ";
            } elseif ($item->indexes == 'unique') {
                $query .= "UNIQUE KEY `{$prefix}{$item->name}` (`{$prefix}{$item->name}`), ";
            } elseif ($item->indexes == 'full_text') {
                $query .= "FULLTEXT KEY `{$prefix}{$item->name}` (`{$prefix}{$item->name}`), ";
            }
        }
        $query = substr($query, 0, -2);
        $query .= ") ENGINE={$table->engine} AUTO_INCREMENT={$table->auto_increment} DEFAULT CHARSET={$table->charset};";

        DB::statement($query);
        return redirect()->back()->with('success', '操作成功');
    }
}
