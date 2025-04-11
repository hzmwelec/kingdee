<?php

namespace Hzmwelec\Kingdee\Data;

use Hzmwelec\Kingdee\Concerns\CombinesAttributes;
use Hzmwelec\Kingdee\Contracts\Data;

class ModelData extends AbstractData implements Data
{
    use CombinesAttributes;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @param array $rawRow
     * @return static
     */
    public static function make($model, $rawRow)
    {
        if (empty($rawRow)) {
            return new static();
        }

        $attributes = $model->getAttributes();

        $combinedRow = static::combineAttributes($rawRow, $attributes);

        return new static($combinedRow);
    }
}
