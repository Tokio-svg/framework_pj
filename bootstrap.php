<?php
// -------------------------------------------------------
// リクエストが来たときのプロジェクトの設定の反映や準備を行う
// - Appの登録と初期化
// - DEBUGモードならエラーがあった時に表示するようにする
// -------------------------------------------------------

require_once 'Config/ProjectSettings.php';
require_once 'Config/DirectorySettings.php';
require_once 'Libs/Utils/AutoLoader.php';

use Config\ProjectSettings;
use Config\DirectorySettings;
use Libs\Utils\AutoLoader;

// デバッグモードの場合はエラー時の表示を行う
if (ProjectSettings::IS_DEBUG)
    ini_set('display_errors', 'On');

// AutoLoaderクラスで自動require
$auto_loader = new AutoLoader(DirectorySettings::APPLICATION_ROOT_DIR);
$auto_loader->run();

// ProjectSettingsに登録したApplicationを順に起動
foreach (ProjectSettings::APPLICATIONS as $APPLICATION){
    $application = new $APPLICATION();
    $application->ready();
}

$project = \Libs\Project::instance();