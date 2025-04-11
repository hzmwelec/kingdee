<?php

namespace Hzmwelec\Kingdee\Pagination;

abstract class AbstractPaginator
{
    /**
     * @var \Hzmwelec\Kingdee\Support\Collection
     */
    protected $items;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $perPage;

    /**
     * @var int
     */
    protected $total;

    /**
     * @return int
     */
    public function count()
    {
        return $this->items->count();
    }

    /**
     * @return \Hzmwelec\Kingdee\Support\Collection
     */
    public function getCollection()
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items->all();
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->items->isEmpty();
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return $this->items->isNotEmpty();
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
}
