<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('table_name', 20)->index()->comment('表名');
            $table->string('name', 20)->comment('字段名');
            $table->string('type', 20)->comment('字段类型');
            $table->unsignedInteger('length')->nullable()->comment('字段长度');
            $table->string('default', 6)->nullable()->default(null)->comment('默认值');
            $table->string('comment', 200)->nullable()->default(null)->comment('注释说明');
            $table->unsignedTinyInteger('can_del')->nullable()->default(0)->comment('1不能被删除，0可以被删除');
            $table->string('indexes', 20)->nullable()->default(null)->comment('索引类型');
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
        Schema::dropIfExists('fields');
    }
}
