<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unique()->comment('数据表名');
            $table->string('alias', 20)->comment('别名');
            $table->string('engine', 20)->nullable()->default('InnoDB')->comment('InnoDB 和 MyISAM');
            $table->unsignedInteger('auto_increment')->nullable()->default('1')->comment('自增主键值');
            $table->string('charset')->nullable()->default('utf8')->comment('默认字符集');
            $table->unsignedTinyInteger('can_del')->default(0)->comment('0能被删除，1不能被删除');
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
        Schema::dropIfExists('tables');
    }
}
