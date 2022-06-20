<?php
//composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

AddEventHandler("iblock", "OnAfterIBlockElementAdd", "OnAfterIBlockElementAddHandler");

// создаем обработчик события "OnAfterIBlockElementAdd"
function OnAfterIBlockElementAddHandler(&$arFields)
{
    if ($arFields["IBLOCK_ID"] == 2)
        AddMessage2Log($arFields);
}