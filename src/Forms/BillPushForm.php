<?php

namespace Hzmwelec\Kingdee\Forms;

use Hzmwelec\Kingdee\Contracts\Form;

class BillPushForm implements Form
{
    /**
     * @var \Hzmwelec\Kingdee\Contracts\BillModel
     */
    protected $billModel;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @param array $data
     */
    public function __construct($billModel, $data)
    {
        $this->billModel = $billModel;
        $this->data = $data;
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
