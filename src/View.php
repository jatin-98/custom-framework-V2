<?php

namespace Src;

class View
{

    public static function guestLayout()
    {
        ob_start();
        include_once dirname(__DIR__) . "/views/layouts/guest.php";
        return ob_get_clean();
    }

    public static function view($fileName)
    {
        ob_start();
        include_once dirname(__DIR__) . "/views/$fileName.php";
        return ob_get_clean();
    }

    public static function guestView($fileName)
    {
        $layout = self::guestlayout();
        $view = self::view($fileName);
        return str_replace('{{CONTENT}}', $view, $layout);
    }

    public static function masterLayout()
    {
        ob_start();
        include_once dirname(__DIR__) . "/views/layouts/master.php";
        return ob_get_clean();
    }

    public static function masterView($fileName)
    {
        $layout = self::masterLayout();
        $view = self::view($fileName);
        return str_replace('{{CONTENT}}', $view, $layout);
    }
}
