<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\BillModel;

class Miscellaneous extends AbstractBill implements BillModel
{
    const FORM_ID = 'STK_Miscellaneous';

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
            'column' => 'FBillTypeId',
            'field' => 'FBillTypeId',
            'comment' => '单据类型',
        ],
        'bill_type_number' => [
            'column' => 'FBillTypeId.FNumber',
            'field' => 'FBillTypeId.FNumber',
            'comment' => '单据类型',
        ],
        'bill_type_name' => [
            'column' => 'FBillTypeId.FName',
            'field' => 'FBillTypeId.FName',
            'comment' => '单据类型',
        ],
        'stock_org_id' => [
            'column' => 'FStockOrgId',
            'field' => 'FStockOrgId',
            'comment' => '库存组织',
        ],
        'stock_org_number' => [
            'column' => 'FStockOrgId.FNumber',
            'field' => 'FStockOrgId.FNumber',
            'comment' => '库存组织',
        ],
        'stock_org_name' => [
            'column' => 'FStockOrgId.FName',
            'field' => 'FStockOrgId.FName',
            'comment' => '库存组织',
        ],
        'stock_direct' => [
            'column' => 'FStockDirect',
            'field' => 'FStockDirect',
            'comment' => '库存方向',
        ],
        'date' => [
            'column' => 'FDate',
            'field' => 'FDate',
            'comment' => '日期',
        ],
        'owner_type_id_head' => [
            'column' => 'FOwnerTypeIdHead',
            'field' => 'FOwnerTypeIdHead',
            'comment' => '货主类型',
        ],
        'owner_id_head' => [
            'column' => 'FOwnerIdHead',
            'field' => 'FOwnerIdHead',
            'comment' => '货主',
        ],
        'owner_number_head' => [
            'column' => 'FOwnerIdHead.FNumber',
            'field' => 'FOwnerIdHead.FNumber',
            'comment' => '货主',
        ],
        'owner_name_head' => [
            'column' => 'FOwnerIdHead.FName',
            'field' => 'FOwnerIdHead.FName',
            'comment' => '货主',
        ],
        'document_status' => [
            'column' => 'FDocumentStatus',
            'field' => 'FDocumentStatus',
            'comment' => '单据状态',
        ],
        'note' => [
            'column' => 'FNote',
            'field' => 'FNote',
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
        'qty' => [
            'column' => 'FQty',
            'field' => 'FQty',
            'comment' => '实收数量',
        ],
        'stock_id' => [
            'column' => 'FStockId',
            'field' => 'FStockId',
            'comment' => '收货仓库',
        ],
        'stock_number' => [
            'column' => 'FStockId.FNumber',
            'field' => 'FStockId.FNumber',
            'comment' => '收货仓库',
        ],
        'stock_name' => [
            'column' => 'FStockId.FName',
            'field' => 'FStockId.FName',
            'comment' => '收货仓库',
        ],
        'stock_loc_id' => [
            'column' => 'FStockLocId',
            'field' => 'FStockLocId',
            'comment' => '收货仓位',
        ],
        'stock_loc_f100001' => [
            'column' => 'FStockLocId.FF100001',
            'field' => 'FStockLocId.FStockLocId__FF100001',
            'comment' => '收货仓位',
        ],
        'stock_loc_f100001_number' => [
            'column' => 'FStockLocId.FF100001.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100001.FNumber',
            'comment' => '收货仓位',
        ],
        'stock_loc_f100001_name' => [
            'column' => 'FStockLocId.FF100001.FName',
            'field' => 'FStockLocId.FStockLocId__FF100001.FName',
            'comment' => '收货仓位',
        ],
        'stock_loc_f100002' => [
            'column' => 'FStockLocId.FF100002',
            'field' => 'FStockLocId.FStockLocId__FF100002',
            'comment' => '收货仓位',
        ],
        'stock_loc_f100002_number' => [
            'column' => 'FStockLocId.FF100002.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100002.FNumber',
            'comment' => '收货仓位',
        ],
        'stock_loc_f100002_name' => [
            'column' => 'FStockLocId.FF100002.FName',
            'field' => 'FStockLocId.FStockLocId__FF100002.FName',
            'comment' => '收货仓位',
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
            'column' => 'FSrcBillTypeId',
            'field' => 'FSrcBillTypeId',
            'comment' => '源单类型',
        ],
        'src_bill_number' => [
            'column' => 'FSrcBillNo',
            'field' => 'FSrcBillNo',
            'comment' => '源单单号',
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
        'keeper_type_id' => [
            'column' => 'FKeeperTypeId',
            'field' => 'FKeeperTypeId',
            'comment' => '保管者类型',
        ],
        'keeper_id' => [
            'column' => 'FKeeperId',
            'field' => 'FKeeperId',
            'comment' => '保管者',
        ],
        'keeper_number' => [
            'column' => 'FKeeperId.FNumber',
            'field' => 'FKeeperId.FNumber',
            'comment' => '保管者',
        ],
        'keeper_name' => [
            'column' => 'FKeeperId.FName',
            'field' => 'FKeeperId.FName',
            'comment' => '保管者',
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
