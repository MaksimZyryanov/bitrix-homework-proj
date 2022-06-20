<?php use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<?php var_dump($arResult['INCORRECT_QUANTITY_VALUE']); ?>
<div>
    <b><?= Loc::getMessage('SBB_YOUR_ITEMS_IN_CART'); ?> </b>
    <br><br>
    <?php foreach ($arResult['BASKET_ITEMS'] as $basketItem) { ?>
        <div>
            <p><?= $basketItem->getField('NAME') . ' (' . $basketItem->getPrice() . ' ₽): '
                . $basketItem->getQuantity() . ' ' . Loc::getMessage('SBB_ONE_ITEM') . ' - '
                . $basketItem->getPrice() * $basketItem->getQuantity() . ' ₽' ?></p>
        </div>
        <hr>
    <?php } ?>

</div>
<form action="" method="POST">
    <p><?= Loc::getMessage('SBB_QUANTITY_OF_GIFTS') ?><br>
        <input type="string" name="GIFTS_BY_USER_QUANTITY"/>
        <?php
        if ($arResult['INCORRECT_QUANTITY_VALUE']) {
            echo Loc::getMessage('SBB_INCORRECT_QUANTITY_VALUE');
        }
        ?>
    </p>
    <input type="submit" value="<?= Loc::getMessage('SBB_WANT_THIS_QUANTITY') ?>">
</form>


