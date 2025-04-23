<?php

namespace Hzmwelec\Kingdee\Concerns;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Hzmwelec\Kingdee\Enums\CompareOperatorEnum;
use Hzmwelec\Kingdee\Enums\DateRangeEnum;
use Hzmwelec\Kingdee\Exceptions\InvalidArgumentException;
use Hzmwelec\Kingdee\Flex\DestStockLocation;
use Hzmwelec\Kingdee\Flex\SrcStockLocation;
use Hzmwelec\Kingdee\Flex\StockLocation;

trait WithFilters
{
    /**
     * @var array
     */
    protected $filters = [];

    /**
     * @param string $attribute
     * @param mixed $value
     * @return $this
     */
    public function addFilterEqual($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::EQUAL,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return $this
     */
    public function addFilterNotEqual($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::NOT_EQUAL,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return $this
     */
    public function addFilterGreater($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::GREATER,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return $this
     */
    public function addFilterGreaterEqual($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::GREATER_EQUAL,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return $this
     */
    public function addFilterLess($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::LESS,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return $this
     */
    public function addFilterLessEqual($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::LESS_EQUAL,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return $this
     */
    public function addFilterLike($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::LIKE,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param array $value
     * @return $this
     */
    public function addFilterIn($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::IN,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param array $value
     * @return $this
     */
    public function addFilterNotIn($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::NOT_IN,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @return $this
     */
    public function addFilterTrue($attribute)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::TRUE,
            'value' => null,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @return $this
     */
    public function addFilterFalse($attribute)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::FALSE,
            'value' => null,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @return $this
     */
    public function addFilterIsNull($attribute)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::IS_NULL,
            'value' => null,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @return $this
     */
    public function addFilterIsNotNull($attribute)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::IS_NOT_NULL,
            'value' => null,
        ];

        return $this;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return $this
     */
    public function addFilterDate($attribute, $value)
    {
        $this->filters[] = [
            'attribute' => $attribute,
            'operator' => CompareOperatorEnum::DATE,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addFilterStockLocNumber($value)
    {
        $numbers = StockLocation::convertNumberStringToArray($value);

        foreach ($numbers as $attribute => $number) {
            $this->addFilterEqual($attribute, $number);
        }

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addFilterStockLocName($value)
    {
        $names = StockLocation::convertNameStringToArray($value);

        foreach ($names as $attribute => $name) {
            $this->addFilterEqual($attribute, $name);
        }

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addFilterSrcStockLocNumber($value)
    {
        $numbers = SrcStockLocation::convertNumberStringToArray($value);

        foreach ($numbers as $attribute => $number) {
            $this->addFilterEqual($attribute, $number);
        }

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addFilterSrcStockLocName($value)
    {
        $names = SrcStockLocation::convertNameStringToArray($value);

        foreach ($names as $attribute => $name) {
            $this->addFilterEqual($attribute, $name);
        }

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addFilterDestStockLocNumber($value)
    {
        $numbers = DestStockLocation::convertNumberStringToArray($value);

        foreach ($numbers as $attribute => $number) {
            $this->addFilterEqual($attribute, $number);
        }

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function addFilterDestStockLocName($value)
    {
        $names = DestStockLocation::convertNameStringToArray($value);

        foreach ($names as $attribute => $name) {
            $this->addFilterEqual($attribute, $name);
        }

        return $this;
    }

    /**
     * @param array $attributesToColumnsMap
     * @return string
     */
    public function getFilterString($attributesToColumnsMap)
    {
        if (empty($this->filters)) {
            return '';
        }

        $filters = array_filter(array_map(function ($filter) use ($attributesToColumnsMap) {
            if (!isset($attributesToColumnsMap[$filter['attribute']])) {
                return null;
            }

            return $this->buildCondition(
                $attributesToColumnsMap[$filter['attribute']],
                $filter['operator'],
                $filter['value']
            );
        }, $this->filters));

        return implode(' AND ', $filters);
    }

    /**
     * @param string $column
     * @param string $operator
     * @param mixed $value
     * @return string
     */
    protected function buildCondition($column, $operator, $value)
    {
        switch ($operator) {
            case CompareOperatorEnum::EQUAL:
                return $this->buildEqual($column, $value);

            case CompareOperatorEnum::NOT_EQUAL:
                return $this->buildNotEqual($column, $value);

            case CompareOperatorEnum::GREATER:
                return $this->buildGreater($column, $value);

            case CompareOperatorEnum::GREATER_EQUAL:
                return $this->buildGreaterEqual($column, $value);

            case CompareOperatorEnum::LESS:
                return $this->buildLess($column, $value);

            case CompareOperatorEnum::LESS_EQUAL:
                return $this->buildLessEqual($column, $value);

            case CompareOperatorEnum::LIKE:
                return $this->buildLike($column, $value);

            case CompareOperatorEnum::IN:
                return $this->buildIn($column, $value);

            case CompareOperatorEnum::NOT_IN:
                return $this->buildNotIn($column, $value);

            case CompareOperatorEnum::TRUE:
                return $this->buildTrue($column, $value);

            case CompareOperatorEnum::FALSE:
                return $this->buildFalse($column, $value);

            case CompareOperatorEnum::IS_NULL:
                return $this->buildIsNull($column, $value);

            case CompareOperatorEnum::IS_NOT_NULL:
                return $this->buildIsNotNull($column, $value);

            case CompareOperatorEnum::DATE:
                return $this->buildDate($column, $value);

            default:
                return '';
        }
    }

    /**
     * @param string $column
     * @param mixed $value
     * @return string
     */
    protected function buildEqual($column, $value)
    {
        $value = $this->escapeSqlValue($value);

        return " {$column} = {$value} ";
    }

    /**
     * @param string $column
     * @param mixed $value
     * @return string
     */
    protected function buildNotEqual($column, $value)
    {
        $value = $this->escapeSqlValue($value);

        return " {$column} != {$value} ";
    }

    /**
     * @param string $column
     * @param mixed $value
     * @return string
     */
    protected function buildGreater($column, $value)
    {
        return " {$column} > {$value} ";
    }

    /**
     * @param string $column
     * @param mixed $value
     * @return string
     */
    protected function buildGreaterEqual($column, $value)
    {
        return " {$column} >= {$value} ";
    }

    /**
     * @param string $column
     * @param mixed $value
     * @return string
     */
    protected function buildLess($column, $value)
    {
        return " {$column} < {$value} ";
    }

    /**
     * @param string $column
     * @param mixed $value
     * @return string
     */
    protected function buildLessEqual($column, $value)
    {
        return " {$column} <= {$value} ";
    }

    /**
     * @param string $column
     * @param mixed $value
     * @return string
     */
    protected function buildLike($column, $value)
    {
        $value = $this->escapeLikeValue($value);

        return " {$column} LIKE {$value} ";
    }

    /**
     * @param string $column
     * @param array $value
     * @return string
     */
    protected function buildIn($column, $value)
    {
        $value = $this->escapeSqlValue($value);

        return " {$column} IN {$value} ";
    }

    /**
     * @param string $column
     * @param array $value
     * @return string
     */
    protected function buildNotIn($column, $value)
    {
        $value = $this->escapeSqlValue($value);

        return " {$column} NOT IN {$value} ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildTrue($column)
    {
        return " {$column} = 1 ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildFalse($column)
    {
        return " {$column} = 0 ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildIsNull($column)
    {
        return " {$column} IS NULL ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildIsNotNull($column)
    {
        return " {$column} IS NOT NULL ";
    }

    /**
     * @param string $column
     * @param string $value
     * @return string
     */
    protected function buildDate($column, $value)
    {
        switch (strtolower($value)) {
            case strtolower(DateRangeEnum::TODAY):
                return $this->buildDateToday($column);

            case strtolower(DateRangeEnum::YESTERDAY):
                return $this->buildDateYesterday($column);

            case strtolower(DateRangeEnum::THIS_WEEK):
                return $this->buildDateThisWeek($column);

            case strtolower(DateRangeEnum::LAST_WEEK):
                return $this->buildDateLastWeek($column);

            case strtolower(DateRangeEnum::THIS_MONTH):
                return $this->buildDateThisMonth($column);

            case strtolower(DateRangeEnum::LAST_MONTH):
                return $this->buildDateLastMonth($column);

            case strtolower(DateRangeEnum::RECENT_60_DAYS):
                return $this->buildDateRecentDays($column, 60);

            case strtolower(DateRangeEnum::RECENT_90_DAYS):
                return $this->buildDateRecentDays($column, 90);

            case strtolower(DateRangeEnum::RECENT_180_DAYS):
                return $this->buildDateRecentDays($column, 180);

            default:
                return $this->buildDateEqual($column, $value);
        }
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildDateToday($column)
    {
        $start = Carbon::today()->startOfDay();

        $end = Carbon::today()->endOfDay();

        return " {$column} BETWEEN '{$start}' AND '{$end}' ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildDateYesterday($column)
    {
        $start = Carbon::yesterday()->startOfDay();

        $end = Carbon::yesterday()->endOfDay();

        return " {$column} BETWEEN '{$start}' AND '{$end}' ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildDateThisWeek($column)
    {
        $start = Carbon::now()->startOfWeek();

        $end = Carbon::now()->endOfWeek();

        return " {$column} BETWEEN '{$start}' AND '{$end}' ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildDateLastWeek($column)
    {
        $start = Carbon::now()->startOfWeek()->subWeek();

        $end = Carbon::now()->endOfWeek()->subWeek();

        return " {$column} BETWEEN '{$start}' AND '{$end}' ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildDateThisMonth($column)
    {
        $start = Carbon::now()->startOfMonth();

        $end = Carbon::now()->endOfMonth();

        return " {$column} BETWEEN '{$start}' AND '{$end}' ";
    }

    /**
     * @param string $column
     * @return string
     */
    protected function buildDateLastMonth($column)
    {
        $start = Carbon::now()->startOfMonth()->subMonth();

        $end = Carbon::now()->endOfMonth()->subMonth();

        return " {$column} BETWEEN '{$start}' AND '{$end}' ";
    }

    /**
     * @param string $column
     * @param int $days
     * @return string
     */
    protected function buildDateRecentDays($column, $days)
    {
        $start = Carbon::now()->subDays(max($days, 1) - 1)->startOfDay();

        $end = Carbon::now()->endOfDay();

        return " {$column} BETWEEN '{$start}' AND '{$end}' ";
    }

    /**
     * @param string $column
     * @param string $value
     * @return string
     * @throws \Hzmwelec\Kingdee\Exceptions\InvalidArgumentException
     */
    protected function buildDateEqual($column, $value)
    {
        try {
            $date = Carbon::parse($value);

            $start = $date->copy()->startOfDay();

            $end = $date->copy()->endOfDay();

            return " {$column} BETWEEN '{$start}' AND '{$end}' ";
        } catch (InvalidFormatException $e) {
            throw new InvalidArgumentException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param mixed $value
     * @return string
     */
    protected function escapeLikeValue($value)
    {
        return $this->escapeSqlValue($value, true);
    }

    /**
     * @param mixed $value
     * @param bool $isLike
     * @return string
     */
    protected function escapeSqlValue($value, $isLike = false)
    {
        if (is_array($value)) {
            $escaped = array_map(function ($val) use ($isLike) {
                return $this->escapeSingleValue($val, $isLike);
            }, $value);

            return '(' . implode(',', $escaped) . ')';
        }

        return $this->escapeSingleValue($value, $isLike);
    }

    /**
     * @param mixed $value
     * @param bool $isLike
     * @return string
     */
    protected function escapeSingleValue($value, $isLike)
    {
        if (!is_string($value)) {
            return $value;
        }

        $escaped = addcslashes(str_replace("'", "''", $value), "\000\n\r\\\032");

        if ($isLike) {
            return " '%" . $escaped . "%' ESCAPE '\\' ";
        }

        return " '{$escaped}' ";
    }
}
