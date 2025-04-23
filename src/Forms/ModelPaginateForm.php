<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Contracts\Form;
use Hzmwelec\Kingdee\Query\Builder;

class ModelPaginateForm implements Form
{
    /**
     * @var \Hzmwelec\Kingdee\Contracts\Model
     */
    protected $model;

    /**
     * @var \Hzmwelec\Kingdee\Query\Builder
     */
    protected $query;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     */
    public function __construct($model, $query = null)
    {
        $this->model = $model;

        $this->query = $query ?? Builder::query();

        $this->applyQueryCriteria();
    }

    /**
     * @return void
     */
    protected function applyQueryCriteria()
    {
        if ($this->model->isIntId()) {
            $this->query->addFilterGreater($this->model->getIdName(), 0);
        }
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return static
     */
    public static function make($model, $query = null)
    {
        return new static($model, $query);
    }

    /**
     * @return string
     */
    public function getFormId()
    {
        return $this->model->getFormId();
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        $attributesToColumnsMap = $this->model->mapAttributesToColumns();

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
