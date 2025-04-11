<?php

namespace Hzmwelec\Kingdee\Support;

class Arr
{
    /**
     * @param array $data
     * @param string $delimiter
     * @return array
     */
    public static function unflatten($data, $delimiter = '.')
    {
        $result = [];

        foreach ($data as $key => $value) {
            if ($key !== '') {
                $segments = explode($delimiter, $key);

                $target = &$result;

                foreach ($segments as $i => $segment) {
                    if ($i === count($segments) - 1) {
                        $target[$segment] = $value;
                    } else {
                        if (!isset($target[$segment]) || !is_array($target[$segment])) {
                            $target[$segment] = [];
                        }

                        $target = &$target[$segment];
                    }
                }

                unset($target);
            }
        }

        return $result;
    }
}
