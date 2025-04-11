<?php

namespace Hzmwelec\Kingdee\Enums;

class StockDirectEnum
{
    const GENERAL = 'GENERAL';
    const RETURN = 'RETURN';

    /**
     * @var array
     */
    private static $descriptions = [
        self::GENERAL => '普通',
        self::RETURN => '退货',
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
