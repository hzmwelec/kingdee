<?php

namespace Hzmwelec\Kingdee\Pagination;

use Countable;
use Hzmwelec\Kingdee\Contracts\Arrayable;
use Hzmwelec\Kingdee\Contracts\Paginator as PaginatorInterface;
use Hzmwelec\Kingdee\Support\Collection;
use JsonSerializable;

class Paginator extends AbstractPaginator implements Arrayable, Countable, JsonSerializable, PaginatorInterface
{
    /**
     * @param \Hzmwelec\Kingdee\Support\Collection|array $items
     * @param int $total
     * @param int $page
     * @param int $perPage
     */
    public function __construct($items, $total, $page, $perPage)
    {
        $this->items = $items instanceof Collection ? $items : Collection::make($items);

        $this->page = $page;

        $this->perPage = $perPage;

        $this->total = $total;
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
            'items' => $this->items->toArray(),
            'page' => $this->getPage(),
            'per_page' => $this->getPerPage(),
            'total' => $this->getTotal(),
        ];
    }
}
