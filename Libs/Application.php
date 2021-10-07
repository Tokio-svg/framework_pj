<?php
// -------------------------------------------------------
// 各Appを登録する際に使用するWebFrameworkメイン機能の一つ
// このApplicationクラスを継承し、readyを実行するとAppが起動する
// 継承先のクラスで必要に応じてreadyメソッドの処理をオーバーライドする
// -------------------------------------------------------

namespace Libs;


class Application
{
    public function ready(){
        // Override this method in subclasses to run code when Project starts.
    }
}