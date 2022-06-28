## Чеклист 1. домашнего задания №2 к лекции №1

1. Развернута локальная среда разработки и установлена БУС ( выбрана редакция "Бизнес")
2. Создан собственный Тип инфоблока - "Контакты" | [Скриншот](https://github.com/MaksimKuwsz/screenshots/blob/main/homework-2/type-contacts.jpg)
3. Создан ИБ "Адреса", который содержит свойства: Город, Улица, Номер дома, Квартира. | [Скриншот](https://github.com/MaksimKuwsz/screenshots/blob/main/homework-2/ib-addresses.jpg)
4. Создан ИБ "Контакты", который содержит свойства: ФИО, Телефон, Адрес (данное свойство является связью с элементами первого ИБ из пункта 3). | [Скриншот](https://github.com/MaksimKuwsz/screenshots/blob/main/homework-2/ib-contacts.jpg)
5. Добавлен [раздел для отображения данных из ИБ](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/lesson%202/index.php), на котором подключен компонент `bitrix:news.list`
6. Разработан [шаблон компонента для bitrix:news.list с отображением информации из ИБ "Контакты"](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/news.list/welcome/template.php). Каждый блок должен содержит следующую информацию: ФИО, Телефон, Город, Улица, Номер дома, Квартира.
   - первый способ (в ветке main) - получение в шаблоне свойств из инфоблока "Адреса".
   - второй способ (в ветке [use_result_modifier](https://github.com/MaksimKuwsz/bitrix-homework-proj/tree/use_result_modifier/local/templates/.default/components/bitrix/news.list/welcome)) - с помощью файла `result_modifier.php` путем добавления в массив `$arResult` свойств из инфоблока "Адреса".
7. Подготовлены миграции (в административной среде) для созданного типа инфоблока (contacts) и двух инфоблоков ([contacts](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Migration_contacts20220528195712.php) и [addresses](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Migration_addresses20220528195802.php)).
   - Также в консоли OpenServer командой `php bin/migrate add` были подготовлены миграции для инфоблоков [contacts](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Version20220528224920.php) и [addresses](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Version20220528225110.php) (переменные и вызванные функции перенесены из
     файлов миграций, полученных через админку)

---

## Перед выполнением ДЗ-2

1. Были изменены раздел и шаблон для отображения данных из ИБ "Контакты":
   - [изменены](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/lesson%202/index.php) в разделe для отображения данных из ИБ "Контакты" параметры метода `$APPLICATION->IncludeComponent()`
   - [изменен](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/news.list/welcome/template.php) шаблон компонента для `bitrix:news.list` с отображением информации из ИБ "Контакты"
2. [Создан](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Version20220603053407.php) единый файл миграции для типа инфоблока "Контакты" и двух ИБ ("Контакты" и "Адреса") и определен метод `down()`
3. [Добавлен](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/composer.json) файл `local/composer.json`, в котором через `psr-4` подключено пространство имен `Ylab`, установлен `Composer` и [добавлен](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/app/Helpers.php) класс `local/app/Helpers.php` пространства имен `Ylab`
4. [Изменен](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/lesson%202/index.php) раздел для отображения данных из ИБ "Контакты", теперь ID инфоблока получается с использованием класса `Helpers` (из 3 п.)

---

## Чеклист 2. домашнего задания №3 к лекции №2

- **Выполнение текущего ДЗ**

  - [Проверено](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/sale.basket.basket/custom_basket/mutator.php#L347), что общая сумма заказа не меньше 2000р. Если сумма меньше указанной, то кнопка "Оформить заказ" не отображается и выдается соответствующее сообщение.
    [Учтена](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/sale.order.ajax/custom_order/template.php#L256) данная проверка при оформлении заказа (в случае ввода ссылки на оформление заказа в адресную строку)

    - Для вывода сообщений реализована поддержка мультиязыковости

      - для [корзины](https://github.com/MaksimKuwsz/bitrix-homework-proj/tree/main/local/templates/.default/components/bitrix/sale.basket.basket/custom_basket/lang)
      - для [заказа](https://github.com/MaksimKuwsz/bitrix-homework-proj/tree/main/local/templates/.default/components/bitrix/sale.order.ajax/custom_order/lang)

  - [Используя миграции](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Version20220603053408.php) добавлен новый товар "Подарок"

  - [Разработан](https://github.com/MaksimKuwsz/bitrix-homework-proj/tree/main/local/components/ylab/gifts) компонент. Логика компонента следующая:

    1. [Получаются](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php#L42) все товары в корзине текущего пользователя

    2. [Если](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php#L125) в корзине есть минимум 3 товара с ценой более 500р, то [добавляется](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php#L152) в корзину пользователя товар "Подарок".

    3. В шаблоне компонента [добавлена](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/components/ylab/gifts/templates/.default/template.php#L21) форма. Форма содержит: тестовое поле "Количество подарков" и кнопку "Хочу столько"

    4. [При нажатии](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php#L99) "Хочу столько" добавляется в корзину текущего пользователя товар "Подарок" в количестве указанном в поле "Количество подарков"
      - _Пояснение к последнему пункту. Было принято решение разделить обработку GET и POST запросов по разным методам_
