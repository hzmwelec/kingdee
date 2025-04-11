<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\Model;

class User extends AbstractModel implements Model
{
    const FORM_ID = 'SEC_User';

    /**
     * @var array
     */
    protected $mappings = [
        'id' => [
            'column' => 'FUserId',
            'field' => 'FUserId',
            'comment' => '单据内码',
        ],
        'name' => [
            'column' => 'FName',
            'field' => 'FName',
            'comment' => '用户名',
        ],
        'forbid_status' => [
            'column' => 'FForbidStatus',
            'field' => 'FForbidStatus',
            'comment' => '禁用状态',
        ],
        'user_type' => [
            'column' => 'FUserType',
            'field' => 'FUserType',
            'comment' => '用户类型',
        ],
    ];

    /**
     * @return string
     */
    public function getFormId()
    {
        return self::FORM_ID;
    }

    /**
     * @return array
     */
    public function getMappings()
    {
        return $this->mappings;
    }
}
