<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Http\Requests\AwardRequest;
use App\Http\Requests\RedPacketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AwardController extends Controller
{
    public function index()
    {
        return view('award.index');
    }

    /**
     * 生成奖池
     * @param AwardRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generate(AwardRequest $request)
    {
        $awards = explode('-', $request->awards);
        $num = explode('-', $request->num);
        if (count($awards) != count($num)) {
            return back()->withInput()->with('message', '请输入数量一致的奖品名称和数量，奖品与奖品之间以-分隔');
        }

        // 判断表奖池表是否存在，不存在则跳转
        $check = $this->checkConfigTable('award');
        if ($check['message']) {
            return redirect()->back()->with('message', $check['message']);
        }
        $tableName = $check['table_name'];

        DB::table($tableName)->delete();
        $attr = [];
        foreach ($awards as $key => $award) {
            $awardId = $key + 1;
            for ($i = 0; $i < $num[$key]; $i++) {
                $attr[] = [
                    'a_award_id' => $awardId,
                    'a_award_name' => $award,
                    'a_got' => 0,
                    'a_num' => 1,
                    'a_only_key' => md5(random_int(1000, 9999) . $i . random_int(1, 100)),
                ];
            }
        }
        shuffle($attr);

        $this->shuffleAward($request, $attr, $tableName);

        return redirect()->route('award.list')->with('success', '生成奖池成功');
    }

    /**
     * 红包奖池生成页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function redPacket()
    {
        return view('award.red_packet');
    }

    /**
     * 生成红包奖池
     * @param RedPacketRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generateRedPacket(RedPacketRequest $request)
    {
        // 判断表奖池表是否存在，不存在则跳转
        $check = $this->checkConfigTable('award');
        if ($check['message']) {
            return redirect()->back()->with('message', $check['message']);
        }
        $tableName = $check['table_name'];

        DB::table($tableName)->delete();
        $amount = $request->amount;
        $total = 0;

        $i = 0;
        $attr = [];
        do {
            if ($request->money_rule == 1) {
                // 固定金额
                $money = request('fixed_money', 1);
            } else {
                // 随机金额
                $min = request('min_money', 1);
                $max = request('max_money', 3);
                $rand = rand($min, $max - 1);
                $money = $rand + round(rand(1, $max - 1) / $max, 2);
            }
            $total += $money;

            if ($total <= $amount) {
                $attr[] = [
                    'a_award_id' => 1,
                    'a_award_name' => $money,
                    'a_got' => 0,
                    'a_num' => 1,
                    'a_only_key' => md5(random_int(1000, 9999) . $i . random_int(1, 100)),
                ];
                $i++;
            }
            usleep(10);
        } while ($total < $amount);

        // 打乱顺序
        shuffle($attr);

        $this->shuffleAward($request, $attr, $tableName);

        return redirect()->route('award.list')->with('success', '生成红包奖池成功');
    }

    /**
     * 奖池列表
     * @param Request $request
     * @return $this
     */
    public function awardList(Request $request)
    {
        // 判断表奖池表是否存在，不存在则跳转
        $check = $this->checkConfigTable('award');

        $awards = [];
        $awardIds = [];
        if (!$check['message']) {
            $tableName = $check['table_name'];
            $awardIds = DB::table($tableName)->groupBy('a_award_id')->get();
            $awards = DB::table($tableName)->where(function ($query) use ($request) {
                foreach ($request->all() as $key => $item) {
                    if ($key == 'got' && $item != -1) {
                        $query->where('a_got', $item);
                    }
                    if ($key == 'award_id' && $item != -1) {
                        $query->where('a_award_id', $item);
                    }
                }
            })->paginate();
        }

        return view('award.list', compact('awards', 'awardIds'))->with('message', $check['message']);
    }

    /**
     * 分时间区段查询奖池发放情况
     * @param Request $request
     * @return $this
     */
    public function awardListGroupByTime(Request $request)
    {
        // 判断表奖池表是否存在，不存在则跳转
        $check = $this->checkConfigTable('award');

        $awards = [];
        $awardIds = [];
        if (!$check['message']) {
            $tableName = $check['table_name'];
            $awardIds = DB::table($tableName)->groupBy('a_award_id')->get();
            $awards = DB::table($tableName)->select(DB::raw('*, count(a_id) as total'))->where(function ($query) use ($request) {
                foreach ($request->all() as $key => $item) {
                    if ($key == 'got' && $item != -1) {
                        $query->where('a_got', $item);
                    }
                    if ($key == 'award_id' && $item != -1) {
                        $query->where('a_award_id', $item);
                    }
                }
            })->groupBy('a_send_time')->paginate();
        }

        return view('award.list_group', compact('awards', 'awardIds'))->with('message', $check['message']);
    }

    /**
     * 检查项目配置项，及奖池表是否已生成
     * @return array 返回数组中以 message 是否为 null 判断配置和奖池是否生成的结果，message 为返回页面提示信息
     */
    public function checkConfigTable()
    {
        $config = Config::first();
        if (!$config) {
            return ['table_name' => null, 'message' => '项目未配置，请先配置 config'];
        }

        $tableName = 'g_' . $config->project_id . '_award';
        // 判断奖池表是否存在
        $exists = DB::select('SELECT DISTINCT t.table_name, n.SCHEMA_NAME FROM information_schema.TABLES t, information_schema.SCHEMATA n WHERE t.table_name = :name AND n.SCHEMA_NAME = :database', ['name' => $tableName, 'database' => 'lottery_test']);
        if (!$exists) {
            return ['table_name' => $tableName, 'message' => '奖池表不存在，请先生成奖池表'];
        }

        return ['table_name' => $tableName, 'message' => null];
    }

    /**
     * 打乱均分奖池，默认均分到活动时间每天，如果需要均分到每一天的某时间段，则继续进行细分
     * @param $request 生成奖池或红包的 request 对象
     * @param $attr 需要插入的将吹数组
     * @param $tableName 奖池表名
     */
    private function shuffleAward($request, $attr, $tableName)
    {
        // 先把奖池均分到每一天如 5000个 均分到 7-20 7-21 7-22 三天
        $dayCount = (strtotime($request->end) - strtotime($request->start)) / (24 * 3600);
        $singleDayCount = intval(count($attr) / $dayCount) + 1;
        $total = 0; // 已经分配的数量
        for ($i = 0; $i < $dayCount; $i++) {
            for ($j = $singleDayCount * $i; $j < $singleDayCount * ($i + 1); $j++) {
                $attr[$j]['a_send_time'] = strtotime($request->start) + 24 * $i * 3600 + 25200;
                $total++;
                if ($total >= count($attr)) {
                    break;
                }
            }
        }

        // 预先插入奖池
        DB::table($tableName)->insert($attr);

        // 如果需要随机打乱顺序
        if ($request->rule == 2) {
            for ($i = 0; $i < $dayCount; $i++) {
                // 先取出每一天的奖池，默认插入时为当天7点时间戳
                $time = strtotime($request->start) + 24 * $i * 3600 + 25200;
                $awards = DB::table($tableName)->where('a_send_time', $time)->get();

                // 按时间段区分，默认10个区间
                $count = request('count', 10);
                $average = ((count($awards) % ($count + 1)) == 0) ?
                    count($awards) / ($count + 1) :
                    intval(count($awards) / ($count + 1)) + 1;
                for ($j = 1; $j <= $count; $j++) {
                    $rand = $j * 3600;
                    if ($j == $count) {
                        // 最后一次更新多少条(除不尽的情况，$limit != $average)
                        $limit = count($awards) - $average * $j;
                    } else {
                        $limit = $average;
                    }
                    $offset = $awards[0]->a_id + $j * $average;

                    if ($limit > 0) {
                        $ids = [];
                        for ($k = $offset; $k < $offset + $limit; $k++) {
                            $ids[] = $k;
                        }
                        $addTime = $awards[0]->a_send_time + $rand;
                        DB::table($tableName)->whereIn('a_id', $ids)->update(['a_send_time' => $addTime]);
                    }
                }
            }
        }
    }
}
