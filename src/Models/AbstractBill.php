<?php

namespace Hzmwelec\Kingdee\Models;

abstract class AbstractBill extends AbstractModel
{
    /**
     * @return array
     */
    abstract public function getBillMappings();

    /**
     * @return array
     */
    abstract public function getEntryMappings();

    /**
     * @return array
     */
    public function getMappings()
    {
        return array_merge(
            $this->getBillMappings(),
            $this->getEntryMappings()
        );
    }

    /**
     * @return string
     */
    public function getEntryIdName()
    {
        return 'entry_id';
    }

    /**
     * @return array
     */
    public function getBillAttributes()
    {
        return array_keys($this->getBillMappings());
    }

    /**
     * @return array
     */
    public function getEntryAttributes()
    {
        return array_keys($this->getEntryMappings());
    }

    /**
     * @return array
     */
    public function getBillColumns()
    {
        return array_column($this->getBillMappings(), 'column');
    }

    /**
     * @return array
     */
    public function getEntryColumns()
    {
        return array_column($this->getEntryMappings(), 'column');
    }

    /**
     * @return array
     */
    public function getBillFields()
    {
        return array_column($this->getBillMappings(), 'field');
    }

    /**
     * @return array
     */
    public function getEntryFields()
    {
        return array_column($this->getEntryMappings(), 'field');
    }

    /**
     * @return array
     */
    public function mapBillAttributesToColumns()
    {
        return array_combine(
            $this->getBillAttributes(),
            $this->getBillColumns()
        );
    }

    /**
     * @return array
     */
    public function mapEntryAttributesToColumns()
    {
        return array_combine(
            $this->getEntryAttributes(),
            $this->getEntryColumns()
        );
    }

    /**
     * @return array
     */
    public function mapBillAttributesToFields()
    {
        return array_combine(
            $this->getBillAttributes(),
            $this->getBillFields()
        );
    }

    /**
     * @return array
     */
    public function mapEntryAttributesToFields()
    {
        return array_combine(
            $this->getEntryAttributes(),
            $this->getEntryFields()
        );
    }
}
