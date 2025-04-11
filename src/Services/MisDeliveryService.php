<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\MisDelivery;

class MisDeliveryService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\MisDelivery
     */
    protected function newBill()
    {
        return new MisDelivery();
    }
}
