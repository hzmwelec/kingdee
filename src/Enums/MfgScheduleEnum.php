<?php

namespace Hzmwelec\Kingdee\Enums;

class MfgScheduleEnum
{
    const PENDING = '1';
    const SEMI_SCHEDULED = '2';
    const SCHEDULED = '3';

    /**
     * @var array
     */
    private static $descriptions = [
        self::PENDING => '未排产',
        self::SEMI_SCHEDULED => '部分排产',
        self::SCHEDULED => '全部排产',
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
