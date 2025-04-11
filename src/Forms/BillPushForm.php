<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Contracts\Form;

class BillPushForm implements Form
{
    /**
     * @var \Hzmwelec\Kingdee\Contracts\Bill
     */
    protected $bill;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @param array $data
     */
    public function __construct($bill, $data)
    {
        $this->bill = $bill;
        $this->data = $data;
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
            'Ids' => implode(',', $this->data['ids'] ?? []),
            'Numbers' => $this->data['numbers'] ?? [],
            'EntryIds' => implode(',', $this->data['entry_ids'] ?? []),
            'RuleId' => $this->data['rule_id'] ?? '',
            'TargetBillTypeId' => $this->data['target_bill_type_id'] ?? '',
            'TargetOrgId' => $this->data['target_org_id'] ?? 0,
            'TargetFormName' => $this->data['target_form_id'] ?? '',
            'IsEnableDefaultRule' => $this->data['is_enable_default_rule'] ?? false,
            'IsDraftWhenSaveFail' => $this->data['is_draft_when_save_fail'] ?? true,
            'CustomParams' => $this->data['custom_params'] ?? [],
        ];
    }
}
