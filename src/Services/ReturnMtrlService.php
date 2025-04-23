<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\ReturnMtrl;

class ReturnMtrlService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\ReturnMtrl
     */
    protected function newBillModel()
    {
        return new ReturnMtrl();
    }
}
