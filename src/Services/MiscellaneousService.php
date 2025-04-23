<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\Miscellaneous;

class MiscellaneousService extends AbstractBillService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\Miscellaneous
     */
    protected function newBillModel()
    {
        return new Miscellaneous();
    }
}
