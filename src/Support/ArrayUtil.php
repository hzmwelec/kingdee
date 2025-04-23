<?php

namespace Hzmwelec\Kingdee\Support;

class ArrayUtil
{
    /**
     * @param array $array
     * @param string $prepend
     * @return array
     */
    public static function dot($array, $prepend = '')
    {
        $results = [];

        foreach ($array as $key => $value) {
            if (is_array($value) && !empty($value)) {
                $results = array_merge($results, static::dot($value, $prepend . $key . '.'));
            } else {
                $results[$prepend . $key] = $value;
            }
        }

        return $results;
    }

    /**
     * @param array $array
     * @param string $delimiter
     * @return array
     */
    public static function undot($array, $delimiter = '.')
    {
        $results = [];

        foreach ($array as $key => $value) {
            $target = &$results;

            $keys = $key === '' ? [$key] : explode($delimiter, (string)$key);

            while (count($keys) > 1) {
                $firstkey = array_shift($keys);

                if ($firstkey === '') {
                    if (!isset($target[''])) {
                        $target[''] = [];
                    }

                    $target = &$target[''];
                } else {
                    if (!isset($target[$firstkey]) || !is_array($target[$firstkey])) {
                        $target[$firstkey] = [];
                    }

                    $target = &$target[$firstkey];
                }
            }

            $lastKey = array_shift($keys);

            $target[$lastKey] = $value;

            unset($target);
        }

        return $results;
    }
}
