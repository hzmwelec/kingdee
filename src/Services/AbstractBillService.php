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

abstract class AbstractBillService extends AbstractService
{
    /**
     * @return \Hzmwelec\Kingdee\Contracts\BillModel
     */
    abstract protected function newBillModel();

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return array<\Hzmwelec\Kingdee\Dtos\BillDto>
     */
    public function getBills($query = null)
    {
        $billModel = $this->newBillModel();

        $queryForm = BillQueryForm::make($billModel, $query);

        return $this->sendQuery($queryForm)->toBills($billModel);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return array<\Hzmwelec\Kingdee\Dtos\BillEntryDto>
     */
    public function getBillEntries($query = null)
    {
        $billModel = $this->newBillModel();

        $queryForm = BillEntryQueryForm::make($billModel, $query);

        return $this->sendQuery($queryForm)->toBillEntries($billModel);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Dtos\BillEntityDto|null
     */
    public function firstBillEntity($query = null)
    {
        $billModel = $this->newBillModel();

        $firstForm = BillFirstForm::make($billModel, $query);

        return $this->sendQuery($firstForm)->toBillEntity($billModel);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Dtos\BillEntryDto|null
     */
    public function firstBillEntry($query = null)
    {
        $billModel = $this->newBillModel();

        $firstForm = BillEntryFirstForm::make($billModel, $query);

        return $this->sendQuery($firstForm)->toBillEntry($billModel);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Pagination\Paginator
     */
    public function paginateBills($query = null)
    {
        $billModel = $this->newBillModel();

        $countForm = BillCountForm::make($billModel, $query);

        $total = $this->sendCount($countForm)->getQueryCount();

        $paginateForm = BillPaginateForm::make($billModel, $query);

        $items = $total > 0 ? $this->sendQuery($paginateForm)->toBills($billModel) : [];

        return new Paginator(
            $items,
            $total,
            $query->getPage(),
            $query->getPerPage()
        );
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Pagination\Paginator
     */
    public function paginateBillEntries($query = null)
    {
        $billModel = $this->newBillModel();

        $countForm = BillEntryCountForm::make($billModel, $query);

        $total = $this->sendCount($countForm)->getQueryCount();

        $paginateForm = BillEntryPaginateForm::make($billModel, $query);

        $items = $total > 0 ? $this->sendQuery($paginateForm)->toBillEntries($billModel) : [];

        return new Paginator(
            $items,
            $total,
            $query->getPage(),
            $query->getPerPage()
        );
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function draftBill($data)
    {
        $billModel = $this->newBillModel();

        $draftForm = BillDraftForm::make($billModel, $data);

        return $this->sendDraft($draftForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function saveBill($data)
    {
        $billModel = $this->newBillModel();

        $saveForm = BillSaveForm::make($billModel, $data);

        return $this->sendSave($saveForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function pushBill($data)
    {
        $billModel = $this->newBillModel();

        $pushForm = BillPushForm::make($billModel, $data);

        return $this->sendPush($pushForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function submitBill($data)
    {
        $billModel = $this->newBillModel();

        $submitForm = OperationSubmitForm::make($billModel, $data);

        return $this->sendSubmit($submitForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function auditBill($data)
    {
        $billModel = $this->newBillModel();

        $auditForm = OperationAuditForm::make($billModel, $data);

        return $this->sendAudit($auditForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function unauditBill($data)
    {
        $billModel = $this->newBillModel();

        $unauditForm = OperationUnauditForm::make($billModel, $data);

        return $this->sendUnaudit($unauditForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function deleteBill($data)
    {
        $billModel = $this->newBillModel();

        $deleteForm = OperationDeleteForm::make($billModel, $data);

        return $this->sendDelete($deleteForm)->toSuccesses();
    }
}
