<?php

namespace Hzmwelec\Kingdee\Dtos;

use Hzmwelec\Kingdee\Concerns\CombinesAttributes;
use Hzmwelec\Kingdee\Contracts\Arrayable;
use Hzmwelec\Kingdee\Contracts\Emptiable;
use JsonSerializable;

class BillEntityDto implements Arrayable, Emptiable, JsonSerializable
{
    use CombinesAttributes;

    /**
     * @var \Hzmwelec\Kingdee\Dtos\BillDto
     */
    protected $bill;

    /**
     * @var array<\Hzmwelec\Kingdee\Dtos\EntryDto>
     */
    protected $entries;

    /**
     * @param array|\Hzmwelec\Kingdee\Dtos\BillDto $bill
     * @param array<\Hzmwelec\Kingdee\Dtos\EntryDto|array> $entries
     */
    public function __construct($bill = [], $entries = [])
    {
        $this->setBill($bill);
        $this->setEntries($entries);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $rows
     * @return static
     */
    public static function make($billModel, $rows)
    {
        if (count($rows) <= 0) {
            return new static();
        }

        $combinedRows = static::mergeAttributes($billModel, $rows);

        $bill = static::makeBill($billModel, $combinedRows[0]);

        $entries = static::makeEntries($billModel, $combinedRows);

        return new static($bill, $entries);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $rows
     * @return array
     */
    protected static function mergeAttributes($billModel, $rows)
    {
        $attributes = $billModel->getAttributes();

        return array_map(function ($row) use ($attributes) {
            return static::combineAttributes($row, $attributes);
        }, $rows);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $combinedRow
     * @return \Hzmwelec\Kingdee\Dtos\BillDto
     */
    protected static function makeBill($billModel, $combinedRow)
    {
        $map = $billModel->mapBillAttributesToColumns();

        return new BillDto(array_intersect_key($combinedRow, $map));
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $combinedRows
     * @return array<\Hzmwelec\Kingdee\Dtos\EntryDto>
     */
    protected static function makeEntries($billModel, $combinedRows)
    {
        $map = $billModel->mapEntryAttributesToColumns();

        return array_map(function ($combinedRow) use ($map) {
            return new EntryDto(array_intersect_key($combinedRow, $map));
        }, $combinedRows);
    }

    /**
     * @return \Hzmwelec\Kingdee\Dtos\BillDto
     */
    public function getBill()
    {
        return $this->bill;
    }

    /**
     * @param array|\Hzmwelec\Kingdee\Dtos\BillDto $bill
     * @return void
     */
    public function setBill($bill)
    {
        $this->bill = $bill instanceof BillDto ? $bill : new BillDto($bill);
    }

    /**
     * @return array<\Hzmwelec\Kingdee\Dtos\EntryDto>
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @param array<\Hzmwelec\Kingdee\Dtos\EntryDto|array> $entries
     * @return void
     */
    public function setEntries($entries)
    {
        $this->entries = array_map(function ($entry) {
            return $entry instanceof EntryDto ? $entry : new EntryDto($entry);
        }, $entries);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->bill->isEmpty();
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
        if ($this->isEmpty()) {
            return [];
        }

        return array_merge($this->bill->toArray(), [
            'entries' => array_map(function ($entry) {
                return $entry->toArray();
            }, $this->entries),
        ]);
    }
}
