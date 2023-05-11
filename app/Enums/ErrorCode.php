<?php

namespace App\Enums;

enum ErrorCode: string
{
    case DO_NOT_HONOR                            = 'Do not honor';
    case INVALID_TRANSACTION                     = 'Invalid Transaction';
    case INVALID_CARD                            = 'Invalid Card';
    case NOT_SUFFICIENT_FUNDS                    = 'Not sufficient funds';
    case INCORRECT_PIN                           = 'Incorrect PIN';
    case INVALID_COUNTRY_ASSOCIATION             = 'Invalid country association';
    case CURRENCY_NOT_ALLOWED                    = 'Currency not allowed';
    case THREE_D_SECURE_TRANSPORT_ERROR          = '3-D Secure Transport Error';
    case TRANSACTION_NOT_PERMITTED_TO_CARDHOLDER = 'Transaction not permitted to cardholder';
}
