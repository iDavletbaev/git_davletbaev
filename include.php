<?php

Bitrix\Main\Loader::registerAutoloadClasses(
// имя модуля
    "git.davletbaev",
    array(
        // ключ - имя класса с простанством имен, значение - путь относительно корня сайта к файлу
        "Davletbaev\GitDavletbaev" => "lib/GitDavletbaev.php",
        // файл инклудится за счет правильных имен, иначе будет ошибка при установке и удаленни модуля
        //"Hmarketing\\d7\\DataTable" => "lib/data.php",
    )
);
