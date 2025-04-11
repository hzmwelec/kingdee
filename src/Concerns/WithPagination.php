<?php

namespace Hzmwelec\Kingdee\Concerns;

trait WithPagination
{
    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var int
     */
    public $perPage = 20;

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = max(0, $page);

        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return $this
     */
    public function setPerPage($perPage)
    {
        $this->perPage = max(0, $perPage);

        return $this;
    }
}
