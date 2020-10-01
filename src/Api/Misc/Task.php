<?php


namespace CheckPoint\ManagementApi\Api\Misc;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class Task
 */
class Task extends Api
{
    /**
     * Get the datails of a task
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-task~v1.6%20
     *
     */
    public function showTask(array $givenParameters)
    {
        $allowedParameters = [
            'task-id',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-task', $givenParameters);
    }

    /**
     * Get a list of tasks
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-tasks~v1.6%20
     *
     */
    public function showTasks(array $givenParameters)
    {
    
    	$allowedParameters = [
    		'initiator',
    		'status',
    		'from-date',
    		'to-date',
    		'limit',
    		'offset',
    		'order',
    		'details-level',
    	];

    	Validator::checkParameters($givenParameters, $allowedParameters);

    	return $this->request('show-tasks', $givenParameters);
    }
}
