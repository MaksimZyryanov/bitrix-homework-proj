<?php

/** @global CUser $USER */
/** @var CMain $APPLICATION */

if (!$USER->IsAdmin()) {
    return;
}

use Bitrix\Main\Loader;
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

$module_id = 'ylab.learnmodule';

Loc::loadMessages(__FILE__);

Loader::includeModule($module_id);


$request = Application::getInstance()->getContext()->getRequest();

$aTabs = [
    [
        "DIV" => "ylab_import_tab1",
        "TAB" => Loc::getMessage("YLAB.LEARN.SETTINGS"),
        "ICON" => "settings",
        "TITLE" => Loc::getMessage("YLAB.LEARN.TITLE"),
    ],
];

$aTabs[] = [
    'DIV' => 'rights',
    'TAB' => GetMessage('MAIN_TAB_RIGHTS'),
    'TITLE' => GetMessage('MAIN_TAB_TITLE_RIGHTS')
];


$arAllOptions = [
    'main' => [
        ["limit_to_raws", Loc::getMessage("YLAB.LEARN.LIMIT_TO_RAWS"), '', ['text', '']],
        ["is_avilable", Loc::getMessage("YLAB.LEARN.IS_AVILABLE"), '', ['checkbox', '']],
        ["notes", Loc::getMessage("YLAB.LEARN.NOTES"), '', ['textarea', 10, 50]],
        ["readonly_write_mode", Loc::getMessage("YLAB.LEARN.READONLY_WRITE_MODE"), "",
            [
                "selectbox",
                [
                    "readonly" => Loc::getMessage("YLAB.LEARN.READONLY"),
                    "write" => Loc::getMessage("YLAB.LEARN.WRITE")
                ],
            ],
        ],
        ['password', Loc::getMessage("YLAB.LEARN.PASSWORD"), '', ['password', 20]],
        ['readonly_note', Loc::getMessage("YLAB.LEARN.READONLY_NOTE"), '1.0.0 learn', ['text', 20], 'Y'],
        ['groups', Loc::getMessage("YLAB.LEARN.GROUPS"), "all",
            [
                "multiselectbox",
                [
                    "all" => Loc::getMessage("YLAB.LEARN.ALL"),
                    "moder" => Loc::getMessage("YLAB.LEARN.MODER"),
                    "admin" => Loc::getMessage("YLAB.LEARN.ADMIN")
                ],
            ],
        ],
        ['statictext', Loc::getMessage("YLAB.LEARN.STATIC"), '', ['statictext']],
        ['statichtml', Loc::getMessage("YLAB.LEARN.STATIC_HTML"), '', ['statichtml']],

    ],
];

if (($request->get('save') !== null || $request->get('apply') !== null) && check_bitrix_sessid()) {
    __AdmSettingsSaveOptions($module_id, $arAllOptions['main']);
}

$tabControl = new CAdminTabControl("tabControl", $aTabs);

?>
<form method="post"
      action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($module_id) ?>&lang=<?= LANGUAGE_ID ?>"
      name="ylab_import"><?
    echo bitrix_sessid_post();

    $tabControl->Begin();

    $tabControl->BeginNextTab();

    __AdmSettingsDrawList($module_id, $arAllOptions["main"]);

    $tabControl->BeginNextTab();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/admin/group_rights.php';

    $tabControl->Buttons([]);

    $tabControl->End();
    ?><input type="hidden" name="Update" value="Y"</form>