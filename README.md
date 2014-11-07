Flats
===================================

Приложение построено на основе шаблона [yii2 advanced](http://www.yiiframework.com/doc-2.0/guide-tutorial-advanced-app.html)


GETTING STARTED
---------------

Шаги по установке приложения

1. Установить [Composer](http://getcomposer.org/) - PHP пакетный менеджер следит за актуальностью библиотек в папке vendor используя информацию из composer.json. Если Composer уже установлен, рекоммендуется его обновить: `composer self-update`.
2. Установить [Bower](http://bower.io/) - Фронтэнд (JS CSS и т.д.) пакетный менеджер следит за актуальностью библиотек в папке vendor/bower используя информацию из bower.json
3. Запустить комманду `php composer.phar install` (либо так: `composer install`).
4. Запустить комманду `bower install`.
5. Запустить комманду `init` для развертывания приложения в необходимом окружении (`dev` или `prod`).
6. Создать базу данных и настроить `components['db']` конфигурацию в `common/config/main-local.php` соответственно.
7. Применить миграции при помощи консольной комманды `yii migrate`. В БД будут созданы таблицы необходимые приложению.
8. Установить DOCUMENT ROOT для вэб приложения на сервере в значение `/path/to/application/frontend/web/`.


После установки будет возможность войти на сайт на странице - /site/login (admin/admin).


Структура каталогов
-------------------

```
common
	config/				содержит общие файлы конфигурации
	mail/				содержит шаблоны для отправки e-mails
	models/				содержит классы моделей общие для всего проекта
	tests/				содержит тесты для объектов , которые являются общими для всего проекта
console
	config/				содержит файлы конфигурации для консольного приложения
	controllers/		содержит консольные контроллеры (commands)
	migrations/			содержит миграции БД
	models/				содержит классы моделей специфичные для крнсоли
	runtime/			содержит файлы генерируемые в процессе работы консольного приложения
	tests/				содержит тесты для консольного прилодения
frontend
	assets/				содержит используемы приложением JavaScript и CSS бандлы
	config/				содержит файлы конфигурации
	controllers/		содержит классы контроллеров приложения
	models/				содержит классы моделей приложения
	runtime/			содержит файлы генерируемые в процессе работы приложения
	tests/				содержит тесты для приложения
	views/				содержит файла вида и шаблоны
	web/				webroot
vendor/					содержит сторонние пакеты необходимые для работы проекта
environments/			содержит шаблоны вариантов среды развертывания (используестя при запуске init)
```


Требования
------------

Минимальное требование по этому шаблону приложения, поддержка PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `advanced` that is directly under the Web root.

Then follow the instructions given in "GETTING STARTED".


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:1.0.0-beta2"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-advanced advanced
~~~