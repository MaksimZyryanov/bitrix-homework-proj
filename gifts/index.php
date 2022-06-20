<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

use Ylab\Helpers;

/** @var  CAllMain $APPLICATION */

?>

<?php
$APPLICATION->IncludeComponent(
    'ylab:gifts',
    '',
    [

    ]
);

?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>