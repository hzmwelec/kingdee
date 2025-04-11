<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\Bill;

class DeliveryNotice extends AbstractBill implements Bill
{
    const FORM_ID = 'SAL_DeliveryNotice';

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
        'date' => [
            'column' => 'FDate',
            'field' => 'FDate',
            'comment' => '日期',
        ],
        'sales_org_id' => [
            'column' => 'FSaleOrgId',
            'field' => 'FSaleOrgId',
            'comment' => '销售组织',
        ],
        'sales_org_number' => [
            'column' => 'FSaleOrgId.FNumber',
            'field' => 'FSaleOrgId.FNumber',
            'comment' => '销售组织',
        ],
        'sales_org_name' => [
            'column' => 'FSaleOrgId.FName',
            'field' => 'FSaleOrgId.FName',
            'comment' => '销售组织',
        ],
        'customer_id' => [
            'column' => 'FCustomerId',
            'field' => 'FCustomerId',
            'comment' => '客户',
        ],
        'customer_number' => [
            'column' => 'FCustomerId.FNumber',
            'field' => 'FCustomerId.FNumber',
            'comment' => '客户',
        ],
        'customer_name' => [
            'column' => 'FCustomerId.FName',
            'field' => 'FCustomerId.FName',
            'comment' => '客户',
        ],
        'business_type' => [
            'column' => 'FBussinessType',
            'field' => 'FBussinessType',
            'comment' => '业务类型',
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
            'comment' => '数量',
        ],
        'stock_id' => [
            'column' => 'FStockId',
            'field' => 'FStockId',
            'comment' => '出货仓库',
        ],
        'stock_number' => [
            'column' => 'FStockId.FNumber',
            'field' => 'FStockId.FNumber',
            'comment' => '出货仓库',
        ],
        'stock_name' => [
            'column' => 'FStockId.FName',
            'field' => 'FStockId.FName',
            'comment' => '出货仓库',
        ],
        'stock_loc_id' => [
            'column' => 'FStockLocId',
            'field' => 'FStockLocId',
            'comment' => '出货仓位',
        ],
        'stock_loc_f100001' => [
            'column' => 'FStockLocId.FF100001',
            'field' => 'FStockLocId.FStockLocId__FF100001',
            'comment' => '出货仓位',
        ],
        'stock_loc_f100001_number' => [
            'column' => 'FStockLocId.FF100001.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100001.FNumber',
            'comment' => '出货仓位',
        ],
        'stock_loc_f100001_name' => [
            'column' => 'FStockLocId.FF100001.FName',
            'field' => 'FStockLocId.FStockLocId__FF100001.FName',
            'comment' => '出货仓位',
        ],
        'stock_loc_f100002' => [
            'column' => 'FStockLocId.FF100002',
            'field' => 'FStockLocId.FStockLocId__FF100002',
            'comment' => '出货仓位',
        ],
        'stock_loc_f100002_number' => [
            'column' => 'FStockLocId.FF100002.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100002.FNumber',
            'comment' => '出货仓位',
        ],
        'stock_loc_f100002_name' => [
            'column' => 'FStockLocId.FF100002.FName',
            'field' => 'FStockLocId.FStockLocId__FF100002.FName',
            'comment' => '出货仓位',
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
        'order_number' => [
            'column' => 'FOrderNo',
            'field' => 'FOrderNo',
            'comment' => '订单单号',
        ],
        'order_seq' => [
            'column' => 'FOrderSeq',
            'field' => 'FOrderSeq',
            'comment' => '订单行号',
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
