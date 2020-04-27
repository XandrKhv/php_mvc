<?php

class Utils
{

    /**
     * @param int $totalItems
     * @param int $perPage
     * @param int $page
     * @return string
     */
    public static function Pagination(int $totalItems, int $perPage, int $page = 1)
    {
        $pages = ceil($totalItems / $perPage);

        if ($page === 0) {
            $page = 1;
        } else if ($page > $pages) {
            $page = $pages;
        }

        $tmp = '';
        if ($pages) {
            $tmp = '<ul class="pagination">';
            $tmp .= '<li';
            $prevPage = $page - 1;
            if ($page == 1) {
                $tmp .= ' class="disabled"';
                $prevPage = $page;
            }
            $tmp .= '><a href="' . View::urlHref('page', $prevPage) . '">&laquo;</a></li>';
            for ($i = 1; $i <= $pages; $i++) {
                if ($i == $page) {
                    $tmp .= '<li class="active"><a href="' . View::urlHref('page', $i) . '">' . $i . ' <span class="sr-only">(current)</span></a></li>';
                } else {
                    $tmp .= '<li><a href="' . View::urlHref('page', $i) . '">' . $i . '</a></li>';
                }
            }
            $tmp .= '<li';
            $nextPage = $page + 1;
            if ($page == $pages) {
                $tmp .= ' class="disabled"';
                $nextPage = $page;
            }
            $tmp .= '><a href="' . View::urlHref('page', $nextPage) . '">&raquo;</a></li>';
            $tmp .= '</ul>';
        }

        return $tmp;
    }

    /**
     * @param string $dir
     * @param string $name
     * @param bool $error
     * @return bool
     */
    public static function requireFile(string $dir, string $name, bool $error = true)
    {
        $filePath = 'app/' . $dir . '/' . $name . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;

            return true;
        } elseif ($error){
            Route::ErrorPage404();
        }
        return false;
    }

    /**
     * @param $prefix
     * @return string
     */
    public static function ucPrefix($prefix)
    {
        return ucfirst(preg_replace('/[^a-zA-Z0-9]/', '', $prefix));
    }

    /**
     * @param $filter
     * @return string
     */
    public static function lowerFilter($filter)
    {
        return strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $filter));
    }
}
