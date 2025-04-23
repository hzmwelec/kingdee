<?php

namespace Hzmwelec\Kingdee\Concerns;

trait WithColumns
{
    /**
     * @param array $attributesToColumnsMap
     * @return string
     */
    public function getSelectString($attributesToColumnsMap)
    {
        return implode(',', array_values($attributesToColumnsMap));
    }
}
