<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Models\Inventory;

class InventoryService extends AbstractModelService
{
    /**
     * @return \Hzmwelec\Kingdee\Models\Inventory
     */
    protected function newModel()
    {
        return new Inventory();
    }
}
