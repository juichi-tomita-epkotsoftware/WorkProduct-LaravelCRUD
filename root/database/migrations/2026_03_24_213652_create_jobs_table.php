<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
//無名クラスという書き方
{
    /**
     * @return void
     * この関数は何も返さないというメモ
     */
    public function up()    //migrate実行時
    {
        $tableName = 'jobs';        //テーブル名を変数に入れておく
        Schema::create($tableName, function (Blueprint $table) {
            // 第2引数：コールバック関数(あとで処理する関数)が渡されている。引数はクラスBlueprintと型宣言されている

            //カラム定義
            $table->id() -> comment('ID');
            $table->string('name') -> comment('名称');
            //nameが'カラム名'    名称は'説明文'
            $table->softDeletes() -> comment('消去日時');
            $table->timestamp('created_at') -> nullable() -> comment('作成日時');
            $table->timestamp('updated_at') -> nullable() -> comment('更新日時');
            //TIMESTAMP型のカラム作成
            //nullable()→NULLを許可する
        });
        DB::statement("ALTER TABLE {$tableName} COMMENT '職業'");
        //statementの引数は任意のSQL文１つ
        // テーブル自体にコメント追加
    }

    /**
     * 「テーブルが存在すれば削除する」 メソッド
     * @return void
     */
    public function down()  //migrate:rollback実行時
    {
        Schema::dropIfExists('jobs');
    }
};
