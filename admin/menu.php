<?php

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

// сформируем верхний пункт меню
$aMenu = array(
    'parent_menu' => 'global_menu_settings',
    'sort' => 1,
    'text' => Loc::getMessage('IDAV_MODULE_NAME'),
    "items_id" => "menu_webforms",
    "icon" => "util_menu_icon",
    'url' => 'git_davletbaev.php?lang=' . LANGUAGE_ID
);
return $aMenu;
