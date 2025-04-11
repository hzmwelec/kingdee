<?php

namespace Hzmwelec\Kingdee\Http;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Hzmwelec\Kingdee\Data\BillData;
use Hzmwelec\Kingdee\Data\BillEntity;
use Hzmwelec\Kingdee\Data\BillEntryData;
use Hzmwelec\Kingdee\Data\ModelData;
use Hzmwelec\Kingdee\Data\SuccessCollection;
use Hzmwelec\Kingdee\Exceptions\RuntimeException;
use Hzmwelec\Kingdee\Support\Collection;

class Response extends GuzzleResponse
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return static
     */
    public static function fromPsrResponse($response)
    {
        return new static(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody(),
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
    }

    /**
     * @return array
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public function getArrayContents()
    {
        $data = json_decode($this->getBody()->getContents(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Invalid JSON response: ' . json_last_error_msg());
        }

        if (!is_array($data)) {
            throw new RuntimeException('Expected array but got ' . gettype($data));
        }

        return $data;
    }

    /**
     * @return int
     */
    public function getQueryCount()
    {
        $data = $this->getArrayContents();

        return (int) ($data[0][0] ?? 0);
    }

    /**
     * @return array
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public function getQueryRows()
    {
        $data = $this->getArrayContents();

        if (!($data[0][0]['Result']['ResponseStatus']['IsSuccess'] ?? true)) {
            throw new RuntimeException($data[0][0]['Result']['ResponseStatus']['Errors'][0]['Message'] ?? 'Unknown error');
        }

        return $data;
    }

    /**
     * @return string
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public function getSessionId()
    {
        $data = $this->getArrayContents();

        if (!isset($data['LoginResultType']) || !isset($data['KDSVCSessionId'])) {
            throw new RuntimeException('Invalid response format: missing LoginResultType or KDSVCSessionId.');
        }

        if ($data['LoginResultType'] !== 1) {
            throw new RuntimeException($data['Message'] ?? 'Failed to fetch session.');
        }

        return $data['KDSVCSessionId'];
    }

    /**
     * @return array
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public function getSuccessRows()
    {
        $data = $this->getArrayContents();

        if (!($data['Result']['ResponseStatus']['IsSuccess'] ?? false)) {
            throw new RuntimeException($data['Result']['ResponseStatus']['Errors'][0]['Message'] ?? 'Unknown error');
        }

        return $data['Result']['ResponseStatus']['SuccessEntitys'] ?? [];
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @return \Hzmwelec\Kingdee\Support\Collection
     */
    public function toBillCollection($bill)
    {
        $rows = $this->getQueryRows();

        return Collection::make(
            array_map(function ($row) use ($bill) {
                return BillData::make($bill, $row);
            }, $rows)
        );
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @return \Hzmwelec\Kingdee\Data\BillData|null
     */
    public function toBillData($bill)
    {
        $collection = $this->toBillCollection($bill);

        return $collection->first();
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @return \Hzmwelec\Kingdee\Data\BillEntity|null
     */
    public function toBillEntity($bill)
    {
        $rows = $this->getQueryRows();

        if (empty($rows)) {
            return null;
        }

        return BillEntity::make($bill, $rows);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @return \Hzmwelec\Kingdee\Support\Collection
     */
    public function toBillEntryCollection($bill)
    {
        $rows = $this->getQueryRows();

        return Collection::make(
            array_map(function ($row) use ($bill) {
                return BillEntryData::make($bill, $row);
            }, $rows)
        );
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Bill $bill
     * @return \Hzmwelec\Kingdee\Data\BillEntryData|null
     */
    public function toBillEntryData($bill)
    {
        $collection = $this->toBillEntryCollection($bill);

        return $collection->first();
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @return \Hzmwelec\Kingdee\Support\Collection
     */
    public function toModelCollection($model)
    {
        $rows = $this->getQueryRows();

        return Collection::make(
            array_map(function ($row) use ($model) {
                return ModelData::make($model, $row);
            }, $rows)
        );
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @return \Hzmwelec\Kingdee\Data\ModelData|null
     */
    public function toModelData($model)
    {
        $collection = $this->toModelCollection($model);

        return $collection->first();
    }

    /**
     * @return \Hzmwelec\Kingdee\Data\SuccessCollection
     */
    public function toSuccessCollection()
    {
        $successRows = $this->getSuccessRows();

        return SuccessCollection::make($successRows);
    }
}
