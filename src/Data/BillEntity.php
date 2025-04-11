<?php

namespace Hzmwelec\Kingdee\Data;

use Hzmwelec\Kingdee\Concerns\CombinesAttributes;
use Hzmwelec\Kingdee\Contracts\Data;

class BillEntity implements Data
{
    use CombinesAttributes;

    /**
     * @var array
     */
    protected $billData;

    /**
     * @var array
     */
    protected $entryItems;

    /**
     * @var string
     */
    protected $entityKeyName;

    /**
     * @param array $billData
     * @param array $entryItems
     * @param string $entityKeyName
     */
    public function __construct($billData = [], $entryItems = [], $entityKeyName = 'entries')
    {
        $this->billData = $billData;

        $this->entryItems = $entryItems;

        $this->entityKeyName = $entityKeyName;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $rawRows
     * @param string $entityKeyName
     * @return static
     */
    public static function make($bill, $rawRows, $entityKeyName = 'entries')
    {
        if (count($rawRows) <= 0) {
            return new static();
        }

        $combinedRows = static::mergeAttributes($bill, $rawRows);

        $billData = static::normalizeBill($bill, $combinedRows[0]);

        $entryItems = static::normalizeEntries($bill, $combinedRows);

        return new static($billData, $entryItems, $entityKeyName);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $rawRows
     * @return array
     */
    protected static function mergeAttributes($bill, $rawRows)
    {
        $attributes = $bill->getAttributes();

        return array_map(function ($item) use ($attributes) {
            return static::combineAttributes($item, $attributes);
        }, $rawRows);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $combinedRow
     * @return array
     */
    protected static function normalizeBill($bill, $combinedRow)
    {
        $map = $bill->mapBillAttributesToColumns();

        return array_intersect_key($combinedRow, $map);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $combinedRows
     * @return array
     */
    protected static function normalizeEntries($bill, $combinedRows)
    {
        $map = $bill->mapEntryAttributesToColumns();

        return array_map(function ($combinedRow) use ($map) {
            return array_intersect_key($combinedRow, $map);
        }, $combinedRows);
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if ($this->has($key)) {
            return $this->billData[$key];
        }

        return $default;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->billData);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->billData) || empty($this->entryItems);
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return !$this->isEmpty();
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

        return array_merge($this->billData, [
            $this->entityKeyName => $this->entryItems
        ]);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }
}
