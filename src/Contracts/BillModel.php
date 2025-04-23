<?php

namespace Hzmwelec\Kingdee\Contracts;

interface BillModel extends Model
{
    /**
     * @return string
     */
    public function getEntityKeyName();

    /**
     * @return string
     */
    public function getEntryIdName();

    /**
     * @return array
     */
    public function getBillAttributes();

    /**
     * @return array
     */
    public function getEntryAttributes();

    /**
     * @return array
     */
    public function getBillColumns();

    /**
     * @return array
     */
    public function getEntryColumns();

    /**
     * @return array
     */
    public function getBillFields();

    /**
     * @return array
     */
    public function getEntryFields();

    /**
     * @return array
     */
    public function mapBillAttributesToColumns();

    /**
     * @return array
     */
    public function mapEntryAttributesToColumns();

    /**
     * @return array
     */
    public function mapBillAttributesToFields();

    /**
     * @return array
     */
    public function mapEntryAttributesToFields();
}
