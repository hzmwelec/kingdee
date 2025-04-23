<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\BillModel;

class ReturnMtrl extends AbstractBill implements BillModel
{
    const FORM_ID = 'PRD_ReturnMtrl';

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
        'stock_org_id' => [
            'column' => 'FStockOrgId',
            'field' => 'FStockOrgId',
            'comment' => '生产组织',
        ],
        'stock_org_number' => [
            'column' => 'FStockOrgId.FNumber',
            'field' => 'FStockOrgId.FNumber',
            'comment' => '生产组织',
        ],
        'stock_org_name' => [
            'column' => 'FStockOrgId.FName',
            'field' => 'FStockOrgId.FName',
            'comment' => '生产组织',
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
        'app_qty' => [
            'column' => 'FAppQty',
            'field' => 'FAppQty',
            'comment' => '申请数量',
        ],
        'qty' => [
            'column' => 'FQty',
            'field' => 'FQty',
            'comment' => '实退数量',
        ],
        'return_type' => [
            'column' => 'FReturnType',
            'field' => 'FReturnType',
            'comment' => '退料类型',
        ],
        'stock_id' => [
            'column' => 'FStockId',
            'field' => 'FStockId',
            'comment' => '仓库',
        ],
        'stock_number' => [
            'column' => 'FStockId.FNumber',
            'field' => 'FStockId.FNumber',
            'comment' => '仓库',
        ],
        'stock_name' => [
            'column' => 'FStockId.FName',
            'field' => 'FStockId.FName',
            'comment' => '仓库',
        ],
        'stock_loc_id' => [
            'column' => 'FStockLocId',
            'field' => 'FStockLocId',
            'comment' => '仓位',
        ],
        'stock_loc_f100001' => [
            'column' => 'FStockLocId.FF100001',
            'field' => 'FStockLocId.FStockLocId__FF100001',
            'comment' => '仓位',
        ],
        'stock_loc_f100001_number' => [
            'column' => 'FStockLocId.FF100001.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100001.FNumber',
            'comment' => '仓位',
        ],
        'stock_loc_f100001_name' => [
            'column' => 'FStockLocId.FF100001.FName',
            'field' => 'FStockLocId.FStockLocId__FF100001.FName',
            'comment' => '仓位',
        ],
        'stock_loc_f100002' => [
            'column' => 'FStockLocId.FF100002',
            'field' => 'FStockLocId.FStockLocId__FF100002',
            'comment' => '仓位',
        ],
        'stock_loc_f100002_number' => [
            'column' => 'FStockLocId.FF100002.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100002.FNumber',
            'comment' => '仓位',
        ],
        'stock_loc_f100002_name' => [
            'column' => 'FStockLocId.FF100002.FName',
            'field' => 'FStockLocId.FStockLocId__FF100002.FName',
            'comment' => '仓位',
        ],
        'lot_id' => [
            'column' => 'FLot',
            'field' => 'FLot',
            'comment' => '批号',
        ],
        'lot_number' => [
            'column' => 'FLot.FNumber',
            'field' => 'FLot.FNumber',
            'comment' => '批号',
        ],
        'lot_name' => [
            'column' => 'FLot.FName',
            'field' => 'FLot.FName',
            'comment' => '批号',
        ],
        'src_bill_type' => [
            'column' => 'FSrcBillType',
            'field' => 'FSrcBillType',
            'comment' => '系统源单',
        ],
        'src_bill_id' => [
            'column' => 'FEntrySrcInterId',
            'field' => 'FEntrySrcInterId',
            'comment' => '系统源单',
        ],
        'src_bill_entry_id' => [
            'column' => 'FEntrySrcEnteryId',
            'field' => 'FEntrySrcEnteryId',
            'comment' => '系统源单',
        ],
        'src_bill_number' => [
            'column' => 'FSrcBillNo',
            'field' => 'FSrcBillNo',
            'comment' => '系统源单',
        ],
        'src_bill_seq' => [
            'column' => 'FEntrySrcEntrySeq',
            'field' => 'FEntrySrcEntrySeq',
            'comment' => '系统源单',
        ],
        'ppbom_number' => [
            'column' => 'FPPBomBillNo',
            'field' => 'FPPBomBillNo',
            'comment' => '用料清单',
        ],
        'ppbom_entry_id' => [
            'column' => 'FPPBomEntryId',
            'field' => 'FPPBomEntryId',
            'comment' => '用料清单',
        ],
        'req_bill_id' => [
            'column' => 'FReqBillId',
            'field' => 'FReqBillId',
            'comment' => '需求单据',
        ],
        'req_bill_entry_id' => [
            'column' => 'FReqEntryId',
            'field' => 'FReqEntryId',
            'comment' => '需求单据',
        ],
        'req_bill_number' => [
            'column' => 'FReqBillNo',
            'field' => 'FReqBillNo',
            'comment' => '需求单据',
        ],
        'req_bill_seq' => [
            'column' => 'FReqEntrySeq',
            'field' => 'FReqEntrySeq',
            'comment' => '需求单据',
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
        'base_unit_id' => [
            'column' => 'FBaseUnitId',
            'field' => 'FBaseUnitId',
            'comment' => '单位',
        ],
        'base_unit_number' => [
            'column' => 'FBaseUnitId.FNumber',
            'field' => 'FBaseUnitId.FNumber',
            'comment' => '单位',
        ],
        'base_unit_name' => [
            'column' => 'FBaseUnitId.FName',
            'field' => 'FBaseUnitId.FName',
            'comment' => '单位',
        ],
        'base_app_qty' => [
            'column' => 'FBaseAppQty',
            'field' => 'FBaseAppQty',
            'comment' => '基本单位申请数量',
        ],
        'base_qty' => [
            'column' => 'FBaseQty',
            'field' => 'FBaseQty',
            'comment' => '基本单位实退数量',
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
