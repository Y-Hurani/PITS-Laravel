<?php

namespace App\Enum;

enum UserLevel: string
{
    case USER = 'USER';
    case ADMIN = 'ADMIN';

    public static function getAll(): array {
        return array_column(UserLevel::cases(), 'value');
    }
}


