<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\SaleOrder;

class SaleOrderService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\SaleOrder
     */
    protected function newBill()
    {
        return new SaleOrder();
    }
}
