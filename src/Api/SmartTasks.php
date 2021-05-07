<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class SmartTasks
 *
 * @method \CheckPoint\ManagementApi\Api\SmartTasks\Triggers triggers()
 */
class SmartTasks extends Api
{

	/**
     * Get a list of SmartTasks
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-smart-tasks~v1.6%20
     *
     */
    public function showSmartTasks(array $givenParameters)
    {
        $allowedParameters = [
            'limit',
            'offset',
		    'order',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-smart-tasks', $givenParameters);
    }

	/**
     * Get the details of a SmartTask
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-smart-task-v1.6%20
     *
     */
    public function showSmartTask(array $givenParameters)
    {
        $allowedParameters = [
            'name',
            'uid',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-smart-task', $givenParameters);
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
