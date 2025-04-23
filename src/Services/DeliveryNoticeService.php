<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\DeliveryNotice;

class DeliveryNoticeService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\DeliveryNotice
     */
    protected function newBillModel()
    {
        return new DeliveryNotice();
    }
}
