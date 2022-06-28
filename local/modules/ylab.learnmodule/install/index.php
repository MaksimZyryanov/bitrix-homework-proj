<?php

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\IO\Directory;
use Bitrix\Main\IO\File;
use Bitrix\Main\ModuleManager;

/**
 * Class ylab_import
 * Модуль импорта товаров
 */
class ylab_learnmodule extends CModule
{
    /**
     * ID модуля
     * @var string
     */
    public $MODULE_ID = 'ylab.learnmodule';

    /**
     * constructor
     */
    public function __construct()
    {
        $arModuleVersion = [];

        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = Loc::getMessage('YLAB_LEARN_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('YLAB_LEARN_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('PARTNER_URI');
    }

    /**
     * @return bool|void
     */
    public function DoInstall()
    {
        global $APPLICATION;

        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();

        $this->installDB();
        $this->installFiles();
        $this->insertDB();

        switch ($request["step"]) {
            case NULL:
                $APPLICATION->IncludeAdminFile(Loc::getMessage('STEP') . ' 1', $this->GetPath() . '\install\step1.php');
                break;
            case 1:
                COption::SetOptionString($this->MODULE_ID, "limit_to_raws", $request["limit_to_raws"]);
                COption::SetOptionString($this->MODULE_ID, "is_avilable", $request["is_avilable"]);
                COption::SetOptionString($this->MODULE_ID, "notes", $request["notes"]);

                $APPLICATION->IncludeAdminFile(Loc::getMessage('STEP') . ' 2', $this->GetPath() . '\install\step2.php');
                break;
            case 2:
                COption::SetOptionString($this->MODULE_ID, "readonly_write_mode", $request["readonly_write_mode"]);
                COption::SetOptionString($this->MODULE_ID, "password", $request["password"]);
                COption::SetOptionString($this->MODULE_ID, "readonly_note", $request["readonly_note"]);

                $APPLICATION->IncludeAdminFile(Loc::getMessage('STEP') . ' 3', $this->GetPath() . '\install\step3.php');
                break;
            case 3:
                //AddMessage2Log($request[groups]);
                $groups = '';
                foreach ($request["groups"] as $group) {
                    $groups .= $group . ', ';
                }
                COption::SetOptionString($this->MODULE_ID, "groups", $groups);
                COption::SetOptionString($this->MODULE_ID, "statictext", $request["statictext"]);
                COption::SetOptionString($this->MODULE_ID, "statichtml", $request["statichtml"]);

                break;
        }

        ModuleManager::registerModule($this->MODULE_ID);
        return true;
    }

    /**
     * @return bool|void
     */
    public function DoUninstall()
    {
        $this->uninstallDB();
        $this->uninstallFiles();

        COption::RemoveOption($this->MODULE_ID, "limit_to_raws");
        COption::RemoveOption($this->MODULE_ID, "is_avilable");
        COption::RemoveOption($this->MODULE_ID, "notes");
        COption::RemoveOption($this->MODULE_ID, "readonly_write_mode");
        COption::RemoveOption($this->MODULE_ID, "password");
        COption::RemoveOption($this->MODULE_ID, "readonly_note");
        COption::RemoveOption($this->MODULE_ID, "groups");
        COption::RemoveOption($this->MODULE_ID, "statictext");
        COption::RemoveOption($this->MODULE_ID, "statichtml");

        ModuleManager::unregisterModule($this->MODULE_ID);

        return true;
    }

    /**
     * @param array $arParams
     * @return bool|void
     */
    public function installFiles($arParams = array())
    {
        $root = Application::getDocumentRoot();

        CopyDirFiles(__DIR__ . '/components/', $root . '/local/components', true, true);

        if (is_dir($sPachDir = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $this->MODULE_ID . '/admin')) {
            if ($sDir = opendir($sPachDir)) {
                while (false !== $sItem = readdir($sDir)) {
                    if ($sItem == '..' || $sItem == '.' || $sItem == 'menu.php') {
                        continue;
                    }

                    file_put_contents($file = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin/' . $this->MODULE_ID . '_' . $sItem,
                        '<' . '? require($_SERVER["DOCUMENT_ROOT"] . "/local/modules/' . $this->MODULE_ID . '/admin/' . $sItem . '");?' . '>');
                }

                closedir($sDir);
            }
        }
        return true;
    }

    /**
     * @return bool|void
     */
    public function uninstallFiles()
    {
        if (Directory::isDirectoryExists($path = $this->GetPath() . '/admin')) {
            DeleteDirFiles($_SERVER['DOCUMENT_ROOT'] . $this->GetPath() . '/admin/',
                $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin');

            if ($dir = opendir($path)) {
                while (false !== $item = readdir($dir)) {
                    File::deleteFile($_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin/' . $this->MODULE_ID . '_' . $item);
                }

                closedir($dir);
            }
        }

        DeleteDirFiles(__DIR__ . "/components", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/components");
        return true;
    }

    /**
     * @return bool|void
     */
    public function installDB()
    {
        $sPath = $this->getPath() . '/install/db/mysql/up/';
        $oConn = Application::getConnection();
        $arFiles = scandir($sPath, SCANDIR_SORT_NONE);

        foreach ($arFiles as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }

            $sQuery = file_get_contents($sPath . $file);
            $oConn->executeSqlBatch($sQuery);
        }

        return true;
    }

    /**
     * @return bool|void
     */
    public function uninstallDB()
    {
        $sPath = $this->getPath() . '/install/db/mysql/down/';
        $oConn = Application::getConnection();
        $arFiles = scandir($sPath, SCANDIR_SORT_NONE);

        foreach ($arFiles as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }

            $sQuery = file_get_contents($sPath . $file);
            $oConn->executeSqlBatch($sQuery);
        }
        return true;
    }

    /**
     * @return bool|void
     */
    public function insertDB()
    {
        $sPath = $this->getPath() . '/install/db/mysql/insert/';
        $oConn = Application::getConnection();
        $arFiles = scandir($sPath, SCANDIR_SORT_NONE);

        foreach ($arFiles as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }

            $sQuery = file_get_contents($sPath . $file);
            $oConn->executeSqlBatch($sQuery);

        }
        return true;
    }


    /**
     * @param bool $bNotDocumentRoot
     * @return mixed|string
     */
    public
    function GetPath($bNotDocumentRoot = false)
    {
        if ($bNotDocumentRoot) {
            return str_ireplace(Application::getDocumentRoot(), '', str_replace('\\', '/', dirname(__DIR__)));
        }

        return dirname(__DIR__);
    }
}