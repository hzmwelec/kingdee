Kingdee
================================

一个针对金蝶 API 的 PHP SDK，提供一个易于使用的接口与金蝶服务交互。

安装
--------------------------------

```sh
composer require hzmwelec/kingdee
```

使用
--------------------------------

1. 分页查询用户

```php
use Hzmwelec\Kingdee\Client;
use Hzmwelec\Kingdee\Query\Builder;
use Hzmwelec\Kingdee\Services\UserService;

$client = new Client($config);
$client->setCache($cache);
$client->setHttp($http);

$service = new UserService($client);
$query = Builder::query()->addFilterLike('name', '刘')->setPage(1)->setPerPage(20);
$paginator = $service->startSession('demo')->paginate($query);
```

2. 保存其他入库单

```php
use Hzmwelec\Kingdee\Flex\StockLocation;
use Hzmwelec\Kingdee\Services\MiscellaneousService;

$service = new MiscellaneousService($client);

$results = $service->startSession('demo')->saveBill([
    'stock_direct' => $data['stock_direct'],
    'date' => date('Y-m-d H:i:s'),
    'stock_org_number' => $data['stock_org_number'],
    'owner_type_id_head' => $data['owner_type_id_head'],
    'owner_number_head' => $data['owner_number_head'],
    'note' => $data['note'],
    'entries' => array_map(function ($entry) {
        return array_merge(
            [
                'material_number' => $entry['material_number'],
                // ...
            ],
            StockLocation::convertNumberStringToArray($entry['stock_loc_number']),
            [
                'lot_number' => $entry['lot_number'],
                // ...
            ]
        );
    }, $data['entries']),
]);
```

3. 下推生产用料清单为领料单

```php
use Hzmwelec\Kingdee\Models\PickMtrl;
use Hzmwelec\Kingdee\Services\PPBomService;

$service = new PPBomService($client);

$results = $service->startSession('demo')->pushBill([
    'entry_ids' => $data['entry_ids'],
    'rule_id' => $config['rule_id'],
    'target_form_id' => PickMtrl::FORM_ID,
    // ...
    'custom_params' => [
        'ppbom_rows' => array_map(function ($row) {
            return [
                'entry_id' => $row['entry_id'],
                // ...
                'inventories' => array_map(function ($inventory) {
                    return [
                        'material_id' => $inventory['material_id'],
                        // ...
                    ];
                }, $row['inventories']),
            ];
        }, $data['rows']),
    ],
]);
```
