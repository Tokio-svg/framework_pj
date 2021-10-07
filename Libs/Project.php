<?php
// -------------------------------------------------------
// Libs ディレクトリの中のWebFrameworkメイン機能の一つ
// -------------------------------------------------------

namespace Libs;


class Project
{
  // 静的プロパティ $_instanceを定義
  private static Project $_instance;

  // メソッド：自動で行われる処理をここに記述
  private function __construct()
  {
  }

  // メソッド：$_instanceが空の場合はインスタンスを作成する
  public static function instance()
  {
    // self:: 自クラスのプロパティ、メソッドへの静的アクセス
    if (empty(self::$_instance)) {
        self::$_instance = new Project();
    }

    return self::$_instance;
  }

  // メソッド：レスポンスを出力
  public function run()
  {
    $response = new \Libs\Https\Response('This is content of response.');
    $response->send();
  }
}
