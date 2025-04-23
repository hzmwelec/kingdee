<?php

namespace Hzmwelec\Kingdee\Http;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Hzmwelec\Kingdee\Dtos\BillDto;
use Hzmwelec\Kingdee\Dtos\BillEntityDto;
use Hzmwelec\Kingdee\Dtos\BillEntryDto;
use Hzmwelec\Kingdee\Dtos\EntityDto;
use Hzmwelec\Kingdee\Dtos\SuccessesDto;
use Hzmwelec\Kingdee\Exceptions\RuntimeException;

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
    public function getContentsArray()
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
     * @return string
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public function getSessionId()
    {
        $data = $this->getContentsArray();

        if (!isset($data['LoginResultType']) || !isset($data['KDSVCSessionId'])) {
            throw new RuntimeException('Invalid response format: missing LoginResultType or KDSVCSessionId.');
        }

        if ($data['LoginResultType'] !== 1) {
            throw new RuntimeException($data['Message'] ?? 'Failed to fetch session.');
        }

        return $data['KDSVCSessionId'];
    }

    /**
     * @return int
     */
    public function getQueryCount()
    {
        $data = $this->getContentsArray();

        return (int) ($data[0][0] ?? 0);
    }

    /**
     * @return array
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public function getQueryRows()
    {
        $data = $this->getContentsArray();

        if (!($data[0][0]['Result']['ResponseStatus']['IsSuccess'] ?? true)) {
            throw new RuntimeException($data[0][0]['Result']['ResponseStatus']['Errors'][0]['Message'] ?? 'Unknown error');
        }

        return $data;
    }

    /**
     * @return array
     * @throws \Hzmwelec\Kingdee\Exceptions\RuntimeException
     */
    public function getSuccessRows()
    {
        $data = $this->getContentsArray();

        if (!($data['Result']['ResponseStatus']['IsSuccess'] ?? false)) {
            throw new RuntimeException($data['Result']['ResponseStatus']['Errors'][0]['Message'] ?? 'Unknown error');
        }

        return $data['Result']['ResponseStatus']['SuccessEntitys'] ?? [];
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @return array<\Hzmwelec\Kingdee\Dtos\BillDto>
     */
    public function toBills($billModel)
    {
        $rows = $this->getQueryRows();

        return array_map(function ($row) use ($billModel) {
            return BillDto::make($billModel, $row);
        }, $rows);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @return \Hzmwelec\Kingdee\Dtos\BillDto|null
     */
    public function toBill($billModel)
    {
        $rows = $this->getQueryRows();

        return count($rows) > 0 ? BillDto::make($billModel, $rows[0]) : null;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @return \Hzmwelec\Kingdee\Dtos\BillEntityDto|null
     */
    public function toBillEntity($billModel)
    {
        $rows = $this->getQueryRows();

        return count($rows) > 0 ? BillEntityDto::make($billModel, $rows) : null;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @return array<\Hzmwelec\Kingdee\Dtos\BillEntryDto>
     */
    public function toBillEntries($billModel)
    {
        $rows = $this->getQueryRows();

        return array_map(function ($row) use ($billModel) {
            return BillEntryDto::make($billModel, $row);
        }, $rows);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\BillModel $billModel
     * @return \Hzmwelec\Kingdee\Dtos\BillEntryDto|null
     */
    public function toBillEntry($billModel)
    {
        $rows = $this->getQueryRows();

        return count($rows) > 0 ? BillEntryDto::make($billModel, $rows[0]) : null;
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @return array<\Hzmwelec\Kingdee\Dtos\EntityDto>
     */
    public function toEntities($model)
    {
        $rows = $this->getQueryRows();

        return array_map(function ($row) use ($model) {
            return EntityDto::make($model, $row);
        }, $rows);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Model $model
     * @return \Hzmwelec\Kingdee\Dtos\EntityDto|null
     */
    public function toEntity($model)
    {
        $rows = $this->getQueryRows();

        return count($rows) > 0 ? EntityDto::make($model, $rows[0]) : null;
    }

    /**
     * @return \Hzmwelec\Kingdee\Dtos\SuccessesDto
     */
    public function toSuccesses()
    {
        $rows = $this->getSuccessRows();

        return SuccessesDto::make($rows);
    }
}
