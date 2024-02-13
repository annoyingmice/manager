<?php

namespace App\Enums;

enum ResponseStatus
{
    const OK = 'OK';
    const NOT_FOUND = 'NOT_FOUND';
    const UNAUTHORIZED = 'UNAUTHORIZED';
    const FORBIDDEN = 'FORBIDDEN';
    const SERVER_ERROR = 'SERVER_ERROR';
}
