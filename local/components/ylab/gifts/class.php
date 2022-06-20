<?php

namespace Ylab\components;

use Bitrix\ABTest\Helper;
use Bitrix\Currency\CurrencyManager;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Sale\BasketBase;
use Bitrix\Sale\BasketItem;
use Bitrix\Sale\Fuser;
use Bitrix\Sale\Services\Company\Restrictions\Currency;
use CBitrixComponent;
use Bitrix\Sale\Basket;
use CIBlockElement;
use CModule;
use Protobuf\Exception;
use Ylab\Helpers;

/**
 * Class PromoComponent
 * @package Ylab\Components
 * Компонент отображения списка элементов нашего ИБ
 */
class PromoComponent extends CBitrixComponent
{
    // Определим поля класса согласно условию задания
    /** @var int $totalQuantity минимальное количество товаров на сумму не менее 500р. для получения подарка */
    private static int $totalQuantity = 3;

    /** @var float $minCost минимальная цена 3 шт. товара в чеке для получения подарка */
    private static float $minCost = 500;

    /** @var int $giftID ID Товара "Подарок" */
    private static int $giftID = 327;

    /**
     * @var int $giftQuantity - количество подарков пользователя, изначально - 0,
     * чтобы лишние подарки не суммировались после повторного посещения страницы
     */
    private int $giftQuantity = 0;

    /**
     * Метод executeComponent
     * @return mixed|void
     * @throws Exception
     * @throws \Exception
     */

    public function executeComponent()
    {
        // Подключаем модуль "catalog"
        Loader::includeModule("catalog");
        // Получаем корзину текущего пользователя
        $basket = Basket::loadItemsForFUser(Fuser::getId(), Context::getCurrent()->getSite());


        // Получаем массив товаров из корзины
        $basketItems = $basket->getBasketItems();
        /**
         * Передаем в метод для определения доступен ли пользователю подарок
         * где ключ это количество данного типа товара
         * а значение - цена товара ()
         */
        $itemsPrice = array();
        foreach ($basketItems as $basketItem) {
            $itemsPrice[$basketItem->getQuantity()] = $basketItem->getPrice();
        }

        $this->checkCountOfGifts($itemsPrice);

        $request = Context::getCurrent()->getRequest();
        if ($request->isPost()) self::executePost($request->getPost('GIFTS_BY_USER_QUANTITY'));

        /**
         * Передаем в массив $arResult элементы корзины и вызываем шаблон для отображения страницы
         */
        self::addGifts($basket);
        $this->arResult['BASKET_ITEMS'] = $basket->getBasketItems();
        $basket->save();
        $this->includeComponentTemplate();
    }

    /**
     * метод executePost()
     *
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    private function executePost($postQuantity): void
    {
        /**
         * Если пользователь ввел неположительное или нецелочисленное значение в форму,
         * то в $arResult передается флажок для отображения сообщения пользователю и
         * и заканчивается выполнение текущего метода ключевым словом return
         **/
        if (!((filter_var($postQuantity, FILTER_VALIDATE_INT)) && ($postQuantity > 0))) {
            $this->arResult['INCORRECT_QUANTITY_VALUE'] = true;
            return;
        }
        /**
         * Устанавливаем количество подарков в свойство с учетом имеющихся
         */
        $this->giftQuantity += $postQuantity;
    }

    /**
     * Определим метод который возвращает bool значение - доступен ли пользователю подарок
     * @param int[] $items
     *
     * @return int
     */
    private function checkCountOfGifts($itemsPrice)
    {
        $counter = 0;
        $dividedItems = array();
        foreach ($itemsPrice as $quantity => $itemPrice) {
            for ($i = 0; $i < $quantity; $i++) {
                $dividedItems[] = $itemPrice;
            }
        }
        /** @var float $item */
        foreach ($dividedItems as $itemPrice) if ($itemPrice > self::$minCost) $counter++;
        // Возвращается
        $flt = fdiv($counter, self::$totalQuantity);
        $this->giftQuantity++;
    }

    /**
     * @param $basket
     * @param int $quantity
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     *
     * Определим метод для добавления подарков в корзину, в котором параметр $quantity имеет
     * значение по умолчанию 1
     */
    private function addGifts(BasketBase $basket): void
    {

        if ($gift = $basket->getExistsItem(('catalog'), self::$giftID))
            $gift->setField('QUANTITY', $this->giftQuantity);
        else {

            $gift = $basket->createItem('catalog', self::$giftID);

            $gift->setFields([
                'QUANTITY' => $this->giftQuantity,
                'CURRENCY' => CurrencyManager::getBaseCurrency(),
                'LID' => Context::getCurrent()->getSite(),
                'PRICE' => 0,
            ]);
        }
    }
}