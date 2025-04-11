<?php

namespace Hzmwelec\Kingdee\Enums;

class DocumentStatusEnum
{
    const DRAFT = 'Z';
    const CREATED = 'A';
    const WAITING_APPROVAL = 'B';
    const APPROVED = 'C';
    const WAITING_REAPPROVAL = 'D';

    /**
     * @var array
     */
    private static $descriptions = [
        self::DRAFT => '暂存',
        self::CREATED => '创建',
        self::WAITING_APPROVAL => '待审核',
        self::APPROVED => '已审核',
        self::WAITING_REAPPROVAL => '重新审核',
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
