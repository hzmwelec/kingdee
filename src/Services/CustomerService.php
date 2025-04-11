<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\Customer;

class CustomerService extends AbstractModelService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\Customer
     */
    protected function newModel()
    {
        return new Customer();
    }
}
