<?php

use Illuminate\Database\Seeder;

class LotteryLogsTableFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createAt = \Carbon\Carbon::now();

        $attr = [
            [
                'table_name' => 'lottery_logs',
                'name' => 'uid',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '抽奖用户ID',
                'can_del' => 1,
                'indexes' => 'index',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'lottery_logs',
                'name' => 'phone',
                'type' => 'varchar',
                'length' => 20,
                'default' => null,
                'comment' => '抽奖手机号，与用户绑定手机号一致',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'lottery_logs',
                'name' => 'win_status',
                'type' => 'varchar',
                'length' => 20,
                'default' => '未中奖',
                'comment' => '用户抽奖是否中奖状态描述',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'lottery_logs',
                'name' => 'msg',
                'type' => 'varchar',
                'length' => 20,
                'default' => null,
                'comment' => '如果是 lottery 抽奖接口，则描述用户抽奖过程逻辑到哪一步，便于问题分析',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'lottery_logs',
                'name' => 'updated',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '抽奖时间-时间戳',
                'can_del' => 1,
                'indexes' => 'index',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'lottery_logs',
                'name' => 'updated_date',
                'type' => 'datetime',
                'length' => null,
                'default' => null,
                'comment' => '抽奖时间-日期',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
        ];

        DB::table('fields')->insert($attr);
    }
}
