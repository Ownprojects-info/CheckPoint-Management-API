<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class AccessRule
 *
 */
class AccessRule extends Api
{
    /**
     * Get the datails of an AccessRule
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-access-rule~v1.6%20
     *
     */
    public function showAccessRule(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
	    'name',
	    'rule-number',
	    'layer',
	    'show-as-ranges',
	    'show-hits',
	    'hits-settings',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-access-rule', $givenParameters);
    }

    /**
     * Get the access rulebase
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-access-rulebase~v1.6%20
     *
     */
    public function showAccessRulebase(array $givenParameters)
    {
        $allowedParameters = [
	    'name',
	    'uid',
	    'filter',
	    'filter-settings',
            'limit',
	    'offset',
	    'order',
	    'package',
	    'show-as-ranges',
	    'show-hits',
	    'use-object-dictionary',
	    'hits-settings',
	    'dereference-group-members',
	    'show-membership',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-access-rulebase', $givenParameters);
    }
}
