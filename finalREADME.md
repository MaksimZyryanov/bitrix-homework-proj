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
5. Добавлен [раздел для отображения данных из ИБ](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/lesson%202/index.php)
, на котором подключен компонент `bitrix:news.list`

6. Разработан [шаблон компонента для bitrix:news.list с отображением информации из ИБ "Контакты"](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/templates/.default/components/bitrix/news.list/welcome/template.php)
. Каждый блок должен содержит следующую информацию: ФИО, Телефон, Город, Улица, Номер дома, Квартира.

7. [Подготовлена миграция](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/Version20220603053407.php)
   для созданного типа инфоблока `contacts` и двух инфоблоков `contacts` и `addresses`.