<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Http\Requests\ConfigRequest;

class ConfigController extends Controller
{
    /**
     * 抽奖配置页面
     * @return $this
     */
    public function show()
    {
        $config = Config::first();

        return view('config')->with('config', $config);
    }

    /**
     * 保存抽奖配置
     * @param ConfigRequest $request 抽奖配置表单验证
     * @param Config $config 抽奖配置模型
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(ConfigRequest $request, Config $config)
    {
        $config->fill($request->all());
        $config->start = strtotime($request->start_date);
        $config->end = strtotime($request->end_date);

        if ($config->save()) {
            return $this->redirectResponse('config', '操作成功', 'success');
        } else {
            return back()->withInput();
        }
    }

    /**
     * 更新抽奖配置
     * @param ConfigRequest $request 抽奖配置表单验证
     * @param Config $config 抽奖配置模型
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ConfigRequest $request, Config $config)
    {
        $config->update($request->all());
        return $this->redirectResponse('config', '操作成功', 'success');
    }
}
