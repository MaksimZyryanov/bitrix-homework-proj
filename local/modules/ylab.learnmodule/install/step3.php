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
    <input type="hidden" name="step" value="3">

    <p><label for="groups"><?= Loc::getMessage('YLAB_LEARN_GROUPS') ?>: </label>
        <select size="5" multiple="" name="groups[]">
            <option value="all"><?= Loc::getMessage('YLAB_LEARN_ALL') ?>:</option>
            <option value="moder" selected=""><?= Loc::getMessage('YLAB_LEARN_MODER') ?>:</option>
            <option value="admin" selected=""><?= Loc::getMessage('YLAB_LEARN_ADMIN') ?>:</option>
        </select>
    </p>

    <p>
        <label for="statictext"><?= Loc::getMessage('YLAB_LEARN_STATIC') ?>: </label>
        <textarea name="statictext" id="statictext"></textarea>
    </p>
    <p>
        <label for="statichtml"><?= Loc::getMessage('YLAB_LEARN_STATIC_HTML') ?>: </label>
        <textarea name="statichtml" id="statichtml"></textarea>
    </p>

    <input type="submit" name="" value="<?= Loc::getMessage('YLAB_LEARN_SUBMIT') ?>: ">
</form>
