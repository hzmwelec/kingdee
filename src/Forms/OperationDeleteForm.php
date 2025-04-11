<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Contracts\Form;

class OperationDeleteForm implements Form
{
    /**
     * @var \Hzmwelec\Kingdee\Contracts\Model
     */
    protected $model;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @param array $data
     */
    public function __construct($model, $data)
    {
        $this->model = $model;
        $this->data = $data;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @param array $data
     * @return static
     */
    public static function make($model, $data)
    {
        return new static($model, $data);
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
        return [
            'Ids' => implode(',', $this->data['ids'] ?? []),
            'Numbers' => $this->data['numbers'] ?? [],
        ];
    }
}
