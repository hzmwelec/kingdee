<?php

namespace Hzmwelec\Kingdee\Enums;

class DeliveryStatusEnum
{
    const PENDING = 'A';
    const SEMI_DELIVERED = 'B';
    const DELIVERED = 'C';

    /**
     * @var array
     */
    private static $descriptions = [
        self::PENDING => '未发货',
        self::SEMI_DELIVERED => '部分发货',
        self::DELIVERED => '已发货',
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
