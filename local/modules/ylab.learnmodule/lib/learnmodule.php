<?php

namespace Ylab\Learnmodule;

use Bitrix\Main\Localization\Loc;

/**
 * Class Import
 * @package Ylab\Import
 */
class Learnmodule
{
    private $moduleId = 'ylab.learnmodule';

    public function getModuleOptions(): string
    {
        $mode = (\COption::GetOptionString($this->moduleId, "readonly_write_mode", '0'));
        switch ($mode) {
            case "write":
                $mode = Loc::getMessage('YLAB_LEARN_READONLY');
                break;
            case "readonly":
                $mode = Loc::getMessage('YLAB_LEARN_WRITE');
                break;
        }
        return
            Loc::getMessage('YLAB_LEARN_MODULE_OPTIONS') . ": " . "<br>"
            . Loc::getMessage('YLAB_LEARN_LIMIT_TO_RAWS') . ": " . \COption::GetOptionString($this->moduleId, "limit_to_raws", '0') . "<br>"
            . Loc::getMessage('YLAB_LEARN_IS_AVILABLE') . ": " . (\COption::GetOptionString($this->moduleId, "is_avilable", '0') === "Y" ? "Да" : "Нет") . "<br>"
            . Loc::getMessage('YLAB_LEARN_NOTES') . ": " . \COption::GetOptionString($this->moduleId, "notes", '0') . "<br>"
            . Loc::getMessage('YLAB_LEARN_READONLY') . ": " . $mode . "<br>"
            . Loc::getMessage('YLAB_LEARN_PASSWORD') . ": " . \COption::GetOptionString($this->moduleId, "password", '0') . "<br>"
            . Loc::getMessage('YLAB_LEARN_GROUPS') . ": " . \COption::GetOptionString($this->moduleId, "groups", '0') . "<br>"
            . Loc::getMessage('YLAB_LEARN_READONLY_NOTE') . ": " . \COption::GetOptionString($this->moduleId, "readonly_note", '0') . "<br>";
    }
}