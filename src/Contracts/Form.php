<?php

namespace Hzmwelec\Kingdee\Contracts;

interface Form
{
    /**
     * @return string
     */
    public function getFormId();

    /**
     * @return array
     */
    public function getFormData();
}
