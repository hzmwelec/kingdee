<?php

namespace Hzmwelec\Kingdee\Enums;

class MfgPickEnum
{
    const PENDING = '1';
    const SEMI_PICKED = '2';
    const PICKED = '3';
    const ULTRA_PICKED = '4';

    /**
     * @var array
     */
    private static $descriptions = [
        self::PENDING => '未领料',
        self::SEMI_PICKED => '部分领料',
        self::PICKED => '全部领料',
        self::ULTRA_PICKED => '超额领料',
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
