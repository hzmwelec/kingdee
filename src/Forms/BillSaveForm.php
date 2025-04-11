<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Concerns\RemapsFormData;
use Hzmwelec\Kingdee\Contracts\Form;

class BillSaveForm implements Form
{
    use RemapsFormData;

    /**
     * @var \Hzmwelec\Kingdee\Contracts\Bill
     */
    protected $bill;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $entityKeyName;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $data
     * @param string $entityKeyName
     */
    public function __construct($bill, $data, $entityKeyName = 'entries')
    {
        $this->bill = $bill;
        $this->data = $data;
        $this->entityKeyName = $entityKeyName;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $data
     * @return static
     */
    public static function make($bill, $data)
    {
        return new static($bill, $data);
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
        return [
            'Model' => array_merge(
                static::remapFormData(
                    $this->data,
                    $this->bill->mapBillAttributesToFields()
                ),
                [
                    $this->bill->getEntityKeyName() => array_map(function ($entryData) {
                        return static::remapFormData(
                            $entryData,
                            $this->bill->mapEntryAttributesToFields()
                        );
                    }, $this->data[$this->entityKeyName] ?? [])
                ]
            )
        ];
    }
}
