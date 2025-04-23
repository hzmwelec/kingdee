<?php

namespace Hzmwelec\Kingdee\Dtos;

class EntryDto extends EntityDto
{
    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $row
     * @return static
     */
    public static function make($billModel, $row)
    {
        if (empty($row)) {
            return new static();
        }

        $combined = static::combineAttributes($row, $billModel->getAttributes());

        $combinedEntry = array_intersect_key($combined, $billModel->mapEntryAttributesToColumns());

        return new static($combinedEntry);
    }
}
