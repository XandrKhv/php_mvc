<?php

// подключаем файлы ядра
require_once 'core/DB.php';
require_once 'core/Utils.php';
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
// запускаем маршрутизатор
Route::start();
