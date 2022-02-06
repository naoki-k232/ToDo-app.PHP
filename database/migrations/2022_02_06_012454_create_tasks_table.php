<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // incrementsメソッドは、主キーとして自動増分のUNSIGNED INTEGERカラムを作成します。
            $table->increments('id');

            // stringメソッドは、指定された長さのVARCHARカラムを作成します。
            $table->string('title', 100);
            // dateメソッドはDATEカラムを作成します。
            $table->date('due_date');
            // カラムの「デフォルト」値を指定
            $table->integer('status')->default(1);
            // timestampメソッドは、オプションの精度(合計桁数)でTIMESTAMPカラムを作成します。
            $table->timestamps();

            $table->foreignId('folder_id')->constrained();

            // Laravel -V7以下の外部キー設定方法
            // INTEGERカラムをUNSIGNEDとして設定
            // $table->integer('folder_id')->unsigned();
            // 外部キーを設定する
            // $table->foreign('folder_id')->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
