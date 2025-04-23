<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\BillModel;

class TransferDirect extends AbstractBill implements BillModel
{
    const FORM_ID = 'STK_TransferDirect';

    const ENTITY_KEY_NAME = 'FBillEntry';

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
        'biz_type' => [
            'column' => 'FBizType',
            'field' => 'FBizType',
            'comment' => '业务类型',
        ],
        'transfer_direct' => [
            'column' => 'FTransferDirect',
            'field' => 'FTransferDirect',
            'comment' => '调拨方向',
        ],
        'transfer_biz_type' => [
            'column' => 'FTransferBizType',
            'field' => 'FTransferBizType',
            'comment' => '调拨类型',
        ],
        'stock_out_org_id' => [
            'column' => 'FStockOutOrgId',
            'field' => 'FStockOutOrgId',
            'comment' => '调出库存组织',
        ],
        'stock_out_org_number' => [
            'column' => 'FStockOutOrgId.FNumber',
            'field' => 'FStockOutOrgId.FNumber',
            'comment' => '调出库存组织',
        ],
        'stock_out_org_name' => [
            'column' => 'FStockOutOrgId.FName',
            'field' => 'FStockOutOrgId.FName',
            'comment' => '调出库存组织',
        ],
        'owner_type_out_id_head' => [
            'column' => 'FOwnerTypeOutIdHead',
            'field' => 'FOwnerTypeOutIdHead',
            'comment' => '调出货主类型',
        ],
        'owner_out_id_head' => [
            'column' => 'FOwnerOutIdHead',
            'field' => 'FOwnerOutIdHead',
            'comment' => '调出货主',
        ],
        'owner_out_number_head' => [
            'column' => 'FOwnerOutIdHead.FNumber',
            'field' => 'FOwnerOutIdHead.FNumber',
            'comment' => '调出货主',
        ],
        'owner_out_name_head' => [
            'column' => 'FOwnerOutIdHead.FName',
            'field' => 'FOwnerOutIdHead.FName',
            'comment' => '调出货主',
        ],
        'stock_org_id' => [
            'column' => 'FStockOrgId',
            'field' => 'FStockOrgId',
            'comment' => '调入库存组织',
        ],
        'stock_org_number' => [
            'column' => 'FStockOrgId.FNumber',
            'field' => 'FStockOrgId.FNumber',
            'comment' => '调入库存组织',
        ],
        'stock_org_name' => [
            'column' => 'FStockOrgId.FName',
            'field' => 'FStockOrgId.FName',
            'comment' => '调入库存组织',
        ],
        'owner_type_id_head' => [
            'column' => 'FOwnerTypeIdHead',
            'field' => 'FOwnerTypeIdHead',
            'comment' => '调入货主类型',
        ],
        'owner_id_head' => [
            'column' => 'FOwnerIdHead',
            'field' => 'FOwnerIdHead',
            'comment' => '调入货主',
        ],
        'owner_number_head' => [
            'column' => 'FOwnerIdHead.FNumber',
            'field' => 'FOwnerIdHead.FNumber',
            'comment' => '调入货主',
        ],
        'owner_name_head' => [
            'column' => 'FOwnerIdHead.FName',
            'field' => 'FOwnerIdHead.FName',
            'comment' => '调入货主',
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
        'note' => [
            'column' => 'FNote',
            'field' => 'FNote',
            'comment' => '备注',
        ],
    ];

