<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class Misc
 *
 * @method \CheckPoint\ManagementApi\Api\Misc\Task task()
 */
class Misc extends Api
{
    /**
     * Get a list of changes between dates or sessions
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-changes~v1.6%20
     *
     */
    public function showChanges(array $givenParameters)
    {
        $allowedParameters = [
            'from-date',
            'from-session',
            'limit',
            'offset',
            'to-date',
            'to-session',
            'dereference-group-members',
            'show-membership',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-changes', $givenParameters);
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
