<?php

namespace Hzmwelec\Kingdee\Models;

use Hzmwelec\Kingdee\Contracts\Model;

class Inventory extends AbstractModel implements Model
{
    const FORM_ID = 'STK_Inventory';

    /**
     * @var array
     */
    protected $mappings = [
        'id' => [
            'column' => 'FId',
            'field' => 'FId',
            'comment' => '单据内码',
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
        'material_package' => [
            'column' => 'FMaterialId.F_ORA_Text',
            'field' => 'FMaterialId.F_ORA_Text',
            'comment' => '封装',
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
        'base_unit_id' => [
            'column' => 'FBaseUnitId',
            'field' => 'FBaseUnitId',
            'comment' => '基本单位',
        ],
        'base_unit_number' => [
            'column' => 'FBaseUnitId.FNumber',
            'field' => 'FBaseUnitId.FNumber',
            'comment' => '基本单位',
        ],
        'base_unit_name' => [
            'column' => 'FBaseUnitId.FName',
            'field' => 'FBaseUnitId.FName',
            'comment' => '基本单位',
        ],
        'unit_id' => [
            'column' => 'FStockUnitId',
            'field' => 'FStockUnitId',
            'comment' => '主单位',
        ],
        'unit_number' => [
            'column' => 'FStockUnitId.FNumber',
            'field' => 'FStockUnitId.FNumber',
            'comment' => '主单位',
        ],
        'unit_name' => [
            'column' => 'FStockUnitId.FName',
            'field' => 'FStockUnitId.FName',
            'comment' => '主单位',
        ],
        'num' => [
            'column' => 'FMaterialId.FStoreURNum',
            'field' => 'FMaterialId.FStoreURNum',
            'comment' => '分子',
        ],
        'nom' => [
            'column' => 'FMaterialId.FStoreURNom',
            'field' => 'FMaterialId.FStoreURNom',
            'comment' => '分母',
        ],
        'base_qty' => [
            'column' => 'FBaseQty',
            'field' => 'FBaseQty',
            'comment' => '库存量（基本单位）',
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
            'field' => 'FStockLocId.FF100001',
            'comment' => '仓位',
        ],
        'stock_loc_f100001_number' => [
            'column' => 'FStockLocId.FF100001.FNumber',
            'field' => 'FStockLocId.FF100001.FNumber',
            'comment' => '仓位',
        ],
        'stock_loc_f100001_name' => [
            'column' => 'FStockLocId.FF100001.FName',
            'field' => 'FStockLocId.FF100001.FName',
            'comment' => '仓位',
        ],
        'stock_loc_f100002' => [
            'column' => 'FStockLocId.FF100002',
            'field' => 'FStockLocId.FF100002',
            'comment' => '仓位',
        ],
        'stock_loc_f100002_number' => [
            'column' => 'FStockLocId.FF100002.FNumber',
            'field' => 'FStockLocId.FF100002.FNumber',
            'comment' => '仓位',
        ],
        'stock_loc_f100002_name' => [
            'column' => 'FStockLocId.FF100002.FName',
            'field' => 'FStockLocId.FF100002.FName',
            'comment' => '仓位',
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
     * @return array
     */
    public function getMappings()
    {
        return $this->mappings;
    }

    /**
     * @return bool
     */
    public function isIntId()
    {
        return false;
    }
}
