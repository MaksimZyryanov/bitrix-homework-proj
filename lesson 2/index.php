<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

use Ylab\Helpers;

/** @var CAllMain $APPLICATION */
$APPLICATION->SetTitle("Домашняя работа 2");
?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "welcome",
    [
        "IBLOCK_TYPE" => "contacts",

        //Использование статического метода для получения ID ИБ
        "IBLOCK_ID" => Helpers::getIBlockIdByCode('contacts'),

        "PROPERTY_CODE" => [
            0 => "PHONE",
            1 => "FULLNAME",
            2 => "ADDRESS",
        ],

        //подключение свойств инфоблока addresses (Адреса)
        "FIELD_CODE" => [
            'PROPERTY_ADDRESS.PROPERTY_TOWN',
            'PROPERTY_ADDRESS.PROPERTY_STREET',
            'PROPERTY_ADDRESS.PROPERTY_HOUSE',
            'PROPERTY_ADDRESS.PROPERTY_FLAT'
        ],

        "PAGER_TITLE" => "Контакты"
   ],
);
?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>