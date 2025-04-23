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

abstract class AbstractEntityService extends AbstractService
{
    /**
     * @return \Hzmwelec\Kingdee\Contracts\Model
     */
    abstract protected function newModel();

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return array<\Hzmwelec\Kingdee\Dtos\EntityDto>
     */
    public function get($query = null)
    {
        $model = $this->newModel();

        $queryForm = ModelQueryForm::make($model, $query);

        return $this->sendQuery($queryForm)->toEntities($model);
    }

    /**
     * @param \Hzmwelec\Kingdee\Query\Builder|null $query
     * @return \Hzmwelec\Kingdee\Dtos\EntityDto|null
     */
    public function first($query = null)
    {
        $model = $this->newModel();

        $firstForm = ModelFirstForm::make($model, $query);

        return $this->sendQuery($firstForm)->toEntity($model);
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

        $items = $total > 0 ? $this->sendQuery($paginateForm)->toEntities($model) : [];

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
    public function draft($data)
    {
        $model = $this->newModel();

        $draftForm = ModelDraftForm::make($model, $data);

        return $this->sendDraft($draftForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function save($data)
    {
        $model = $this->newModel();

        $saveForm = ModelSaveForm::make($model, $data);

        return $this->sendSave($saveForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function submit($data)
    {
        $model = $this->newModel();

        $submitForm = OperationSubmitForm::make($model, $data);

        return $this->sendSubmit($submitForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function audit($data)
    {
        $model = $this->newModel();

        $auditForm = OperationAuditForm::make($model, $data);

        return $this->sendAudit($auditForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function unaudit($data)
    {
        $model = $this->newModel();

        $unauditForm = OperationUnauditForm::make($model, $data);

        return $this->sendUnaudit($unauditForm)->toSuccesses();
    }

    /**
     * @param array $data
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function delete($data)
    {
        $model = $this->newModel();

        $deleteForm = OperationDeleteForm::make($model, $data);

        return $this->sendDelete($deleteForm)->toSuccesses();
    }
}
