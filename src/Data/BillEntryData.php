<?php

namespace Hzmwelec\Kingdee\Data;

use Hzmwelec\Kingdee\Concerns\CombinesAttributes;
use Hzmwelec\Kingdee\Contracts\Data;

class BillEntryData extends AbstractData implements Data
{
    use CombinesAttributes;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $rawRow
     * @return static
     */
    public static function make($bill, $rawRow)
    {
        if (empty($rawRow)) {
            return new static();
        }

        $attributes = $bill->getAttributes();

        $combinedRow = static::combineAttributes($rawRow, $attributes);

        return new static($combinedRow);
    }
}
