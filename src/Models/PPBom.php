<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\BillModel;

class PPBom extends AbstractBill implements BillModel
{
    const FORM_ID = 'PRD_PPBom';

    const ENTITY_KEY_NAME = 'FEntity';

    /**
     * @var array
     */
    protected $billMappings = [
        'id' => [
            'column' => 'FId',
            'field' => 'FId',
            'comment' => '单据内码',
        ],
        'bill_number' => [
            'column' => 'FBillNo',
            'field' => 'FBillNo',
            'comment' => '单据编号',
        ],
        'prd_org_id' => [
            'column' => 'FPrdOrgId',
            'field' => 'FPrdOrgId',
            'comment' => '生产组织',
        ],
        'prd_org_number' => [
            'column' => 'FPrdOrgId.FNumber',
            'field' => 'FPrdOrgId.FNumber',
            'comment' => '生产组织',
        ],
        'prd_org_name' => [
            'column' => 'FPrdOrgId.FName',
            'field' => 'FPrdOrgId.FName',
            'comment' => '生产组织',
        ],
        'mfg_order_id' => [
            'column' => 'FMoId',
            'field' => 'FMoId',
            'comment' => '生产订单',
        ],
        'mfg_order_entry_id' => [
            'column' => 'FMoEntryId',
            'field' => 'FMoEntryId',
            'comment' => '生产订单',
        ],
        'mfg_order_number' => [
            'column' => 'FMoBillNo',
            'field' => 'FMoBillNo',
            'comment' => '生产订单',
        ],
        'mfg_order_seq' => [
            'column' => 'FMoEntrySeq',
            'field' => 'FMoEntrySeq',
            'comment' => '生产订单',
        ],
        'mfg_order_status' => [
            'column' => 'FMoEntryStatus',
            'field' => 'FMoEntryStatus',
            'comment' => '生产订单状态',
        ],
        'document_status' => [
            'column' => 'FDocumentStatus',
            'field' => 'FDocumentStatus',
            'comment' => '单据状态',
        ],
        'note' => [
            'column' => 'FDescription',
            'field' => 'FDescription',
            'comment' => '备注',
        ],
        'creator_id' => [
            'column' => 'FCreatorId',
            'field' => 'FCreatorId',
            'comment' => '创建人',
        ],
        'creator_name' => [
            'column' => 'FCreatorId.FName',
            'field' => 'FCreatorId.FName',
            'comment' => '创建人',
        ],
        'create_date' => [
            'column' => 'FCreateDate',
            'field' => 'FCreateDate',
            'comment' => '创建日期',
        ],
        'sales_order_number' => [
            'column' => 'FSaleOrderNo',
            'field' => 'FSaleOrderNo',
            'comment' => '销售订单',
        ],
        'sales_order_seq' => [
            'column' => 'FSaleOrderEntrySeq',
            'field' => 'FSaleOrderEntrySeq',
            'comment' => '销售订单',
        ],
    ];

    /**
     * @var array
     */
    protected $entryMappings = [
        'entry_id' => [
            'column' => 'FEntity_FEntryId',
            'field' => 'FEntryId',
            'comment' => '分录内码',
        ],
        'seq' => [
            'column' => 'FEntity_FSeq',
            'field' => 'FSeq',
            'comment' => '行号',
        ],
        'material_id' => [
            'column' => 'FMaterialId2',
            'field' => 'FMaterialId2',
            'comment' => '子项物料',
        ],
        'material_number' => [
            'column' => 'FMaterialId2.FNumber',
            'field' => 'FMaterialId2.FNumber',
            'comment' => '子项物料',
        ],
        'material_name' => [
            'column' => 'FMaterialId2.FName',
            'field' => 'FMaterialId2.FName',
            'comment' => '子项物料',
        ],
        'material_spec' => [
            'column' => 'FMaterialId2.FSpecification',
            'field' => 'FMaterialId2.FSpecification',
            'comment' => '子项物料规格',
        ],
        'unit_id' => [
            'column' => 'FUnitId2',
            'field' => 'FUnitId2',
            'comment' => '单位',
        ],
        'unit_number' => [
            'column' => 'FUnitId2.FNumber',
            'field' => 'FUnitId2.FNumber',
            'comment' => '单位',
        ],
        'unit_name' => [
            'column' => 'FUnitId2.FName',
            'field' => 'FUnitId2.FName',
            'comment' => '单位',
        ],
        'must_qty' => [
            'column' => 'FMustQty',
            'field' => 'FMustQty',
            'comment' => '应发数量',
        ],
        'picked_qty' => [
            'column' => 'FPickedQty',
            'field' => 'FPickedQty',
            'comment' => '已领数量',
        ],
        'no_picked_qty' => [
            'column' => 'FNoPickedQty',
            'field' => 'FNoPickedQty',
            'comment' => '未领数量',
        ],
        'base_unit_id' => [
            'column' => 'FBaseUnitId1',
            'field' => 'FBaseUnitId1',
            'comment' => '基本单位',
        ],
        'base_unit_number' => [
            'column' => 'FBaseUnitId1.FNumber',
            'field' => 'FBaseUnitId1.FNumber',
            'comment' => '基本单位',
        ],
        'base_unit_name' => [
            'column' => 'FBaseUnitId1.FName',
            'field' => 'FBaseUnitId1.FName',
            'comment' => '基本单位',
        ],
        'base_picked_qty' => [
            'column' => 'FBasePickedQty',
            'field' => 'FBasePickedQty',
            'comment' => '基本单位已领数量',
        ],
        'base_no_picked_qty' => [
            'column' => 'FBaseNoPickedQty',
            'field' => 'FBaseNoPickedQty',
            'comment' => '基本单位未领数量',
        ],
        'owner_type_id' => [
            'column' => 'FOwnerTypeId',
            'field' => 'FOwnerTypeId',
            'comment' => '货主类型',
        ],
        'owner_id' => [
            'column' => 'FOwnerId',
            'field' => 'FOwnerId',
            'comment' => '货主',
        ],
        'owner_number' => [
            'column' => 'FOwnerId.FNumber',
            'field' => 'FOwnerId.FNumber',
            'comment' => '货主',
        ],
        'owner_name' => [
            'column' => 'FOwnerId.FName',
            'field' => 'FOwnerId.FName',
            'comment' => '货主',
        ],
        'is_reviewed' => [
            'column' => 'F_ORA_Checkbox',
            'field' => 'F_ORA_Checkbox',
            'comment' => '是否复核',
        ],
        'review_time' => [
            'column' => 'F_ORA_Datetime',
            'field' => 'F_ORA_Datetime',
            'comment' => '复核时间',
        ],
        'reviewer' => [
            'column' => 'F_ALZ_Text',
            'field' => 'F_ALZ_Text',
            'comment' => '复核人',
        ],
    ];

    /**
     * @return string
     */
    public function getFormId()
    {
        return self::FORM_ID;
    }

    /**
     * @return string
     */
    public function getEntityKeyName()
    {
        return self::ENTITY_KEY_NAME;
    }

    /**
     * @return array
     */
    public function getBillMappings()
    {
        return $this->billMappings;
    }

    /**
     * @return array
     */
    public function getEntryMappings()
    {
        return $this->entryMappings;
    }
}
