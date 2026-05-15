<?php

use App\Http\Controllers\JobController;
//自作のCRUD処理をまとめたクラス
use Illuminate\Support\Facades\Route;
//get,postといったルーティングメソッドを提供するLaravelクラス

Route::prefix('admin') ->name('admin')->group(function(){
/**
 * prefix:URL全部に/adminを追加
 * name:ルート名にプレフィックス(admin)を追加    ex.admin.jobs.index
 * group:prefixやnameの設定をまとめて複数のルートに適用させる。
 */
    Route::view('','admin.index')->name('.index');
    /**
     * view:コントローラ不要でBladeビューを直接返すショートカット
     */
    Route::prefix('jobs')->name('.jobs')->controller(JobController::class)->group(function(){
    /**
     * このグループ内のルートは全てJobControllerが担当するという宣言
     * 以下メソッド(get/post(新規登録)/patch(部分更新)/delete)はHTTPメソッド対応のルート定義
     */
        Route::get('','index')->name('.index');
        // name():ルート名上書きされないようこれまでのルート名+連結
        // URL:ユーザーが実際にアクセスするパス
        // ルート名：Laravel内部で使う名前（ニックネーム）

        Route::post('','store')->name('.store');
        //新規登録処理
        Route::get('create','create')->name('.create');
        //登録画面を表示
        Route::get('{job}','show')->name('.show');
        //詳細画面を表示
        Route::patch('{job}','update')->name('.update');
        //編集処理
        Route::delete('{job}','destroy')->name('.destroy');
        //削除処理
        Route::get('{job}/edit','edit')->name('.edit');
        //編集画面を表示
        Route::get('{job}/confirm','confirm')->name('.confirm');
        //確認画面を表示
        Route::post('csv', 'downloadCsv')->name('.csv');
        //csvダウンロード処理
        Route::post('tsv', 'downloadTsv')->name('.tsv');
        //tsvダウンロード処理
    });
});
