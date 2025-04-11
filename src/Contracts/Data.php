<?php

namespace Hzmwelec\Kingdee\Contracts;

use JsonSerializable;

interface Data extends Arrayable, JsonSerializable
{
    /**
     * @param string $key
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
}
