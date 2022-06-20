<?php

namespace Ylab;

use CIBlockElement;

class  Helpers
{
    /**
     * Метод возвращает ID инфоблока по символьному коду
     *
     * @param $code
     *
     * @return int|void
     *
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     * @throws \Bitrix\Main\ArgumentException
     */

    public static function getIBlockIdByCode($code)
    {
        if (!\Bitrix\Main\Loader::includeModule('iblock')) {
            return;
        }
        $IB = \Bitrix\Iblock\IblockTable::getList([
            'select' => ['ID'],
            'filter' => ['CODE' => $code],
            'limit' => '1',
            'cache' => ['ttl' => 3600],
        ]);
        $return = $IB->fetch();
        if (!$return) {
            throw new \Exception('IBlock with code"' . $code . '" not found');
        }
        return $return['ID'];
    }


    /**
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getPropsOfItemByIbID($code)
    {
        $id = self::getIBlockIdByCode($code);

        $arFilter = array(
            'IBLOCK_ID' => $id,
        );

        $res = CIBlockElement::GetList(array(), $arFilter);
        while ($r = $res->fetch()) {
            $return[] = $r;
        }
        if (!$return) {
            throw new \Exception('Item of IB with code"' . $id . '" not found');
        }

        return $return;
    }
}
