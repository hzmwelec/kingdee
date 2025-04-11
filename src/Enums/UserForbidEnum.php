<?php

namespace Hzmwelec\Kingdee\Enums;

class UserForbidEnum
{
    const NO = 'A';
    const YES = 'B';

    /**
     * @var array
     */
    private static $descriptions = [
        self::NO => '否',
        self::YES => '是',
    ];

    /**
     * @param string $value
     * @return string
     */
    public static function getDescription($value)
    {
        return self::$descriptions[$value] ?? '未知';
    }
}
