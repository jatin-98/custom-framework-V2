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

    public static function view($fileName, $data = [])
    {
        extract($data);
        ob_start();
        include_once dirname(__DIR__) . "/views/$fileName.php";
        return ob_get_clean();
    }

    public static function guestView($fileName, $data = [])
    {
        $layout = self::guestlayout();
        $view = self::view($fileName, $data);
        return str_replace('{{CONTENT}}', $view, $layout);
    }

    public static function masterLayout()
    {
        ob_start();
        include_once dirname(__DIR__) . "/views/layouts/master.php";
        return ob_get_clean();
    }

    public static function masterView($fileName, $data = [])
    {
        $layout = self::masterLayout();
        $view = self::view($fileName, $data);
        return str_replace('{{CONTENT}}', $view, $layout);
    }
}
