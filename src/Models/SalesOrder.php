<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\BillModel;

class SalesOrder extends AbstractBill implements BillModel
{
    const FORM_ID = 'SAL_SaleOrder';

    const ENTITY_KEY_NAME = 'FSaleOrderEntry';

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
        'document_status' => [
            'column' => 'FDocumentStatus',
            'field' => 'FDocumentStatus',
            'comment' => '单据状态',
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
            'column' => 'FCustId',
            'field' => 'FCustId',
            'comment' => '客户',
        ],
        'customer_number' => [
            'column' => 'FCustId.FNumber',
            'field' => 'FCustId.FNumber',
            'comment' => '客户',
        ],
        'customer_name' => [
            'column' => 'FCustId.FName',
            'field' => 'FCustId.FName',
            'comment' => '客户',
        ],
        'receive_id' => [
            'column' => 'FReceiveId',
            'field' => 'FReceiveId',
            'comment' => '收货方',
        ],
        'receive_number' => [
            'column' => 'FReceiveId.FNumber',
            'field' => 'FReceiveId.FNumber',
            'comment' => '收货方',
        ],
        'receive_name' => [
            'column' => 'FReceiveId.FName',
            'field' => 'FReceiveId.FName',
            'comment' => '收货方',
        ],
        'head_loc_id' => [
            'column' => 'FHeadLocId',
            'field' => 'FHeadLocId',
            'comment' => '交货地点',
        ],
        'head_loc_number' => [
            'column' => 'FHeadLocId.FNumber',
            'field' => 'FHeadLocId.FNumber',
            'comment' => '交货地点',
        ],
        'head_loc_name' => [
            'column' => 'FHeadLocId.FName',
            'field' => 'FHeadLocId.FName',
            'comment' => '交货地点',
        ],
        'sales_man_id' => [
            'column' => 'FSalerId',
            'field' => 'FSalerId',
            'comment' => '销售员',
        ],
        'sales_man_number' => [
            'column' => 'FSalerId.FNumber',
            'field' => 'FSalerId.FNumber',
            'comment' => '销售员',
        ],
        'sales_man_name' => [
            'column' => 'FSalerId.FName',
            'field' => 'FSalerId.FName',
            'comment' => '销售员',
        ],
        'receive_address' => [
            'column' => 'FReceiveAddress',
            'field' => 'FReceiveAddress',
            'comment' => '收货方地址',
        ],
        'link_man' => [
            'column' => 'FLinkMan',
            'field' => 'FLinkMan',
            'comment' => '收货人姓名',
        ],
        'link_phone' => [
            'column' => 'FLinkPhone',
            'field' => 'FLinkPhone',
            'comment' => '收货人电话',
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
            'column' => 'FSaleOrderEntry_FEntryId',
            'field' => 'FEntryId',
            'comment' => '分录内码',
        ],
        'seq' => [
            'column' => 'FSaleOrderEntry_FSeq',
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
            'comment' => '销售数量',
        ],
        'base_unit_qty' => [
            'column' => 'FBaseUnitQty',
            'field' => 'FBaseUnitQty',
            'comment' => '基本单位销售数量',
        ],
        'delivery_date' => [
            'column' => 'FDeliveryDate',
            'field' => 'FDeliveryDate',
            'comment' => '要货日期',
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
        'delivery_status' => [
            'column' => 'FDeliveryStatus',
            'field' => 'FDeliveryStatus',
            'comment' => '发货状态',
        ],
        'can_out_qty' => [
            'column' => 'FCanOutQty',
            'field' => 'FCanOutQty',
            'comment' => '可出数量',
        ],
        'base_can_out_qty' => [
            'column' => 'FBaseCanOutQty',
            'field' => 'FBaseCanOutQty',
            'comment' => '基本单位可出数量',
        ],
        'remain_out_qty' => [
            'column' => 'FRemainOutQty',
            'field' => 'FRemainOutQty',
            'comment' => '剩余未出数量',
        ],
        'base_remain_out_qty' => [
            'column' => 'FBaseRemainOutQty',
            'field' => 'FBaseRemainOutQty',
            'comment' => '基本单位剩余未出数量',
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
