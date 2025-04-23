<?php

namespace Hzmwelec\Kingdee\Flex;

class StockLocation
{
    /**
     * @var string
     */
    protected static $prefix = 'stock_loc';

    /**
     * @var string
     */
    protected static $number = 'number';

    /**
     * @var string
     */
    protected static $name = 'name';

    /**
     * @var array
     */
    protected static $flexIds = ['f100001', 'f100002'];

    /**
     * @param string $flexId
     * @param string $type
     * @return string
     */
    protected static function buildKey($flexId, $type)
    {
        return static::$prefix . '_' . $flexId . '_' . $type;
    }

    /**
     * @param string $string
     * @param string $type
     * @return array
     */
    protected static function convertToArray($string, $type)
    {
        $values = array_filter(explode('.', $string));

        return array_reduce(static::$flexIds, function ($carry, $flexId) use (&$values, $type) {
            $key = static::buildKey($flexId, $type);
            $value = array_shift($values) ?? null;
            $carry[$key] = $value;
            return $carry;
        }, []);
    }

    /**
     * @param array|\ArrayAccess $array
     * @param string $type
     * @return string
     */
    protected static function convertToString($array, $type)
    {
        $values = array_map(function ($flexId) use ($array, $type) {
            $key = static::buildKey($flexId, $type);
            return $array[$key] ?? null;
        }, static::$flexIds);

        return implode('.', array_filter($values));
    }

    /**
     * @param string $nameString
     * @return array
     */
    public static function convertNameStringToArray($nameString)
    {
        return static::convertToArray($nameString, static::$name);
    }

    /**
     * @param string $numberString
     * @return array
     */
    public static function convertNumberStringToArray($numberString)
    {
        return static::convertToArray($numberString, static::$number);
    }

    /**
     * @param array|\ArrayAccess $nameArray
     * @return string
     */
    public static function convertNameArrayToString($nameArray)
    {
        return static::convertToString($nameArray, static::$name);
    }

    /**
     * @param array|\ArrayAccess $numberArray
     * @return string
     */
    public static function convertNumberArrayToString($numberArray)
    {
        return static::convertToString($numberArray, static::$number);
    }
}
