# Учебный проект по bitrix для Y_lab university

Выполнил: Зырянов Максим

## Задание #1

1. Развернута локальная среда разработки и установлена БУС ( выбрана редакция "Бизнес")
2. Создан собственный Тип инфоблока - "Контакты"
   | [Скриншот](https://github.com/MaksimKuwsz/screenshots/blob/main/homework-2/type-contacts.jpg)
3. Создан ИБ "Адреса", который содержит свойства: Город, Улица, Номер дома, Квартира.
   | [Скриншот](https://github.com/MaksimKuwsz/screenshots/blob/main/homework-2/ib-addresses.jpg)
4. Создан ИБ "Контакты", который содержит свойства: ФИО, Телефон, Адрес (данное свойство является связью с элементами
   первого ИБ из пункта 3).
   | [Скриншот](https://github.com/MaksimKuwsz/screenshots/blob/main/homework-2/ib-contacts.jpg)
5.
Добавлен [раздел для отображения данных из ИБ](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/lesson%202/index.php)
, на котором подключен компонент `bitrix:news.list`

6.
Разработан [шаблон компонента для bitrix:news.list с отображением информации из ИБ "Контакты"](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/news.list/welcome/template.php)
. Каждый блок должен содержит следующую информацию: ФИО, Телефон, Город, Улица, Номер дома, Квартира.

7. [Подготовлена миграция](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Version20220603053407.php)
   для созданного типа инфоблока `contacts` и двух инфоблоков `contacts` и `addresses`.

## Задание #2

- [Проверено](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/sale.basket.basket/custom_basket/mutator.php#L347)
  , что общая сумма заказа не меньше 2000р. Если сумма меньше указанной, то кнопка "Оформить заказ" не отображается и
  выдается соответствующее сообщение.
  [Учтена](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/sale.order.ajax/custom_order/template.php#L256)
  данная проверка при оформлении заказа (в случае ввода ссылки на оформление заказа в адресную строку)
    

- [Используя миграции](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/AddGift20220610110919.php) 
  добавлен новый товар "Подарок"
    

- [Разработан](https://github.com/MaksimKuwsz/bitrix-homework-proj/tree/main/local/components/ylab/gifts) компонент.
      Логика компонента следующая:

        1. [Получаются](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php#L59-L68)
           все товары в корзине текущего пользователя

        2. [Если](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php#L115-L129)
           в корзине есть минимум 3 товара с ценой более 500р,
           то добавляется(https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/01f1dfa23a7a6a893cc34bd463285622996dcedb/local/components/ylab/gifts/class.php#L142-L158)
           в корзину пользователя товар "Подарок".

        3. В шаблоне
           компонента [добавлена](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/components/ylab/gifts/templates/.default/template.php#L21-L31)
           форма. Форма содержит: тестовое поле "Количество подарков" и кнопку "Хочу столько"

        4. [При нажатии](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php#L92-L107) "
           Хочу столько" добавляется в корзину текущего пользователя товар "Подарок" в количестве указанном в поле "
           Количество подарков"