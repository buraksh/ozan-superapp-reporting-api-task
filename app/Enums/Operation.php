<?php

namespace App\Enums;

enum Operation: string
{
    case DIRECT  = 'DIRECT';
    case REFUND  = 'REFUND';
    case _3D     = '3D';
    case _3DAUTH = '3DAUTH';
}
