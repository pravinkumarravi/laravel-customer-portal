<?php

namespace App\Enums;

enum Role: int
{
    case SUPERADMIN = -1;
    case EMPLOYEE   = 0;
    case ADMIN      = 1;
}
