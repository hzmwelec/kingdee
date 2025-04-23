<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\PickMtrl;

class PickMtrlService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\PickMtrl
     */
    protected function newBillModel()
    {
        return new PickMtrl();
    }
}
