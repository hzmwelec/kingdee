<?php

namespace Hzmwelec\Kingdee\Concerns;

trait WithRange
{
    /**
     * @var int
     */
    public $startRow = 0;

    /**
     * @var int
     */
    public $limit = 0;

    /**
     * @return int
     */
    public function getStartRow()
    {
        return $this->startRow;
    }

    /**
     * @param int $startRow
     * @return $this
     */
    public function setStartRow($startRow)
    {
        $this->startRow = max(0, $startRow);

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = max(0, $limit);

        return $this;
    }
}
