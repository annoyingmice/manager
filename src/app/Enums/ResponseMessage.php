<?php

namespace App\Enums;

enum ResponseMessage
{
    const ERROR = 'error';
    const SUCCESS = 'success';
    const FOUND = 'found';
    const NOT_FOUND = 'not found';
    const DELETED = 'deleted';
    const UPDATED = 'updated';
}
