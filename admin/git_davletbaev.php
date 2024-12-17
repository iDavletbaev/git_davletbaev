<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_before.php';

use Bitrix\Main\Localization\Loc;
use Davletbaev\GitDavletbaev;

use \Bitrix\Main\Loader;

$POST_RIGHT = $APPLICATION->GetGroupRight("git.davletbaev");

if ($POST_RIGHT == "D") {
    $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
}

$APPLICATION->SetTitle(Loc::getMessage('IDAV_MODULE_NAME'));

IncludeModuleLangFile(__FILE__);
$aTabs = array(
    array(
        "TAB" => Loc::getMessage('IDAV_GIT_STATUS'),
        "TITLE" => Loc::getMessage('IDAV_GIT_STATUS')
    )
);

// отрисовываем форму, для этого создаем новый экземпляр класса CAdminTabControl, куда и передаём массив с настройками
$tabControl = new CAdminTabControl(
    "tabControl",
    $aTabs
);

// подключаем модуль для того что бы был видем класс ORM
Loader::includeModule("git.davletbaev");

// Необходимость сохранения изменений мы определим по следующим параметрам: 1)Страница вызвана методом POST; 2)Среди входных данных есть идентификаторы кнопок "Сохранить" и "Применить". Если эти условия сооблюдены и пройдены проверки безопасности, можно сохранять переданные скрипту данные:
if ($REQUEST_METHOD == "POST" && $save != "" && $POST_RIGHT == "W" && check_bitrix_sessid()) {
    // здесь получаем данные из модуля
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_after.php';

?>
<form method="POST" action="<?= $APPLICATION->GetCurPage() ?>" ENCTYPE="multipart/form-data" name="post_form">
<?php
// проверка идентификатора сессии
echo bitrix_sessid_post();

// отобразим заголовки закладок
$tabControl->Begin();
$tabControl->BeginNextTab();

$gitInitialized = \Davletbaev\GitDavletbaev::gitInitCheck();

echo "<pre>";
    print_r($gitInitialized);
echo "</pre>";

if ($gitInitialized) {
    echo 'ok';
} else {
    echo 'error';
}

?>
<div style="border: 1px solid red; width: 50px;height: 50px">
    sdsvd
</div>

<?php
// выводит стандартные кнопки отправки формы
$tabControl->Buttons();
?>
    <input class="adm-btn-save" type="submit" name="save" value="Сохранить настройки"/>
<?php
// завершаем интерфейс закладки
$tabControl->End();
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php';
