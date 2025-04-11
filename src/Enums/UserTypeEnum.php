<?php

namespace Hzmwelec\Kingdee\Enums;

class UserTypeEnum
{
    const INTERNAL = '1';
    const EXTERNAL = '2';

    /**
     * @var array
     */
    private static $descriptions = [
        self::INTERNAL => '内部',
        self::EXTERNAL => '外部',
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
