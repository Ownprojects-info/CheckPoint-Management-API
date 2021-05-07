<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class MultiDomain
 *
 * @method \CheckPoint\ManagementApi\Api\MultiDomain\Domain domain()
 * @method \CheckPoint\ManagementApi\Api\MultiDomain\GlobalDomain globalDomain()
 */
class MultiDomain extends Api
{
    /**
     * Get the datails of a Multi-Domain-Server
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-mds~v1.6%20
     *
     */
    public function showMds(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
	    'name',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-mds', $givenParameters);
    }

    /**
     * Get a list of  Multi-Domain-Servers
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-mdss~v1.6%20
     *
     */
    public function showMdss(array $givenParameters)
    {
        $allowedParameters = [
            'limit',
	    'offset',
	    'order',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-mdss', $givenParameters);
    }

    public function __call($method, $arguments)
    {
        $pascalCaseMethod = ucfirst($method);
        $classPath        = __CLASS__ . "\\{$pascalCaseMethod}";

        if (class_exists($classPath)) {
            return new $classPath($this->client);
        }

        throw new CheckPointManagementApiException("Method {$method} does not exist");
    }
}
