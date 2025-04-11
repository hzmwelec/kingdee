<?php

namespace Hzmwelec\Kingdee\Data;

use Hzmwelec\Kingdee\Contracts\Data;

class SuccessData extends AbstractData implements Data
{
    /**
     * @var array
     */
    protected $data = [
        'id' => 0,
        'number' => '',
    ];

    /**
     * @param array $rawRow
     */
    public function __construct($rawRow)
    {
        $this->data['id'] = (int) ($rawRow['Id'] ?? 0);
        $this->data['number'] = (string) ($rawRow['Number'] ?? '');
    }

    /**
     * @param array $rawRow
     * @return static
     */
    public static function make($rawRow)
    {
        return new static($rawRow);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->data['number'];
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
