<?php

use Illuminate\Database\Seeder;

class WinnerTableFieldsSeeder extends Seeder
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
                'table_name' => 'winner',
                'name' => 'uid',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '获奖用户ID',
                'can_del' => 1,
                'indexes' => 'normal',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'winner',
                'name' => 'award_id',
                'type' => 'tinyint',
                'length' => 2,
                'default' => null,
                'comment' => '奖品ID（用于判断奖品类型）',
                'can_del' => 1,
                'indexes' => 'normal',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'winner',
                'name' => 'award_name',
                'type' => 'varchar',
                'length' => 30,
                'default' => null,
                'comment' => '奖品名称',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'winner',
                'name' => 'got',
                'type' => 'tinyint',
                'length' => 1,
                'default' => null,
                'comment' => '是否领取，0未领取，1已领取',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'winner',
                'name' => 'only_key',
                'type' => 'varchar',
                'length' => 50,
                'default' => '',
                'comment' => '兑奖码',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'winner',
                'name' => 'num',
                'type' => 'tinyint',
                'length' => 2,
                'default' => null,
                'comment' => '数量',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'winner',
                'name' => 'updated',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '中奖时间-时间戳',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'winner',
                'name' => 'updated_date',
                'type' => 'datetime',
                'length' => null,
                'default' => null,
                'comment' => '中奖时间-日期格式',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
        ];

        DB::table('fields')->insert($attr);
    }
}
