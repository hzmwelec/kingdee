<?php

namespace Hzmwelec\Kingdee\Auth;

use Hzmwelec\Kingdee\Enums\ApiUriEnum;

class Session
{
    /**
     * @var \Hzmwelec\Kingdee\Client
     */
    private $client;

    /**
     * @param \Hzmwelec\Kingdee\Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param string $username
     * @return string
     */
    public function fetchSessionId($username)
    {
        $response = $this->client->httpPost(ApiUriEnum::LOGIN, [
            'base_uri' => $this->client->getConfig('base_uri'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'json' => [
                'format' => 1,
                'useragent' => 'ApiClient',
                'parameters' => [
                    $this->client->getConfig('db_id'),
                    $username,
                    $this->client->getConfig('app_id'),
                    $this->client->getConfig('app_secret'),
                    $this->client->getConfig('locale_id'),
                ],
                'timestamp' => date('Y-m-d H:i:s'),
                'v' => $this->client->getConfig('version'),
            ]
        ]);

        return $response->getSessionId();
    }

    /**
     * @param string $username
     * @return string
     */
    public function getSessionId($username)
    {
        $cacheKey = $this->getCacheKey($username);

        if ($this->client->hasInCache($cacheKey)) {
            return $this->client->getFromCache($cacheKey);
        }

        $sessionId = $this->fetchSessionId($username);

        $expireIn = max(60, $this->client->getConfig('session_expire_in', 3600) - 60);

        $this->client->setToCache($cacheKey, $sessionId, $expireIn);

        return $sessionId;
    }

    /**
     * @param string $username
     * @return bool
     */
    public function clearSessionId($username)
    {
        $cacheKey = $this->getCacheKey($username);

        return $this->client->removeFromCache($cacheKey);
    }

    /**
     * @param string $username
     * @return string
     */
    protected function getCacheKey($username)
    {
        $cachePrefix = trim($this->client->getConfig('cache_prefix', 'kingdee'), '.');

        $appIdHash = md5($this->client->getAppId());

        $usernameHash = md5($username);

        return implode('.', [$cachePrefix, $appIdHash, 'session', $usernameHash]);
    }
}
