<?php


namespace CheckPoint\ManagementApi;

use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use GuzzleHttp\Client as GuzzleHttpClient;

/**
 * Class Client
 *
 * @package CheckPoint\ManagementApi
 *
 * @method \CheckPoint\ManagementApi\Api\DataCenter dataCenter()
 * @method \CheckPoint\ManagementApi\Api\Misc misc()
 * @method \CheckPoint\ManagementApi\Api\NetworkObjects networkObjects()
 * @method \CheckPoint\ManagementApi\Api\PackageDeployment packageDeployment()
 * @method \CheckPoint\ManagementApi\Api\Policy policy()
 * @method \CheckPoint\ManagementApi\Api\SessionManagement sessionManagement()
 * @method \CheckPoint\ManagementApi\Api\SmartTasks smartTasks()
 */
class Client
{
    const CLIENT_VERSION = '1.0.0';

    const API_VERSION = 'v1.6';

    const BASE_URI = 'https:///%s:%s/web_api/%s/';

    const BASE_URI_NO_PORT = 'https://%s/web_api/%s/';

    protected $managementHost;

    protected $managementPort;

    protected $apiUrl;

    protected $httpClient;

    protected $sessionToken;

    public function __construct($managementHost, $managementPort = null)
    {
        $this->managementHost = $managementHost;
        $this->managementPort = $managementPort;

        $this->httpClient = new GuzzleHttpClient([
            'base_uri'    => $this->buildApiUri(),
            'verify'      => false,
            'http_errors' => false,
        ]);
    }

    private function buildApiUri()
    {
        if (! $this->managementPort) {
            $this->apiUrl = sprintf(self::BASE_URI_NO_PORT, $this->managementHost, self::API_VERSION);
        } else {
            $this->apiUrl = sprintf(self::BASE_URI, $this->managementHost, $this->managementPort, self::API_VERSION);
        }

        return $this->apiUrl;
    }

    public function getHttpClient()
    {
        return $this->httpClient;
    }

    public function getSessionToken()
    {
        return $this->sessionToken;
    }

    public function setSessionToken($sessionToken)
    {
        $this->sessionToken = $sessionToken;
    }

    public function __call($method, $arguments)
    {
        $pascalCaseMethod = ucfirst($method);
        $classPath        = "CheckPoint\ManagementApi\Api\\{$pascalCaseMethod}";

        if (class_exists($classPath)) {
            return new $classPath($this);
        }

        throw new CheckPointManagementApiException("Method {$method} does not exist");
    }
}
