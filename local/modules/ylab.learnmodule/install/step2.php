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
    <input type="hidden" name="step" value="2">
    <p><label for="readonly_write_mode"><?= Loc::getMessage('YLAB_LEARN_READONLY_WRITE_MODE') ?>: </label>
        <select name="readonly_write_mode">
            <option value="readonly"><?= Loc::getMessage('YLAB_LEARN_READONLY') ?>: </option>
            <option value="write" selected=""><?= Loc::getMessage('YLAB_LEARN_WRITE') ?>: </option>
        </select>
    </p>

    <p><label for="password"><?= Loc::getMessage('YLAB_LEARN_PASSWORD') ?>: </label>
        <input type="password" size="20" maxlength="255" name="password" autocomplete="new-password"
               aria-autocomplete="list"/>
    </p>
    <p><label for="readonly_note"><?= Loc::getMessage('YLAB_LEARN_READONLY_NOTE') ?>: </label>
        <input type="text" size="" maxlength="255" value="" name="readonly_note"/>
    </p>

    <input type="submit" name="" value="<?= Loc::getMessage('YLAB_LEARN_NEXT_STEP') ?>: ">
</form>
