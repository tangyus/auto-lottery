<?php

use Illuminate\Database\Seeder;

class UserTableFieldsSeeder extends Seeder
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
                'table_name' => 'user',
                'name' => 'uid',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '用户ID',
                'can_del' => 1,
                'indexes' => 'unique',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'openid',
                'type' => 'varchar',
                'length' => 100,
                'default' => null,
                'comment' => '微信openID',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'nick',
                'type' => 'varchar',
                'length' => 50,
                'default' => '',
                'comment' => '微信昵称',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'headimg',
                'type' => 'varchar',
                'length' => 200,
                'default' => '',
                'comment' => '微信头像',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'name',
                'type' => 'varchar',
                'length' => 20,
                'default' => '',
                'comment' => '用户姓名',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'phone',
                'type' => 'varchar',
                'length' => 20,
                'default' => '',
                'comment' => '用户电话号码',
                'can_del' => 1,
                'indexes' => 'normal',
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'ipaddress',
                'type' => 'varchar',
                'length' => 20,
                'default' => null,
                'comment' => '用户IP地址',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'updated',
                'type' => 'int',
                'length' => 10,
                'default' => null,
                'comment' => '用户注册时间-时间戳',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
            [
                'table_name' => 'user',
                'name' => 'updated_date',
                'type' => 'datetime',
                'length' => null,
                'default' => null,
                'comment' => '用户注册时间-日期格式',
                'can_del' => 1,
                'indexes' => null,
                'created_at' => $createAt,
                'updated_at' => $createAt,
            ],
        ];

        DB::table('fields')->insert($attr);
    }
}
