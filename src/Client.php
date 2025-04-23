<?php

namespace Hzmwelec\Kingdee;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Hzmwelec\Kingdee\Auth\Session;
use Hzmwelec\Kingdee\Exceptions\HttpException;
use Hzmwelec\Kingdee\Exceptions\InvalidArgumentException;
use Hzmwelec\Kingdee\Http\Response;
use Psr\SimpleCache\InvalidArgumentException as PsrCacheInvalidArgumentException;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

class Client
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var \Psr\SimpleCache\CacheInterface
     */
    protected $cache;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $http;

    /**
     * @param array $config
     * @param \Psr\SimpleCache\CacheInterface|null $cache
     * @param \GuzzleHttp\ClientInterface|null $http
     */
    public function __construct($config, $cache = null, $http = null)
    {
        $this->config = array_merge([
            'base_uri' => '',
            'db_id' => '',
            'app_id' => '',
            'app_secret' => '',
            'locale_id' => 2052,
            'version' => '',
            'cache_prefix' => 'kingdee',
            'session_expire_in' => 3600,
        ], $config);

        $this->cache = $cache ?? new Psr16Cache(new FilesystemAdapter());

        $this->http = $http ?? new GuzzleHttpClient();
    }

    /**
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public function getConfig($key = null, $default = null)
    {
        if ($key === null) {
            return $this->config;
        }

        return $this->config[$key] ?? $default;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return (string) $this->getConfig('app_id');
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return (string) $this->getConfig('app_secret');
    }

    /**
     * @return \Psr\SimpleCache\CacheInterface
     */
    public function getCacheClient()
    {
        return $this->cache;
    }

    /**
     * @param \Psr\SimpleCache\CacheInterface $cache
     * @return void
     */
    public function setCacheClient($cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     * @throws \Hzmwelec\Kingdee\Exceptions\InvalidArgumentException
     */
    public function getFromCache($key, $default = null)
    {
        try {
            return $this->cache->get($key, $default);
        } catch (PsrCacheInvalidArgumentException $e) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param int|null $ttl
     * @return bool
     * @throws \Hzmwelec\Kingdee\Exceptions\InvalidArgumentException
     */
    public function setToCache($key, $value, $ttl = null)
    {
        try {
            return $this->cache->set($key, $value, $ttl);
        } catch (PsrCacheInvalidArgumentException $e) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @param string $key
     * @return bool
     * @throws \Hzmwelec\Kingdee\Exceptions\InvalidArgumentException
     */
    public function removeFromCache($key)
    {
        try {
            return $this->cache->delete($key);
        } catch (PsrCacheInvalidArgumentException $e) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @param string $key
     * @return bool
     * @throws \Hzmwelec\Kingdee\Exceptions\InvalidArgumentException
     */
    public function hasInCache($key)
    {
        try {
            return $this->cache->has($key);
        } catch (PsrCacheInvalidArgumentException $e) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttpClient()
    {
        return $this->http;
    }

    /**
     * @param \GuzzleHttp\ClientInterface $http
     * @return void
     */
    public function setHttpClient($http)
    {
        $this->http = $http;
    }

    /**
     * @param string $uri
     * @param array $options
     * @return \Hzmwelec\Kingdee\Http\Response
     * @throws \Hzmwelec\Kingdee\Exceptions\HttpException
     */
    public function httpGet($uri, $options = [])
    {
        try {
            $response = $this->http->request('GET', $uri, $options);
        } catch (GuzzleException $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return Response::fromPsrResponse($response);
    }

    /**
     * @param string $uri
     * @param array $options
     * @return \Hzmwelec\Kingdee\Http\Response
     * @throws \Hzmwelec\Kingdee\Exceptions\HttpException
     */
    public function httpPost($uri, $options = [])
    {
        try {
            $response = $this->http->request('POST', $uri, $options);
        } catch (GuzzleException $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return Response::fromPsrResponse($response);
    }

    /**
     * @param string $username
     * @return string
     */
    public function resolveSession($username)
    {
        $session = new Session($this);

        return $session->getSessionId($username);
    }
}
