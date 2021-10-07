<?php
// -------------------------------------------------------
// プロジェクトの設定をする
// -------------------------------------------------------

namespace Config;


class ProjectSettings
{
    public const IS_DEBUG = true;
    public const APPLICATIONS = [
        ConfigApplication::class,
    ];
}