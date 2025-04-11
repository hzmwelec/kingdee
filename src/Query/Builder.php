<?php

namespace Hzmwelec\Kingdee\Query;

use Hzmwelec\Kingdee\Concerns\WithColumns;
use Hzmwelec\Kingdee\Concerns\WithFilters;
use Hzmwelec\Kingdee\Concerns\WithPagination;
use Hzmwelec\Kingdee\Concerns\WithRange;
use Hzmwelec\Kingdee\Concerns\WithSort;

class Builder
{
    use WithColumns;
    use WithFilters;
    use WithPagination;
    use WithRange;
    use WithSort;

    /**
     * @return static
     */
    public static function query()
    {
        return new static();
    }
}
