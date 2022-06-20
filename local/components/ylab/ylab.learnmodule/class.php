<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Ylab\Learnmodule\Learnmodule;

/**
 * Class YlabImport
 */
class YlabLearnmoduleComponent extends CBitrixComponent
{
    /**
     * @return mixed|void
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function executeComponent()
    {
        Loader::includeModule('ylab.learnmodule');

        $profile = new Learnmodule();

        $this->arResult['OPTIONS'] = $profile->getModuleOptions();

        $this->includeComponentTemplate();
    }
}