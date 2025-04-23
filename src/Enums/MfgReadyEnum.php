<?php

namespace Hzmwelec\Kingdee\Enums;

class MfgReadyEnum
{
    const NO = 'A';
    const YES = 'B';

    /**
     * @var array
     */
    private static $descriptions = [
        self::YES => '符合',
        self::NO => '不符',
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
