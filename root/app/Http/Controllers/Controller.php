<?php
// 全コントローラの親(Laravelがデフォルトで用意している)
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   //権限チェック
use Illuminate\Foundation\Bus\DispatchesJobs;               //バックグラウンド処理の実行
use Illuminate\Foundation\Validation\ValidatesRequests;     //バリデーション
use Illuminate\Routing\Controller as BaseController;        //ルーティング機能の核となるクラス

class Controller extends BaseController     //Laravelの土台+プロジェクトの共通機能をまとめた中間クラス
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
//中間クラスに一度書くことで全コントローラが自動的に3つの機能を持てるようになる