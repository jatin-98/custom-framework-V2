<?php

namespace Src;

use Exception;

class NotFoundException extends Exception
{
    protected $message = 'Page Not Found';
    protected $code = 404;
}