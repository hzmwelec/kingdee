<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\BillModel;

class MfgOrder extends AbstractBill implements BillModel
{
    const FORM_ID = 'PRD_MO';

    const ENTITY_KEY_NAME = 'FTreeEntity';

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
        'bill_type_id' => [
            'column' => 'FBillType',
            'field' => 'FBillType',
            'comment' => '单据类型',
        ],
        'bill_type_number' => [
            'column' => 'FBillType.FNumber',
            'field' => 'FBillType.FNumber',
            'comment' => '单据类型',
        ],
        'bill_type_name' => [
            'column' => 'FBillType.FName',
            'field' => 'FBillType.FName',
            'comment' => '单据类型',
        ],
        'date' => [
            'column' => 'FDate',
            'field' => 'FDate',
            'comment' => '日期',
        ],
        'document_status' => [
            'column' => 'FDocumentStatus',
            'field' => 'FDocumentStatus',
            'comment' => '单据状态',
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
        'is_rework' => [
            'column' => 'FIsRework',
            'field' => 'FIsRework',
            'comment' => '是否返工',
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
        'customer_name' => [
            'column' => 'F_ORA_MulLangText',
            'field' => 'F_ORA_MulLangText',
            'comment' => '客户名称',
        ],
        'salesman_name' => [
            'column' => 'F_ORA_MulLangText1',
            'field' => 'F_ORA_MulLangText1',
            'comment' => '销售员名称',
        ],
        'kitting_remark' => [
            'column' => 'F_ORA_Remarks',
            'field' => 'F_ORA_Remarks',
            'comment' => '齐套备注',
        ],
    ];

    /**
     * @var array
     */
    protected $entryMappings = [
        'entry_id' => [
            'column' => 'FTreeEntity_FEntryId',
            'field' => 'FEntryId',
            'comment' => '分录内码',
        ],
        'seq' => [
            'column' => 'FTreeEntity_FSeq',
            'field' => 'FSeq',
            'comment' => '行号',
        ],
        'material_id' => [
            'column' => 'FMaterialId',
            'field' => 'FMaterialId',
            'comment' => '物料',
        ],
        'material_number' => [
            'column' => 'FMaterialId.FNumber',
            'field' => 'FMaterialId.FNumber',
            'comment' => '物料',
        ],
        'material_name' => [
            'column' => 'FMaterialId.FName',
            'field' => 'FMaterialId.FName',
            'comment' => '物料',
        ],
        'material_spec' => [
            'column' => 'FMaterialId.FSpecification',
            'field' => 'FMaterialId.FSpecification',
            'comment' => '规格',
        ],
        'unit_id' => [
            'column' => 'FUnitId',
            'field' => 'FUnitId',
            'comment' => '单位',
        ],
        'unit_number' => [
            'column' => 'FUnitId.FNumber',
            'field' => 'FUnitId.FNumber',
            'comment' => '单位',
        ],
        'unit_name' => [
            'column' => 'FUnitId.FName',
            'field' => 'FUnitId.FName',
            'comment' => '单位',
        ],
        'qty' => [
            'column' => 'FQty',
            'field' => 'FQty',
            'comment' => '数量',
        ],
        'bom_id' => [
            'column' => 'FBomId',
            'field' => 'FBomId',
            'comment' => 'BOM版本',
        ],
        'bom_number' => [
            'column' => 'FBomId.FNumber',
            'field' => 'FBomId.FNumber',
            'comment' => 'BOM版本',
        ],
        'bom_name' => [
            'column' => 'FBomId.FName',
            'field' => 'FBomId.FName',
            'comment' => 'BOM版本',
        ],
        'status' => [
            'column' => 'FStatus',
            'field' => 'FStatus',
            'comment' => '业务状态',
        ],
        'sales_order_number' => [
            'column' => 'FSaleOrderNo',
            'field' => 'FSaleOrderNo',
            'comment' => '需求单据',
        ],
        'sales_order_seq' => [
            'column' => 'FSaleOrderEntrySeq',
            'field' => 'FSaleOrderEntrySeq',
            'comment' => '需求单据行号',
        ],
        'schedule_status' => [
            'column' => 'FScheduleStatus',
            'field' => 'FScheduleStatus',
            'comment' => '排产状态',
        ],
        'pick_mtrl_status' => [
            'column' => 'FPickMtrlStatus',
            'field' => 'FPickMtrlStatus',
            'comment' => '领料状态',
        ],
        'sourcing_options' => [
            'column' => 'F_ORA_Combo',
            'field' => 'F_ORA_Combo',
            'comment' => '供料方式',
        ],
        'ready_status' => [
            'column' => 'FBillStatus1',
            'field' => 'FBillStatus1',
            'comment' => '符合投产状态',
        ],
        'kitting_status' => [
            'column' => 'FBillStatus3',
            'field' => 'FBillStatus3',
            'comment' => '物料齐套状态',
        ],
        'smt_start_qty' => [
            'column' => 'F_ORA_Qty',
            'field' => 'F_ORA_Qty',
            'comment' => 'SMT开工数量',
        ],
        'smt_test_qty' => [
            'column' => 'F_ORA_Qty1',
            'field' => 'F_ORA_Qty1',
            'comment' => 'SMT检测数量',
        ],
        'smt_end_qty' => [
            'column' => 'F_ORA_Qty2',
            'field' => 'F_ORA_Qty2',
            'comment' => 'SMT结束数量',
        ],
        'dip_start_qty' => [
            'column' => 'F_ORA_Qty3',
            'field' => 'F_ORA_Qty3',
            'comment' => 'DIP开工数量',
        ],
        'pkg_start_qty' => [
            'column' => 'F_ORA_Qty4',
            'field' => 'F_ORA_Qty4',
            'comment' => '包装接收数量',
        ],
        'defect_qty' => [
            'column' => 'F_ORA_Qty5',
            'field' => 'F_ORA_Qty5',
            'comment' => '不良数量',
        ],
        'fail_qty' => [
            'column' => 'F_ORA_Qty6',
            'field' => 'F_ORA_Qty6',
            'comment' => '报废数量',
        ],
        'ready_date' => [
            'column' => 'F_ORA_Datetime',
            'field' => 'F_ORA_Datetime',
            'comment' => '符合投产时间',
        ],
        'smt_count' => [
            'column' => 'F_ORA_BaseProperty2',
            'field' => 'F_ORA_BaseProperty2',
            'comment' => 'SMT焊点数',
        ],
        'dip_count' => [
            'column' => 'F_ORA_BaseProperty3',
            'field' => 'F_ORA_BaseProperty3',
            'comment' => 'DIP焊点数',
        ],
        'smt_start_date' => [
            'column' => 'F_ORA_Datetime2',
            'field' => 'F_ORA_Datetime2',
            'comment' => 'SMT开工时间',
        ],
        'smt_test_date' => [
            'column' => 'F_ORA_Datetime3',
            'field' => 'F_ORA_Datetime3',
            'comment' => 'SMT检测时间',
        ],
        'smt_end_date' => [
            'column' => 'F_ORA_Datetime6',
            'field' => 'F_ORA_Datetime6',
            'comment' => 'SMT结束时间',
        ],
        'dip_start_date' => [
            'column' => 'F_ORA_Datetime1',
            'field' => 'F_ORA_Datetime1',
            'comment' => 'DIP开工时间',
        ],
        'pkg_start_date' => [
            'column' => 'F_ORA_Datetime4',
            'field' => 'F_ORA_Datetime4',
            'comment' => '包装接收时间',
        ],
        'delivery_date' => [
            'column' => 'F_ORA_Datetime5',
            'field' => 'F_ORA_Datetime5',
            'comment' => '要货日期',
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
