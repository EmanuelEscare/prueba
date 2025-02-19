<?php

namespace App\Enums;

enum StudentGender: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public static function labels(): array
    {
        return [
            self::MALE => __(self::MALE),
            self::FEMALE => __(self::FEMALE)
        ];
    }
}
