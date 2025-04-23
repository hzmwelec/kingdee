<?php

namespace Hzmwelec\Kingdee\Dtos;

use Hzmwelec\Kingdee\Contracts\Arrayable;
use JsonSerializable;

class SuccessesDto implements Arrayable, JsonSerializable
{
    /**
     * @var array<\Hzmwelec\Kingdee\Dtos\SuccessDto>
     */
    protected $items = [];

    /**
     * @param array<\Hzmwelec\Kingdee\Dtos\SuccessDto> $items
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * @param array $rows
     * @return static
     */
    public static function make($rows = [])
    {
        return new static(
            array_map(function ($row) {
                return SuccessDto::make($row);
            }, $rows)
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

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($item) {
            return $item->toArray();
        }, $this->items);
    }
}
