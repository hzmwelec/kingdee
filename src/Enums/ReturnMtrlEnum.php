<?php

namespace Hzmwelec\Kingdee\Enums;

class ReturnMtrlEnum
{
    const CONFORMING = '1';
    const NON_CONFORMING_INCOMING = '2';
    const NON_CONFORMING_WORK = '3';

    /**
     * @var array
     */
    private static $descriptions = [
        self::CONFORMING => '良品退料',
        self::NON_CONFORMING_INCOMING => '来料不良退料',
        self::NON_CONFORMING_WORK => '作业不良退料',
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
