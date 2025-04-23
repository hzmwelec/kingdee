<?php

namespace Hzmwelec\Kingdee\Concerns;

use Hzmwelec\Kingdee\Support\ArrayUtil;

trait RemapsFormData
{
    /**
     * @param array $formData
     * @param array $attributesToFieldsMap
     * @return array
     */
    public static function remapFormData($formData, $attributesToFieldsMap)
    {
        $data = array_reduce(array_keys($attributesToFieldsMap), function ($carry, $attribute) use ($formData, $attributesToFieldsMap) {
            if (isset($formData[$attribute])) {
                $carry[$attributesToFieldsMap[$attribute]] = $formData[$attribute];
            }
            return $carry;
        }, []);

        return ArrayUtil::undot($data);
    }
}
