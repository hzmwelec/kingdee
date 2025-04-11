<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Forms\BillEntryFirstForm;
use Hzmwelec\Kingdee\Forms\BillFirstForm;
use Hzmwelec\Kingdee\Forms\BillQueryForm;
use Hzmwelec\Kingdee\Forms\BillCountForm;
use Hzmwelec\Kingdee\Forms\BillDraftForm;
use Hzmwelec\Kingdee\Forms\BillEntryCountForm;
use Hzmwelec\Kingdee\Forms\BillEntryPaginateForm;
use Hzmwelec\Kingdee\Forms\BillEntryQueryForm;
use Hzmwelec\Kingdee\Forms\BillPaginateForm;
use Hzmwelec\Kingdee\Forms\BillPushForm;
use Hzmwelec\Kingdee\Forms\BillSaveForm;
use Hzmwelec\Kingdee\Forms\OperationAuditForm;
use Hzmwelec\Kingdee\Forms\OperationDeleteForm;
use Hzmwelec\Kingdee\Forms\OperationSubmitForm;
use Hzmwelec\Kingdee\Forms\OperationUnauditForm;
use Hzmwelec\Kingdee\Pagination\Paginator;
use Hzmwelec\Kingdee\Support\Collection;

abstract class AbstractBillService extends AbstractService
{
    /**
     * @return \Hzmwelec\Kingdee\Contracts\Bill
     */
    abstract protected function newBill();

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Support\Collection
     */
    public function getBills($query = null)
    {
        $bill = $this->newBill();

        $queryForm = BillQueryForm::make($bill, $query);

        return $this->sendQuery($queryForm)->toBillCollection($bill);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Support\Collection
     */
    public function getBillEntries($query = null)
    {
        $bill = $this->newBill();

        $queryForm = BillEntryQueryForm::make($bill, $query);

        return $this->sendQuery($queryForm)->toBillEntryCollection($bill);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Data\BillEntity|null
     */
    public function firstBill($query = null)
    {
        $bill = $this->newBill();

        $firstForm = BillFirstForm::make($bill, $query);

        return $this->sendQuery($firstForm)->toBillEntity($bill);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Data\BillEntryData|null
     */
    public function firstBillEntry($query = null)
    {
        $bill = $this->newBill();

        $firstForm = BillEntryFirstForm::make($bill, $query);

        return $this->sendQuery($firstForm)->toBillEntryData($bill);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Pagination\Paginator
     */
    public function paginateBills($query = null)
    {
        $bill = $this->newBill();

        $countForm = BillCountForm::make($bill, $query);

        $total = $this->sendCount($countForm)->getQueryCount();

        $paginateForm = BillPaginateForm::make($bill, $query);

        $collection = $total > 0 ? $this->sendQuery($paginateForm)->toBillCollection($bill) : Collection::make();

        return new Paginator($collection, $total, $query->getPage(), $query->getPerPage());
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Pagination\Paginator
     */
    public function paginateBillEntries($query = null)
    {
        $bill = $this->newBill();

        $countForm = BillEntryCountForm::make($bill, $query);

        $total = $this->sendCount($countForm)->getQueryCount();

        $paginateForm = BillEntryPaginateForm::make($bill, $query);

        $collection = $total > 0 ? $this->sendQuery($paginateForm)->toBillEntryCollection($bill) : Collection::make();

        return new Paginator($collection, $total, $query->getPage(), $query->getPerPage());
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function draftBill($data)
    {
        $bill = $this->newBill();

        $draftForm = BillDraftForm::make($bill, $data);

        return $this->sendDraft($draftForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function saveBill($data)
    {
        $bill = $this->newBill();

        $saveForm = BillSaveForm::make($bill, $data);

        return $this->sendSave($saveForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function pushBill($data)
    {
        $bill = $this->newBill();

        $pushForm = BillPushForm::make($bill, $data);

        return $this->sendPush($pushForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function submitBill($data)
    {
        $bill = $this->newBill();

        $submitForm = OperationSubmitForm::make($bill, $data);

        return $this->sendSubmit($submitForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function auditBill($data)
    {
        $bill = $this->newBill();

        $auditForm = OperationAuditForm::make($bill, $data);

        return $this->sendAudit($auditForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function unauditBill($data)
    {
        $bill = $this->newBill();

        $unauditForm = OperationUnauditForm::make($bill, $data);

        return $this->sendUnaudit($unauditForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function deleteBill($data)
    {
        $bill = $this->newBill();

        $deleteForm = OperationDeleteForm::make($bill, $data);

        return $this->sendDelete($deleteForm)->toSuccessCollection();
    }
}
