<?php

namespace app\core\exception;

class BadRequestException extends \Exception
{
    protected $code = 400;
    protected $message = "Bad Request";
}
