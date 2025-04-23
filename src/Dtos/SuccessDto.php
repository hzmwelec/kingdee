<?php

namespace Hzmwelec\Kingdee\Dtos;

use Hzmwelec\Kingdee\Contracts\Arrayable;
use JsonSerializable;

class SuccessDto implements Arrayable, JsonSerializable
{
    /**
     * @var array
     */
    protected $data = [
        'id' => 0,
        'number' => '',
    ];

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        $this->setId($data['Id'] ?? 0);
        $this->setNumber($data['Number'] ?? '');
    }

    /**
     * @param array $row
     * @return static
     */
    public static function make($row)
    {
        return new static($row);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->data['id'] = (int) $id;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->data['number'];
    }

    /**
     * @param string $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->data['number'] = (string) $number;
    }

    /**
     * @return bool
     */
    public function isIdEmpty()
    {
        return $this->data['id'] === 0;
    }

    /**
     * @return bool
     */
    public function isNumberEmpty()
    {
        return $this->data['number'] === '';
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
