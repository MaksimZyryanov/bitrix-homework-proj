# Учебный проект по 1C-Bitrix для Y_LAB University

Домашнее задание по решению Битрикс 'Бизнес' (магазин)

_Выполняет: Зырянов Максим_

## Все чеклисты для предыдущих заданий и полный ход работы - [ссылка](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/changeLog.md)

## Чеклист работы над ошибками для ДЗ №3

1. [Добавлены все возможные типы полей](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/modules/ylab.learnmodule/options.php#L41-L66), в соответствии с [данным источником](https://www.bitrix.ua/download/files/ppt/web170614mp/Interactive_map_2.pdf)

2. Оставлен один ` dbconn.php` в
   папке [bitrix/php_interface/dbconn.php](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/bitrix/php_interface/dbconn.php#L22)

3. [Реализована установка модуля в 3 шага](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/modules/ylab.learnmodule/install/index.php#L55-L84):
   при установке последовательно выводятся 3 страницы с разными настройками модуля:

## Чеклист 3. домашнего задания №3 к лекции №3

- **_Редактирование решений предыдущего ДЗ в соответствии с эталонным решением из лекции №3:_**

    1. [Переработан](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/php_interface/migrations/AddGift20220610110919.php)
       файл миграции для добавления товара "Подарок"
    2. [Переработан](https://github.com/MaksimKuwsz/bitrix-homework-proj/blob/main/local/components/ylab/gifts/class.php)
       класс компонента, подправлена логика добавления "Подарка" в корзину

- **_Выполнение текущего ДЗ:_**
    1. [Создан модуль](https://github.com/MaksimZyryanov/bitrix-homework-proj/tree/main/local/modules/ylab.learnmodule)
    2. [Созданы настройки](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/modules/ylab.learnmodule/options.php#L39-L54)
       модуля, использовано n типов полей:
        1. Поле строки
        2. Кнопка
        3. Поле текста
        4. Выпадающий список (selectbox)
    3. [Разработана установка модуля](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/modules/ylab.learnmodule/install/index.php#L46-L48)
       в 3 шага. На каждом шаге заполнены настройки модуля из пункта ii.
- **_Доп. задание:_**
    - [Разработан функционал](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/php_interface/init.php#L5-L12):
      при добавлении нового элемента ИБ (любого, в нашем варианте это "Каталог") необходимо сохранять "имя" нового
      элемента в файл лога (для проверки был добавлен новый товар -
      футболка: [/local/log/log.txt](https://github.com/MaksimZyryanov/bitrix-homework-proj/blob/main/local/log/log.txt))
