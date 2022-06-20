<?php /** @noinspection PhpVoidFunctionResultUsedInspection */

use \Bitrix\Main\Localization\Loc;

if (!check_bitrix_sessid())
    return;

?>
<form action="<?php echo $APPLICATION->GetCurPage() ?>">
    <?= bitrix_sessid_post() ?>
    <input type="hidden" name="id" value="ylab.learnmodule">
    <input type="hidden" name="lang" value="<?php echo LANGUAGE_ID ?>">
    <input type="hidden" name="install" value="Y">
    <input type="hidden" name="step" value="1">
    <p><label for="limit_to_raws"><?= Loc::getMessage('YLAB_LEARN_LIMIT_TO_RAWS') ?>: </label>
        <input type="text" size="" maxlength="255" value="" name="limit_to_raws"/>
    </p>
    <p><label for="is_avilable"><?= Loc::getMessage('YLAB_LEARN_IS_AVILABLE') ?>: </label>
        <input type="checkbox" name="is_avilable" id="is_avilable" value="Y" checked>
    </p>
    <p>
        <label for="notes"><?= Loc::getMessage('YLAB_LEARN_NOTES') ?>: </label>
        <textarea name="notes" id="notes"></textarea>
    </p>
    <input type="submit" name="" value="<?= Loc::getMessage('YLAB_LEARN_NEXT_STEP') ?>">
</form>
