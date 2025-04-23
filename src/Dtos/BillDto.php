<?php

namespace Hzmwelec\Kingdee\Dtos;

class BillDto extends EntityDto
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

        $combined = static::combineAttributes($row, $billModel->getBillAttributes());

        return new static($combined);
    }
}
