<?php

namespace Hzmwelec\Kingdee\Dtos;

use ArrayAccess;
use Hzmwelec\Kingdee\Concerns\CombinesAttributes;
use Hzmwelec\Kingdee\Contracts\Arrayable;
use Hzmwelec\Kingdee\Contracts\Emptiable;
use JsonSerializable;

class EntityDto implements Arrayable, ArrayAccess, Emptiable, JsonSerializable
{
    use CombinesAttributes;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @param array $row
     * @return static
     */
    public static function make($model, $row)
    {
        if (empty($row)) {
            return new static();
        }

        $combinedRow = static::combineAttributes($row, $model->getAttributes());

        return new static($combinedRow);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return void
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->data);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
