<?php

namespace Hzmwelec\Kingdee\Services;

use Hzmwelec\Kingdee\Enums\ApiUriEnum;
use Hzmwelec\Kingdee\Exceptions\AuthenticationException;

abstract class AbstractService
{
    /**
     * @var \Hzmwelec\Kingdee\Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $cookie = [];

    /**
     * @var string
     */
    protected $sessionIdKey = 'kdservice-sessionid';

    /**
     * @param \Hzmwelec\Kingdee\Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function startSession($username)
    {
        $this->cookie[$this->sessionIdKey] = $this->client->resolveSession($username);

        return $this;
    }

    /**
     * @return bool
     */
    public function isSessionStart()
    {
        return !empty($this->cookie[$this->sessionIdKey]);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendQuery($form)
    {
        return $this->sendRequest(ApiUriEnum::QUERY, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendCount($form)
    {
        return $this->sendRequest(ApiUriEnum::QUERY, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendDraft($form)
    {
        return $this->sendRequest(ApiUriEnum::DRAFT, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendSave($form)
    {
        return $this->sendRequest(ApiUriEnum::SAVE, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendSubmit($form)
    {
        return $this->sendRequest(ApiUriEnum::SUBMIT, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendAudit($form)
    {
        return $this->sendRequest(ApiUriEnum::AUDIT, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendUnaudit($form)
    {
        return $this->sendRequest(ApiUriEnum::UNAUDIT, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendDelete($form)
    {
        return $this->sendRequest(ApiUriEnum::DELETE, $form);
    }

    /**
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     */
    protected function sendPush($form)
    {
        return $this->sendRequest(ApiUriEnum::PUSH, $form);
    }

    /**
     * @param string $uri
     * @param \Hzmwelec\Kingdee\Contracts\Form $form
     * @return \Hzmwelec\Kingdee\Http\Response
     * @throws \Hzmwelec\Kingdee\Exceptions\AuthenticationException
     */
    protected function sendRequest($uri, $form)
    {
        if (!$this->isSessionStart()) {
            throw new AuthenticationException('Session is not started yet, call startSession() first.');
        }

        return $this->client->httpPost($uri, [
            'base_uri' => $this->client->getConfig('base_uri'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => http_build_query($this->cookie, '', ';'),
            ],
            'json' => [
                'formid' => $form->getFormId(),
                'data' => $form->getFormData(),
            ],
        ]);
    }
}
