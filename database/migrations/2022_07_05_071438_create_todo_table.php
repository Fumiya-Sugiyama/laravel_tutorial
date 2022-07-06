<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');  // タイトル
            $table->text('description');  // 内容
            $table->integer('status'); // 着手状態
            $table->datetime('deadline'); // 期限
            $table->integer('created_by'); // 作成者
            $table->datetime('created_at'); // 作成日時
            $table->integer('updated_by'); // 更新者
            $table->datetime('updated_at'); // 更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
