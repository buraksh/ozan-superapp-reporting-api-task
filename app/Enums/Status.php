<?php

namespace App\Enums;

enum Status: string
{
    case WAITING  = 'WAITING';
    case DECLINED = 'DECLINED';
    case ERROR    = 'ERROR';
    case APPROVED = 'APPROVED';
}
