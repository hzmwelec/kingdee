<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Concerns\RemapsFormData;
use Hzmwelec\Kingdee\Contracts\Form;

class BillSaveForm implements Form
{
    use RemapsFormData;

    /**
     * @var \Hzmwelec\Kingdee\Contracts\BillModel
     */
    protected $billModel;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $entityKeyName;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $data
     * @param string $entityKeyName
     */
    public function __construct($billModel, $data, $entityKeyName = 'entries')
    {
        $this->billModel = $billModel;
        $this->data = $data;
        $this->entityKeyName = $entityKeyName;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $data
     * @return static
     */
    public static function make($billModel, $data)
    {
        return new static($billModel, $data);
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
        return [
            'Model' => array_merge(
                static::remapFormData(
                    $this->data,
                    $this->billModel->mapBillAttributesToFields()
                ),
                [
                    $this->billModel->getEntityKeyName() => array_map(function ($entryData) {
                        return static::remapFormData(
                            $entryData,
                            $this->billModel->mapEntryAttributesToFields()
                        );
                    }, $this->data[$this->entityKeyName] ?? [])
                ]
            )
        ];
    }
}
