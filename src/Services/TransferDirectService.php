<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\TransferDirect;

class TransferDirectService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\TransferDirect
     */
    protected function newBill()
    {
        return new TransferDirect();
    }
}
