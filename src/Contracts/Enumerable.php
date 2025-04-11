<?php

namespace Hzmwelec\Kingdee\Contracts;

use Countable;
use JsonSerializable;

interface Enumerable extends Arrayable, Countable, JsonSerializable
{
    /**
     * @return array
     */
    public function all();

    /**
     * @param mixed $default
     * @return mixed
     */
    public function first($default = null);

    /**
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param string $key
     * @return bool
     */
    public function has($key);

    /**
     * @return bool
     */
    public function isEmpty();

    /**
     * @return bool
     */
    public function isNotEmpty();

    /**
     * @param mixed $default
     * @return mixed
     */
    public function last($default = null);
}
