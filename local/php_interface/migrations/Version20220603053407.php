<?php

namespace Sprint\Migration;


use Protobuf\Exception;

class Version20220603053407 extends Version
{
    protected $description = "IBlock type & 2 IB for client contacts (contacts + addresses)";

    protected $moduleVersion = "4.0.6";

    // По правилам этикета необходимо в класс миграции иметь два метода up() и down()

    /**
     * @return bool|void
     * @throws  Exceptions\HelperException
     */
    public function up()
    {
        //вызов хэлепера
        $helper = $this->getHelperManager();
        //сохранение ТИПА ИНФОБЛОКА
        $helper->Iblock()->saveIblockType([
            'ID' => 'contacts',
            'SECTIONS' => 'Y',
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'IN_RSS' => 'N',
            'SORT' => '500',
            'LANG' =>
                [
                    'ru' =>
                        [
                            'NAME' => 'Контакты',
                            'SECTION_NAME' => '',
                            'ELEMENT_NAME' => '',
                        ],
                    'en' =>
                        [
                            'NAME' => 'Contacts',
                            'SECTION_NAME' => '',
                            'ELEMENT_NAME' => '',
                        ],
                ],
        ]);

        $iblockID = $helper->Iblock()->saveIblock([
            'IBLOCK_TYPE_ID' => 'contacts',
            'LID' =>
                [
                    0 => 's1',
                ],
            'CODE' => 'addresses',
            'API_CODE' => 'addresses',
            'REST_ON' => 'N',
            'NAME' => 'Адреса',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'LIST_PAGE_URL' => '#SITE_DIR#/contacts/index.php?ID=#IBLOCK_ID#',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/contacts/detail.php?ID=#ELEMENT_ID#',
            'SECTION_PAGE_URL' => '#SITE_DIR#/contacts/list.php?SECTION_ID=#SECTION_ID#',
            'CANONICAL_PAGE_URL' => '',
            'PICTURE' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'RSS_TTL' => '24',
            'RSS_ACTIVE' => 'Y',
            'RSS_FILE_ACTIVE' => 'N',
            'RSS_FILE_LIMIT' => NULL,
            'RSS_FILE_DAYS' => NULL,
            'RSS_YANDEX_ACTIVE' => 'N',
            'XML_ID' => NULL,
            'INDEX_ELEMENT' => 'Y',
            'INDEX_SECTION' => 'Y',
            'WORKFLOW' => 'N',
            'BIZPROC' => 'N',
            'SECTION_CHOOSER' => 'L',
            'LIST_MODE' => '',
            'RIGHTS_MODE' => 'S',
            'SECTION_PROPERTY' => 'N',
            'PROPERTY_INDEX' => 'N',
            'VERSION' => '2',
            'LAST_CONV_ELEMENT' => '0',
            'SOCNET_GROUP_ID' => NULL,
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'SECTIONS_NAME' => 'Разделы',
            'SECTION_NAME' => 'Раздел',
            'ELEMENTS_NAME' => 'Элементы',
            'ELEMENT_NAME' => 'Элемент',
            'EXTERNAL_ID' => NULL,
            'LANG_DIR' => '/',
            'SERVER_NAME' => '1c-bitrix-homework',
            'IPROPERTY_TEMPLATES' =>
                array(),
            'ELEMENT_ADD' => 'Добавить элемент',
            'ELEMENT_EDIT' => 'Изменить элемент',
            'ELEMENT_DELETE' => 'Удалить элемент',
            'SECTION_ADD' => 'Добавить раздел',
            'SECTION_EDIT' => 'Изменить раздел',
            'SECTION_DELETE' => 'Удалить раздел',
        ]);

        $helper->Iblock()->saveProperty($iblockID, array(
            'NAME' => 'Город',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'TOWN',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '2',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockID, array(
            'NAME' => 'Улица',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'STREET',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '2',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockID, array(
            'NAME' => 'Номер дома',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'HOUSE',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '2',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockID, array(
            'NAME' => 'Квартира',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'FLAT',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '2',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ));

        $iblockId = $helper->Iblock()->saveIblock(array(
            'IBLOCK_TYPE_ID' => 'contacts',
            'LID' =>
                array(
                    0 => 's1',
                ),
            'CODE' => 'contacts',
            'API_CODE' => 'contacts',
            'REST_ON' => 'N',
            'NAME' => 'Контакты',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'LIST_PAGE_URL' => '#SITE_DIR#/contacts/index.php?ID=#IBLOCK_ID#',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/contacts/detail.php?ID=#ELEMENT_ID#',
            'SECTION_PAGE_URL' => '#SITE_DIR#/contacts/list.php?SECTION_ID=#SECTION_ID#',
            'CANONICAL_PAGE_URL' => '',
            'PICTURE' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'RSS_TTL' => '24',
            'RSS_ACTIVE' => 'Y',
            'RSS_FILE_ACTIVE' => 'N',
            'RSS_FILE_LIMIT' => NULL,
            'RSS_FILE_DAYS' => NULL,
            'RSS_YANDEX_ACTIVE' => 'N',
            'XML_ID' => NULL,
            'INDEX_ELEMENT' => 'Y',
            'INDEX_SECTION' => 'Y',
            'WORKFLOW' => 'N',
            'BIZPROC' => 'N',
            'SECTION_CHOOSER' => 'L',
            'LIST_MODE' => '',
            'RIGHTS_MODE' => 'S',
            'SECTION_PROPERTY' => 'N',
            'PROPERTY_INDEX' => 'N',
            'VERSION' => '1',
            'LAST_CONV_ELEMENT' => '0',
            'SOCNET_GROUP_ID' => NULL,
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'SECTIONS_NAME' => 'Разделы',
            'SECTION_NAME' => 'Раздел',
            'ELEMENTS_NAME' => 'Элементы',
            'ELEMENT_NAME' => 'Элемент',
            'EXTERNAL_ID' => NULL,
            'LANG_DIR' => '/',
            'SERVER_NAME' => '1c-bitrix-homework',
            'IPROPERTY_TEMPLATES' =>
                array(),
            'ELEMENT_ADD' => 'Добавить элемент',
            'ELEMENT_EDIT' => 'Изменить элемент',
            'ELEMENT_DELETE' => 'Удалить элемент',
            'SECTION_ADD' => 'Добавить раздел',
            'SECTION_EDIT' => 'Изменить раздел',
            'SECTION_DELETE' => 'Удалить раздел',
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'ФИО',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'FULLNAME',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Телефон',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'PHONE',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Адрес',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'ADDRESS',
            'DEFAULT_VALUE' => '',

            'PROPERTY_TYPE' => 'E', //тип свойства привязка к инфоблоку (связь двух инфоблоков)

            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',

            'LINK_IBLOCK_ID' => 'contacts:addresses', //обозначение привязки к ТИП_ИНФОБЛОКА:ИНФОБЛОК

            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'EList',
            'USER_TYPE_SETTINGS' =>
                [
                    'size' => 1,
                    'width' => 0,
                    'group' => 'N',
                    'multiple' => 'N',
                ],
            'HINT' => '',
            'FEATURES' =>
                [
                    0 =>
                        [
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ],
                    1 =>
                        [
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ],
                ],
        ));
    }

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */

    /* рекомендуется иметь в миграции метод down() в котором последовательность
       отката миграций в обратном порядке от добавления
       для возврата системы к изначальному состоянию
    */
    public function down()
    {
        $helper = $this->getHelperManager();

        $helper->Iblock()->deleteIblockIfExists('contacts');
        $helper->Iblock()->deleteIblockIfExists('addresses');
        $helper->Iblock()->deleteIblockTypeIfExists('contacts');
    }
}
