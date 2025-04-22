<?php

namespace App\Enums;

class ProductType
{
    public const COFFEE = 1;
    public const PIZZA = 2;
    public const PROMOTION = 3;

    public static function all(): array
    {
        return [self::COFFEE, self::PIZZA, self::PROMOTION];
    }

    public static function isValid(int $value): bool
    {
        return in_array($value, self::all(), true);
    }
}
