<?php

class View
{
    // общий вид по умолчанию.
    public $templateView = 'template_view';

    /**
     * @param string $contentView - виды отображающие контент страниц
     * @param array $data - массив, содержащий элементы контента страницы
     */
    public function render(string $contentView, array $data = [])
    {
        // формируем контент
        ob_start();
        require_once 'app/views/' . $contentView . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        // подключаем основной вид
        require_once 'app/views/' . $this->templateView . '.php';
    }

    /**
     * @param mixed $param
     * @param string $value
     * @return string
     */
    public static function urlHref($param, string $value = '')
    {
        $getParams = Route::getParams();

        if (is_array($param)) {
            foreach ($param as $paramName => $value) {
                $getParams[$paramName] = $value;
            }
        } else {
            $getParams[$param] = $value;
        }

        $url = '/index.php';
        $url .= isset($getParams['c']) ? '?c=' . $getParams['c'] : '?c=main';
        $url .= isset($getParams['a']) ? '&a=' . $getParams['a'] : '&a=index';
        foreach ($getParams as $nameParam => $valueParam) {
            if ($nameParam == 'c' || $nameParam == 'a') {
                continue;
            }
            $url .= '&' . $nameParam . '=' . $valueParam;
        }

        return $url;
    }
}
