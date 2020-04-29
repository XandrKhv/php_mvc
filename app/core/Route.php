<?php

class Route
{
    public static function start()
    {
        $getParams = self::getParams();

        // контроллер и действие по умолчанию
        $controllerName = isset($getParams['c']) ? Utils::ucPrefix($getParams['c']) : 'Main';
        $actionName = isset($getParams['a']) ? Utils::ucPrefix($getParams['a']) : 'Index';
        $sort = isset($getParams['sort']) ? Utils::lowerFilter($getParams['sort']) : '';
        $page = isset($getParams['page']) ? Utils::lowerFilter($getParams['page']) : '';
        $view = isset($getParams['view']) ? Utils::lowerFilter($getParams['view']) : '';
        $to = isset($getParams['to']) ? Utils::lowerFilter($getParams['to']) : '';

        // наличие модели
        $requireModel = false;

        // добавляем префиксы
        $modelName = 'Model' . ucfirst($controllerName);
        $controllerName = 'Controller' . $controllerName;
        $actionName = 'action' . $actionName;

        // подцепляем файл с классом модели
        if (Utils::requireFile('models', $modelName, false)) {
            $requireModel = true;
        }
        // подцепляем файл с классом контроллера
        Utils::requireFile('controllers', $controllerName);

        // создаем контроллер и модель
        $controller = new $controllerName;

        if ($requireModel) {
            $controller->model = new $modelName;
            if (!empty($sort)) {
                $controller->model->sort = $sort;
            }
            if (!empty($to)) {
                $controller->model->to = $to;
            }
            if (!empty($page)) {
                $controller->model->page = $page;
            }
            if (!empty($view)) {
                $controller->model->view = $view;
            }
        }

        if (method_exists($controller, $actionName)) {
            // вызываем действие контроллера
            $controller->$actionName();
        } else {
            // здесь также разумнее было бы кинуть исключение
            self::ErrorPage404();
        }

    }

    public static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:' . $host . '404');
    }

    public static function getParams()
    {
        return preg_replace('/[^a-zA-Zа-яА-Я0-9]/ui', '', $_GET);
    }

    /**
     * @return array
     */
    public static function postParams()
    {
        $resultArray = [];

        foreach ($_POST as $name => $value) {
            $resultArray[$name] = htmlspecialchars($value);
        }
        return $resultArray;
    }

    /**
     * @return string
     */
    public static function sortTo()
    {
        $getParams = self::getParams();

        return isset($getParams['to']) ? ($getParams['to'] == 'up' ? 'down' : 'up') : 'down';
    }
}
