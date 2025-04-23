<?php

namespace Hzmwelec\Kingdee\Enums;

class TransferBizEnum
{
    const INNER_ORG = 'InnerOrgTransfer';
    const OVER_ORG = 'OverOrgTransfer';

    /**
     * @var array
     */
    private static $descriptions = [
        self::INNER_ORG => '组织内调拨',
        self::OVER_ORG => '跨组织调拨',
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
