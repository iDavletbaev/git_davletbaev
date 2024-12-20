<?php

namespace Davletbaev;

use \Bitrix\Main\Entity;
use \Bitrix\Main\ORM\Fields;
use \Bitrix\Main\Type;

class GitDavletbaev extends Entity\DataManager
{
    /**
     * Выполняет команду 'git status' в корневой директории документа.
     *
     * @return string Первая строка вывода команды git status.
     */
    public static function gitStatus()
    {
        chdir($_SERVER['DOCUMENT_ROOT']);
        exec('git status', $output, $retval);
        return $output[0];
    }

    /**
     * Проверяет, является ли текущая директория git-репозиторием.
     *
     * @return bool
     * True, если директория является git-репозиторием, иначе false.
     */
    public static function gitInitCheck(): bool
    {
        if (is_dir($_SERVER['DOCUMENT_ROOT'] . '.git')) {
            return true;
        } else {
            return false;
        }
    }
}
