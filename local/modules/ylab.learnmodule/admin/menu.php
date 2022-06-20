<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

AddEventHandler('main', 'OnBuildGlobalMenu', 'YlabLearnModuleMenu');

if (!function_exists('YlabLearnModuleMenu')) {
    /**
     * Отображение меню
     * @param $adminMenu
     * @param $moduleMenu
     */
    function YlabLearnModuleMenu(&$adminMenu, &$moduleMenu)
    {
        $adminMenu['global_menu_services']['items'][] = [
            'section' => 'ylab-learn-module',
            'sort' => 110,
            'text' => Loc::getMessage('YLAB_LEARN_MODULE_TITLE_PAGE'),
            'items_id' => 'nlmk-hidden-pages',
            'items' => [
                [
                    'parent_menu' => 'ylab-learn-module',
                    'section' => 'ylab-learn-module-options',
                    'sort' => 500,
                    'url' => 'ylab.learnmodule_options.php?lang=' . LANG,
                    'text' => Loc::getMessage('YLAB_LEARN_MODULE_OPTIONS'),
                    'title' => Loc::getMessage('YLAB_LEARN_MODULE_OPTIONS'),
                    'icon' => 'form_menu_icon',
                    'page_icon' => 'form_page_icon',
                    'items_id' => 'ylab-learn-module-logs'
                ],
            ]
        ];
    }

}