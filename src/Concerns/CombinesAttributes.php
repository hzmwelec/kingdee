<?php

namespace Hzmwelec\Kingdee\Concerns;

use Hzmwelec\Kingdee\Exceptions\RuntimeException;

trait CombinesAttributes
{
    /**
     * @param array $values
     * @param array $attributes
     * @return array
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public static function combineAttributes($values, $attributes)
    {
        if (count($values) !== count($attributes)) {
            throw new RuntimeException('Array length mismatch: values vs attributes');
        }

        return array_combine($attributes, array_map(function ($value) {
            return is_string($value) ? trim($value) : $value;
        }, $values));
    }
}
