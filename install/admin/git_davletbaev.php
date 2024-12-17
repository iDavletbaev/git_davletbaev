<?php

// определяем в какой папке находится модуль, если в bitrix, инклудим файл с меню из папки bitrix
if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/git_davletbaev.php")) {
    // присоединяем и копируем файл
    require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/git.davletbaev/admin/git_davletbaev.php");
}
// определяем в какой папке находится модуль, если в local, инклудим файл с меню из папки local
if (is_dir($_SERVER["DOCUMENT_ROOT"] . "/local/modules/git.davletbaev/")) {
    // присоединяем и копируем файл
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/modules/git.davletbaev/admin/git_davletbaev.php");
}
