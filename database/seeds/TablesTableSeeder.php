<?php

use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
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
                'name' => 'user',
                'alias' => '用户表',
                'engine' => 'InnoDB',
                'auto_increment' => 1,
                'charset' => 'utf8',
                'can_del' => 1,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'name' => 'award',
                'alias' => '奖池表',
                'engine' => 'InnoDB',
                'auto_increment' => 1,
                'charset' => 'utf8',
                'can_del' => 1,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'name' => 'winner',
                'alias' => '用户中奖信息表',
                'engine' => 'InnoDB',
                'auto_increment' => 1,
                'charset' => 'utf8',
                'can_del' => 1,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'name' => 'logs',
                'alias' => '操作日志表',
                'engine' => 'InnoDB',
                'auto_increment' => 1,
                'charset' => 'utf8',
                'can_del' => 1,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'name' => 'lottery_logs',
                'alias' => '用户抽奖日志表',
                'engine' => 'InnoDB',
                'auto_increment' => 1,
                'charset' => 'utf8',
                'can_del' => 1,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ]
        ];
        DB::table('tables')->insert($attr);
    }
}
