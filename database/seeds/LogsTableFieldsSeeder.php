<?php

use Illuminate\Database\Seeder;

class LogsTableFieldsSeeder extends Seeder
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
                'table_name' => 'logs',
                'name' => 'gid',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '项目ID',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'logs',
                'name' => 'uid',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '用户ID',
                'can_del' => 1,
                'indexes' => 'normal',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'logs',
                'name' => 'event',
                'type' => 'varchar',
                'length' => 20,
                'default' => null,
                'comment' => '执行方法之间名称',
                'can_del' => 1,
                'indexes' => 'normal',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'logs',
                'name' => 'value',
                'type' => 'varchar',
                'length' => 500,
                'default' => null,
                'comment' => '需要传参的接口，传入参数数据',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'logs',
                'name' => 'score',
                'type' => 'varchar',
                'length' => 10,
                'default' => null,
                'comment' => '项目ID',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'logs',
                'name' => 'more',
                'type' => 'varchar',
                'length' => 200,
                'default' => null,
                'comment' => '日志说明',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'logs',
                'name' => 'updated',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '日志时间戳格式',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'logs',
                'name' => 'updated_date',
                'type' => 'datetime',
                'length' => null,
                'default' => null,
                'comment' => '日志日期格式',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
        ];

        DB::table('fields')->insert($attr);
    }
}
