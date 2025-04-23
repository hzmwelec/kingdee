<?php

namespace Hzmwelec\Kingdee\Pagination;

use Countable;
use Hzmwelec\Kingdee\Contracts\Arrayable;
use Hzmwelec\Kingdee\Contracts\Emptiable;
use Hzmwelec\Kingdee\Contracts\Paginator as PaginatorContract;
use JsonSerializable;

class Paginator implements Arrayable, Countable, Emptiable, JsonSerializable, PaginatorContract
{
    /**
     * @var array
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
     * @param array $items
     * @param int $total
     * @param int $page
     * @param int $perPage
     */
    public function __construct($items, $total, $page, $perPage)
    {
        $this->items = $items;
        $this->page = $page;
        $this->perPage = $perPage;
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
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

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->items);
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
        return [
            'items' => $this->items,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'total' => $this->total,
        ];
    }
}
