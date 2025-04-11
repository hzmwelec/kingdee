<?php

namespace Hzmwelec\Kingdee\Data;

use Hzmwelec\Kingdee\Support\Collection;

class SuccessCollection extends Collection
{
    /**
     * @var array<\Hzmwelec\Kingdee\Data\SuccessData>
     */
    protected $items;

    /**
     * @param array $rawRows
     * @return static
     */
    public static function make($rawRows = [])
    {
        return new static(
            array_map(function ($row) {
                return SuccessData::make($row);
            }, $rawRows)
        );
    }

    /**
     * @return bool
     */
    public function hasEmptyId()
    {
        return array_reduce($this->items, function ($carry, $item) {
            return $carry || $item->isIdEmpty();
        }, false);
    }

    /**
     * @return bool
     */
    public function hasEmptyNumber()
    {
        return array_reduce($this->items, function ($carry, $item) {
            return $carry || $item->isNumberEmpty();
        }, false);
    }

    /**
     * @return array
     */
    public function getIds()
    {
        return array_map(function ($item) {
            return $item->getId();
        }, $this->items);
    }

    /**
     * @return array
     */
    public function getNumbers()
    {
        return array_map(function ($item) {
            return $item->getNumber();
        }, $this->items);
    }
}
