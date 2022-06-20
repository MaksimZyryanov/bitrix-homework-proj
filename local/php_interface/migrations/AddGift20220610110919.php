<?php

namespace Sprint\Migration;

use Bitrix\Catalog\Controller\Product;
use Bitrix\Catalog\ProductTable;
use Bitrix\Main\Loader;

class AddGift20220610110919 extends Version
{
    protected $description = "Adding Item 'Gift'";

    protected $moduleVersion = "4.0.6";

    /**
     * @throws \Bitrix\Main\LoaderException
     * @throws Exceptions\ExchangeException
     */
    public function up()
    {
        Loader::includeModule("catalog");

        $helper = $this->getHelperManager();

        $iblockID = $helper->Iblock()->getIblockId('clothes');

        $sectionID = $helper->Iblock()->getSection($iblockID, 'accessories')['ID'];

        $product = new Product();

        $productFields = [
            'IBLOCK_ID' => $iblockID,
            'IBLOCK_SECTION_ID' => $sectionID,
            'CODE' => 'GIFTS',
            'NAME' => 'Подарок',
            'QUANTITY_TRACE' => 'N',
            'AVAILABLE' => 'Y',
            'TYPE' => ProductTable::TYPE_PRODUCT
        ];

        $productID = $product->addAction($productFields);

        $this->saveData('ProductGifts', $productID);
    }

    /**
     * @throws \Bitrix\Main\LoaderException
     * @throws Exceptions\ExchangeException
     */
    public function down()
    {
        Loader::includeModule("catalog");

        $product = new Product();

        $productID = $this->getSavedData('ProductGifts');

        $product->deleteAction($productID);

    }
}
