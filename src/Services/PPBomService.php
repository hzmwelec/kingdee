<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\PPBom;

class PPBomService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\PPBom
     */
    protected function newBillModel()
    {
        return new PPBom();
    }
}