    /**
     * @var array
     */
    protected $entryMappings = [
        'entry_id' => [
            'column' => 'FBillEntry_FEntryId',
            'field' => 'FEntryId',
            'comment' => '分录内码',
        ],
        'seq' => [
            'column' => 'FBillEntry_FSeq',
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
            'comment' => '调拨数量',
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
        'src_stock_id' => [
            'column' => 'FSrcStockId',
            'field' => 'FSrcStockId',
            'comment' => '源仓库',
        ],
        'src_stock_number' => [
            'column' => 'FSrcStockId.FNumber',
            'field' => 'FSrcStockId.FNumber',
            'comment' => '源仓库',
        ],
        'src_stock_name' => [
            'column' => 'FSrcStockId.FName',
            'field' => 'FSrcStockId.FName',
            'comment' => '源仓库',
        ],
        'src_stock_loc_id' => [
            'column' => 'FSrcStockLocId',
            'field' => 'FSrcStockLocId',
            'comment' => '源仓位',
        ],
        'src_stock_loc_f100001' => [
            'column' => 'FSrcStockLocId.FF100001',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100001',
            'comment' => '源仓位',
        ],
        'src_stock_loc_f100001_number' => [
            'column' => 'FSrcStockLocId.FF100001.FNumber',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100001.FNumber',
            'comment' => '源仓位',
        ],
        'src_stock_loc_f100001_name' => [
            'column' => 'FSrcStockLocId.FF100001.FName',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100001.FName',
            'comment' => '源仓位',
        ],
        'src_stock_loc_f100002' => [
            'column' => 'FSrcStockLocId.FF100002',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100002',
            'comment' => '源仓位',
        ],
        'src_stock_loc_f100002_number' => [
            'column' => 'FSrcStockLocId.FF100002.FNumber',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100002.FNumber',
            'comment' => '源仓位',
        ],
        'src_stock_loc_f100002_name' => [
            'column' => 'FSrcStockLocId.FF100002.FName',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100002.FName',
            'comment' => '源仓位',
        ],
        'dest_stock_id' => [
            'column' => 'FDestStockId',
            'field' => 'FDestStockId',
            'comment' => '目标仓库',
        ],
        'dest_stock_number' => [
            'column' => 'FDestStockId.FNumber',
            'field' => 'FDestStockId.FNumber',
            'comment' => '目标仓库',
        ],
        'dest_stock_name' => [
            'column' => 'FDestStockId.FName',
            'field' => 'FDestStockId.FName',
            'comment' => '目标仓库',
        ],
        'dest_stock_loc_id' => [
            'column' => 'FDestStockLocId',
            'field' => 'FDestStockLocId',
            'comment' => '目标仓位',
        ],
        'dest_stock_loc_f100001' => [
            'column' => 'FDestStockLocId.FF100001',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100001',
            'comment' => '目标仓位',
        ],
        'dest_stock_loc_f100001_number' => [
            'column' => 'FDestStockLocId.FF100001.FNumber',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100001.FNumber',
            'comment' => '目标仓位',
        ],
        'dest_stock_loc_f100001_name' => [
            'column' => 'FDestStockLocId.FF100001.FName',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100001.FName',
            'comment' => '目标仓位',
        ],
        'dest_stock_loc_f100002' => [
            'column' => 'FDestStockLocId.FF100002',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100002',
            'comment' => '目标仓位',
        ],
        'dest_stock_loc_f100002_number' => [
            'column' => 'FDestStockLocId.FF100002.FNumber',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100002.FNumber',
            'comment' => '目标仓位',
        ],
        'dest_stock_loc_f100002_name' => [
            'column' => 'FDestStockLocId.FF100002.FName',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100002.FName',
            'comment' => '目标仓位',
        ],
        'owner_type_out_id' => [
            'column' => 'FOwnerTypeOutId',
            'field' => 'FOwnerTypeOutId',
            'comment' => '调出货主类型',
        ],
        'owner_out_id' => [
            'column' => 'FOwnerOutId',
            'field' => 'FOwnerOutId',
            'comment' => '调出货主',
        ],
        'owner_out_number' => [
            'column' => 'FOwnerOutId.FNumber',
            'field' => 'FOwnerOutId.FNumber',
            'comment' => '调出货主',
        ],
        'owner_out_name' => [
            'column' => 'FOwnerOutId.FName',
            'field' => 'FOwnerOutId.FName',
            'comment' => '调出货主',
        ],
        'owner_type_id' => [
            'column' => 'FOwnerTypeId',
            'field' => 'FOwnerTypeId',
            'comment' => '调入货主类型',
        ],
        'owner_id' => [
            'column' => 'FOwnerId',
            'field' => 'FOwnerId',
            'comment' => '调入货主',
        ],
        'owner_number' => [
            'column' => 'FOwnerId.FNumber',
            'field' => 'FOwnerId.FNumber',
            'comment' => '调入货主',
        ],
        'owner_name' => [
            'column' => 'FOwnerId.FName',
            'field' => 'FOwnerId.FName',
            'comment' => '调入货主',
        ],
        'keeper_type_id' => [
            'column' => 'FKeeperTypeId',
            'field' => 'FKeeperTypeId',
            'comment' => '调入保管者类型',
        ],
        'keeper_id' => [
            'column' => 'FKeeperId',
            'field' => 'FKeeperId',
            'comment' => '调入保管者',
        ],
        'keeper_number' => [
            'column' => 'FKeeperId.FNumber',
            'field' => 'FKeeperId.FNumber',
            'comment' => '调入保管者',
        ],
        'keeper_name' => [
            'column' => 'FKeeperId.FName',
            'field' => 'FKeeperId.FName',
            'comment' => '调入保管者',
        ],
        'keeper_type_out_id' => [
            'column' => 'FKeeperTypeOutId',
            'field' => 'FKeeperTypeOutId',
            'comment' => '调出保管者类型',
        ],
        'keeper_out_id' => [
            'column' => 'FKeeperOutId',
            'field' => 'FKeeperOutId',
            'comment' => '调出保管者',
        ],
        'keeper_out_number' => [
            'column' => 'FKeeperOutId.FNumber',
            'field' => 'FKeeperOutId.FNumber',
            'comment' => '调出保管者',
        ],
        'keeper_out_name' => [
            'column' => 'FKeeperOutId.FName',
            'field' => 'FKeeperOutId.FName',
            'comment' => '调出保管者',
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
