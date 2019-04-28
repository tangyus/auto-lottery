<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TablesTableSeeder::class);
         $this->call(UserTableFieldsSeeder::class);
         $this->call(AwardTableFieldsSeeder::class);
         $this->call(WinnerTableFieldsSeeder::class);
         $this->call(LogsTableFieldsSeeder::class);
         $this->call(LotteryLogsTableFieldsSeeder::class);
    }
}
