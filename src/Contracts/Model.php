<?php

namespace Hzmwelec\Kingdee\Contracts;

interface Model
{
    /**
     * @return string
     */
    public function getFormId();

    /**
     * @return string
     */
    public function getIdName();

    /**
     * @return bool
     */
    public function isIntId();

    /**
     * @return array
     */
    public function getAttributes();

    /**
     * @return array
     */
    public function mapAttributesToColumns();

    /**
     * @return array
     */
    public function mapAttributesToFields();
}
