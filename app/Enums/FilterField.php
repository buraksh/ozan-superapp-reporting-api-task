<?php

namespace App\Enums;

enum FilterField: string
{
    case TRANSACTION_UUID = 'Transaction UUID';
    case CUSTOMER_EMAIL   = 'Customer Email';
    case REFERENCE_NO     = 'Reference No';
    case CUSTOM_DATA      = 'Custom Data';
    case CARD_PAN         = 'Card PAN';
}
