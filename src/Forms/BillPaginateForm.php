<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Contracts\Form;
use Hzmwelec\Kingdee\Query\Builder;

class BillPaginateForm implements Form
{
    /**
     * @var \Hzmwelec\Kingdee\Contracts\Bill
     */
    protected $bill;

    /**
     * @var \Hzmwelec\Kingdee\Query\Builder
     */
    protected $query;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     */
    public function __construct($bill, $query = null)
    {
        $this->bill = $bill;

        $this->query = $query ?? Builder::query();

        $this->applyQueryCriteria();
    }

    /**
     * @return void
     */
    protected function applyQueryCriteria()
    {
        if ($this->bill->isIntId()) {
            $this->query->addFilterGreater($this->bill->getIdName(), 0);
        }
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return static
     */
    public static function make($bill, $query = null)
    {
        return new static($bill, $query);
    }

    /**
     * @return string
     */
    public function getFormId()
    {
        return $this->bill->getFormId();
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        $attributesToColumnsMap = $this->bill->mapBillAttributesToColumns();

        return [
            'FormId' => $this->getFormId(),
            'FieldKeys' => $this->query->getSelectString($attributesToColumnsMap),
            'FilterString' => $this->query->getFilterString($attributesToColumnsMap),
            'OrderString' => $this->query->getSortString($attributesToColumnsMap),
            'StartRow' => ($this->query->getPage() - 1) * $this->query->getPerPage(),
            'Limit' => $this->query->getPerPage(),
        ];
    }
}
