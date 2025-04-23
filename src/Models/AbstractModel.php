<?php

namespace Hzmwelec\Kingdee\Models;

abstract class AbstractModel
{
    /**
     * @return array
     */
    abstract public function getMappings();

    /**
     * @return string
     */
    public function getIdName()
    {
        return 'id';
    }

    /**
     * @return bool
     */
    public function isIntId()
    {
        return true;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return array_keys($this->getMappings());
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return array_column($this->getMappings(), 'column');
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return array_column($this->getMappings(), 'field');
    }

    /**
     * @return array
     */
    public function mapAttributesToColumns()
    {
        return array_combine(
            $this->getAttributes(),
            $this->getColumns()
        );
    }

    /**
     * @return array
     */
    public function mapAttributesToFields()
    {
        return array_combine(
            $this->getAttributes(),
            $this->getFields()
        );
    }
}
