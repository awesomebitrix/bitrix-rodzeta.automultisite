﻿
# Модуль Авто-мультисайтинг

## Описание

Данный модуль динамически заменяет шаблон по умолчанию на шаблон для текущего хоста сайта. Модуль актуален для лендингов и простых сайтов на файловой структуре. Позволяет на одной лицензии CMS на одном сайте (в термине CMS Bitrix) реализовывать множество сайтов, так же остается возможность назначать шаблоны вручную в редактировании настроек сайта.

## Описание установки и настройки решения

- Указать один шаблон сайта и условие явно (чтобы применялся только для заданного условия), например:
    
    Шаблон = rodzeta.ru

    Тип условия - Выражение PHP = `$_SERVER["SERVER_NAME"] == "rodzeta.ru"`

- Остальные шаблоны будут применятся для своего домена автоматически

## Пример

    http://example.org/ -> будет выбран шаблон example.org

    http://villa-mia.ru/ -> будет выбран шаблон villa-mia.ru

    http://renessans-park.villa-mia.ru/ -> будет выбран шаблон renessans-park.villa-mia.ru
