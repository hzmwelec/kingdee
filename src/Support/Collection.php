<?php

namespace Hzmwelec\Kingdee\Support;

use Hzmwelec\Kingdee\Contracts\Arrayable;
use Hzmwelec\Kingdee\Contracts\Enumerable;
use JsonSerializable;

class Collection implements Enumerable
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @param array $items
     */
    public function __construct($items = [])
    {
        $this->items = $items;
    }

    /**
     * @param array $items
     * @return static
     */
    public static function make($items = [])
    {
        return new static($items);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @param mixed $default
     * @return mixed
     */
    public function first($default = null)
    {
        return $this->items[0] ?? $default;
    }

    /**
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if ($this->has($key)) {
            return $this->items[$key];
        }

        return $default;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return !$this->isEmpty();
    }

    /**
     * @param mixed $default
     * @return mixed
     */
    public function last($default = null)
    {
        if (empty($this->items)) {
            return $default;
        }

        return $this->items[array_key_last($this->items)];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array_map(function ($item) {
            if ($item instanceof JsonSerializable) {
                return $item->jsonSerialize();
            }

            if ($item instanceof Arrayable) {
                return $item->toArray();
            }

            return $item;
        }, $this->items);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($item) {
            return $item instanceof Arrayable ? $item->toArray() : $item;
        }, $this->items);
    }
}
