<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\MfgOrder;

class MfgOrderService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\MfgOrder
     */
    protected function newBill()
    {
        return new MfgOrder();
    }
}
