<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->unique()->comment('项目ID');
            $table->unsignedInteger('start')->comment('开始时间-时间戳格式');
            $table->unsignedInteger('end')->comment('结束时间-时间戳');
            $table->dateTime('start_date')->comment('开始时间-日期格式');
            $table->dateTime('end_date')->comment('结束时间-日期格式');
            $table->unsignedInteger('prob')->nullable()->default(5000)->comment('中奖概率，x / 10000，8000为80%');
            $table->unsignedInteger('ip_limit')->nullable()->default(10)->comment('独立IP中奖个数限制');
            $table->unsignedInteger('time_limit')->nullable()->default(1)->comment('中奖次数限制');
            $table->unsignedInteger('lottery_time_limit')->nullable()->default(3)->comment('每日抽奖次数限制');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
