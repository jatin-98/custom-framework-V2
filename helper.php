<?php
include_once __DIR__ . '/constants.php';

use Src\View;

if (!function_exists('dump')) {
    function dump($array, $false = 1)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>-------------------';
        return $false === 1 ? '' : exit;
    }
}

if (!function_exists('getMethod')) {
    function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}

if (!function_exists('guestView')) {
    function guestView($fileName)
    {
        echo View::guestView($fileName);
    }
}

if (!function_exists('masterView')) {
    function masterView($fileName)
    {
        echo View::masterView($fileName);
    }
}

if (!function_exists('asset')) {
    function asset($dir)
    {
        $protocol = ($_SERVER['HTTPS'] ?? 'off') === 'on' ? 'https' : 'http';
        return sprintf(
            '%s://%s/%s/%s',
            $protocol,
            APP_URL,
            'public',
            $dir
        );
    }
}

if (!function_exists('redirect')) {
    function redirect($uri)
    {
        print(sprintf('<script>window.location.href = "%s"</script>', asset("../$uri")));
    }
}

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}
