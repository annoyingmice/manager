<?php

namespace App\Exceptions;

use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Response;

/**
 * Http throwable exceptions
 * @param string $message
 * @param int $code
 */
class HttpException extends HttpClientException {
    public function __construct(
        string $message,
        int $code,
    )
    {
        parent::__construct($message, $code);
    }
}