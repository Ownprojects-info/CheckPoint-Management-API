<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class NatRule
 *
 */
class NatRule extends Api
{
    /**
     * Get the datails of an NatRule
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-nat-rule~v1.6%20
     *
     */
    public function showNatRule(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
	    'rule-number',
	    'package',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-nat-rule', $givenParameters);
    }

    /**
     * Get the NAT rulebase
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-nat-rulebase~v1.6%20
     *
     */
    public function showNatRulebase(array $givenParameters)
    {
        $allowedParameters = [
	    'package',
	    'filter',
	    'filter-settings',
            'limit',
	    'offset',
	    'order',
	    'use-object-dictionary',
	    'dereference-group-members',
	    'show-membership',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-nat-rulebase', $givenParameters);
    }
}
