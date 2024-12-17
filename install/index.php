<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;

Loc::loadMessages(__FILE__);

global $MESS;

class git_davletbaev extends CModule
{
    public function __construct()
    {
        if (file_exists(__DIR__ . "/version.php")) {
            $arModuleVersion = array();

            include_once(__DIR__ . "/version.php");

            $this->MODULE_ID = str_replace("_", ".", get_class($this));
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
            $this->MODULE_NAME = Loc::getMessage("IDAV_MODULE_NAME");
            $this->MODULE_DESCRIPTION = Loc::getMessage("IDAV_MODULE_DESC");
            $this->PARTNER_NAME = Loc::getMessage("IDAV_PARTNER_NAME");
            $this->PARTNER_URI = Loc::getMessage("IDAV_PARTNER_URL");
            $this->IBLOCK_TYPE = 'git_davletbaev';
        }

        return false;
    }

    public function DoInstall()
    {
        global $APPLICATION;

        if (CheckVersion(ModuleManager::getVersion("main"), "14.00.00")) {
            ModuleManager::registerModule($this->MODULE_ID);

            $this->InstallFiles(); // установка файлов
//            $this->InstallDB(); // создание таблиц в БД
//            $this->InstallEvents(); // установка событий (в планах)
//            $this->CreateIblocks(); // сиздание типа инфоблока, инфоблока и прочего с ними связанного
        } else {
            $APPLICATION->ThrowException(
                Loc::getMessage("IDAV_INSTALL_ERROR_VERSION")
            );
        }

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage("IDAV_INSTALL_OK") . " \"" .
            Loc::getMessage("IDAV_MODULE_NAME") . "\"",
            __DIR__ . "/step.php"
        );

        return false;
    }

    public function InstallFiles()
    {
        return false;
    }

    public function InstallDB()
    {
        return false;
    }

    public function DoUninstall()
    {
        global $APPLICATION;

        $this->UnInstallFiles(); // удаление установленных файлов
        //$this->UnInstallDB(); // удаление созданных в БД таблиц
        //$this->DelIblocks(); // удаление инфоблоков и их типов

        ModuleManager::unRegisterModule($this->MODULE_ID);

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage("IDAV_UNISTALL_OK")." \"".Loc::getMessage("IDAV_MODULE_NAME")."\"",
            __DIR__."/unstep.php"
        );

        return false;
    }
}
