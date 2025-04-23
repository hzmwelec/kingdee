<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Contracts\Form;
use Hzmwelec\Kingdee\Query\Builder;

class BillPaginateForm implements Form
{
    /**
     * @var \Hzmwelec\Kingdee\Contracts\BillModel
     */
    protected $billModel;

    /**
     * @var \Hzmwelec\Kingdee\Query\Builder
     */
    protected $query;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     */
    public function __construct($billModel, $query = null)
    {
        $this->billModel = $billModel;

        $this->query = $query ?? Builder::query();

        $this->applyQueryCriteria();
    }

    /**
     * @return void
     */
    protected function applyQueryCriteria()
    {
        if ($this->billModel->isIntId()) {
            $this->query->addFilterGreater($this->billModel->getIdName(), 0);
        }
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return static
     */
    public static function make($billModel, $query = null)
    {
        return new static($billModel, $query);
    }

    /**
     * @return string
     */
    public function getFormId()
    {
        return $this->billModel->getFormId();
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        $attributesToColumnsMap = $this->billModel->mapBillAttributesToColumns();

        return [
            'FormId' => $this->getFormId(),
            'FieldKeys' => $this->query->getSelectString($attributesToColumnsMap),
            'FilterString' => $this->query->getFilterString($attributesToColumnsMap),
            'OrderString' => $this->query->getSortString($attributesToColumnsMap),
            'StartRow' => $this->query->getPageOffset(),
            'Limit' => $this->query->getPageLimit(),
        ];
    }
}
