<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\User;

class UserService extends AbstractModelService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\User
     */
    protected function newModel()
    {
        return new User();
    }
}
