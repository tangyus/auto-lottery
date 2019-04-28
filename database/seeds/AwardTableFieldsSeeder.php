<?php

use Illuminate\Database\Seeder;

class AwardTableFieldsSeeder extends Seeder
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
                'table_name' => 'award',
                'name' => 'award_id',
                'type' => 'tinyint',
                'length' => 2,
                'default' => null,
                'comment' => '奖品类型标识ID',
                'can_del' => 1,
                'indexes' => 'normal',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'award',
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
                'table_name' => 'award',
                'name' => 'got',
                'type' => 'tinyint',
                'length' => 1,
                'default' => 0,
                'indexes' => 'normal',
                'comment' => '是否已抽取，0未抽取，1已抽取',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'award',
                'name' => 'num',
                'type' => 'tinyint',
                'length' => 2,
                'default' => 1,
                'comment' => '奖品数量',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'award',
                'name' => 'only_key',
                'type' => 'varchar',
                'length' => 50,
                'default' => '',
                'comment' => '奖品唯一兑换码',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'award',
                'name' => 'send_time',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '奖品发放时间，在此时间内的奖品才可抽中',
                'can_del' => 1,
                'indexes' => 'normal',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
        ];

        DB::table('fields')->insert($attr);
    }
}
