<?php

namespace Hzmwelec\Kingdee\Enums;

class InventoryOwnerEnum
{
    const OWNERORG = 'BD_OwnerOrg';
    const CUSTOMER = 'BD_Customer';

    /**
     * @var array
     */
    private static $descriptions = [
        self::OWNERORG => '业务组织',
        self::CUSTOMER => '客户',
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
