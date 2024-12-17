<?php

namespace Davletbaev;

use \Bitrix\Main\Entity;
use \Bitrix\Main\ORM\Fields;
use \Bitrix\Main\Type;

class GitDavletbaev extends Entity\DataManager
{
    public static function gitStatus()
    {
        chdir($_SERVER['DOCUMENT_ROOT']);
        exec('git status', $output, $retval);
        return $output[0];
    }

    public static function gitInitCheck(): bool
    {
        if (is_dir($_SERVER['DOCUMENT_ROOT'] . '.git')) {
            return true;
        } else {
            return false;
        }
    }
}
