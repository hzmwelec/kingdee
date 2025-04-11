<?php

namespace Hzmwelec\Kingdee\Concerns;

use Hzmwelec\Kingdee\Enums\SortDirectionEnum;

trait WithSort
{
    /**
     * @var string
     */
    protected $sortColumn = '';

    /**
     * @var string
     */
    protected $sortDirection = '';

    /**
     * @param string $sortColumn
     * @return $this
     */
    public function setSortAsc($sortColumn)
    {
        $this->sortColumn = $sortColumn;

        $this->sortDirection = SortDirectionEnum::ASC;

        return $this;
    }

    /**
     * @param string $sortColumn
     * @return $this
     */
    public function setSortDesc($sortColumn)
    {
        $this->sortColumn = $sortColumn;

        $this->sortDirection = SortDirectionEnum::DESC;

        return $this;
    }

    /**
     * @param array $attributesToColumnsMap
     * @return string
     */
    public function getSortString($attributesToColumnsMap)
    {
        if (!$this->sortColumn || !isset($attributesToColumnsMap[$this->sortColumn])) {
            return '';
        }

        return "{$attributesToColumnsMap[$this->sortColumn]} {$this->sortDirection}";
    }
}
