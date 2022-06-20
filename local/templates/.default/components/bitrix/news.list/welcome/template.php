<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<div class="news-list">
    <?php
    /** @var array $arResult */
    foreach ($arResult['ITEMS'] as $arItem) {
        //получение свойств из инфоблока "Адреса" по ID адреса в инфоблоке "Контакты" чрез ключ "PROPERTY_ADDRESS_PROPERTY..." из массива $arItem
        ?>
        <p class="news-item" id="">
            ФИО клиента: <?= $arItem['PROPERTIES']['FULLNAME']['VALUE'] ?>
        </p>
        <p class="news-item" id="">
            Телефон: <?= $arItem['PROPERTIES']['PHONE']['VALUE'] ?>
        </p>
        <p class="news-item" id="">
            Адрес: Город <?= $arItem["PROPERTY_ADDRESS_PROPERTY_TOWN_VALUE"] ?>,
            ул. <?= $arItem["PROPERTY_ADDRESS_PROPERTY_STREET_VALUE"] ?>,
            д. <?= $arItem["PROPERTY_ADDRESS_PROPERTY_HOUSE_VALUE"] ?>,
            кв. <?= $arItem["PROPERTY_ADDRESS_PROPERTY_FLAT_VALUE"] ?>
        </p>
        <br>
    <?php } ?>
</div>