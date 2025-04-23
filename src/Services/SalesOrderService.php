<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\SalesOrder;

class SalesOrderService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\SalesOrder
     */
    protected function newBillModel()
    {
        return new SalesOrder();
    }
}
