<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Forms\ModelCountForm;
use Hzmwelec\Kingdee\Forms\ModelDraftForm;
use Hzmwelec\Kingdee\Forms\ModelFirstForm;
use Hzmwelec\Kingdee\Forms\ModelPaginateForm;
use Hzmwelec\Kingdee\Forms\ModelQueryForm;
use Hzmwelec\Kingdee\Forms\ModelSaveForm;
use Hzmwelec\Kingdee\Forms\OperationAuditForm;
use Hzmwelec\Kingdee\Forms\OperationDeleteForm;
use Hzmwelec\Kingdee\Forms\OperationSubmitForm;
use Hzmwelec\Kingdee\Forms\OperationUnauditForm;
use Hzmwelec\Kingdee\Pagination\Paginator;
use Hzmwelec\Kingdee\Support\Collection;

abstract class AbstractModelService extends AbstractService
{
    /**
     * @return \Hzmwelec\Kingdee\Contracts\Model
     */
    abstract protected function newModel();

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Support\Collection
     */
    public function get($query = null)
    {
        $model = $this->newModel();

        $queryForm = ModelQueryForm::make($model, $query);

        return $this->sendQuery($queryForm)->toModelCollection($model);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Data\ModelData|null
     */
    public function first($query = null)
    {
        $model = $this->newModel();

        $firstForm = ModelFirstForm::make($model, $query);

        return $this->sendQuery($firstForm)->toModelData($model);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Pagination\Paginator
     */
    public function paginate($query = null)
    {
        $model = $this->newModel();

        $countForm = ModelCountForm::make($model, $query);

        $total = $this->sendCount($countForm)->getQueryCount();

        $paginateForm = ModelPaginateForm::make($model, $query);

        $collection = $total > 0 ? $this->sendQuery($paginateForm)->toModelCollection($model) : Collection::make();

        return new Paginator($collection, $total, $query->getPage(), $query->getPerPage());
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function draft($data)
    {
        $model = $this->newModel();

        $draftForm = ModelDraftForm::make($model, $data);

        return $this->sendDraft($draftForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function save($data)
    {
        $model = $this->newModel();

        $saveForm = ModelSaveForm::make($model, $data);

        return $this->sendSave($saveForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function submit($data)
    {
        $model = $this->newModel();

        $submitForm = OperationSubmitForm::make($model, $data);

        return $this->sendSubmit($submitForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function audit($data)
    {
        $model = $this->newModel();

        $auditForm = OperationAuditForm::make($model, $data);

        return $this->sendAudit($auditForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function unaudit($data)
    {
        $model = $this->newModel();

        $unauditForm = OperationUnauditForm::make($model, $data);

        return $this->sendUnaudit($unauditForm)->toSuccessCollection();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function delete($data)
    {
        $model = $this->newModel();

        $deleteForm = OperationDeleteForm::make($model, $data);

        return $this->sendDelete($deleteForm)->toSuccessCollection();
    }
}
