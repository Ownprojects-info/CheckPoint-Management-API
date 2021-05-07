<?php


namespace CheckPoint\ManagementApi\Api\MultiDomain;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class Domain
 */
class Domain extends Api
{
    /**
     * Get the datails of a domain
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-domain~v1.6%20
     *
     */
    public function showDomain(array $givenParameters)
    {
        $allowedParameters = [
           'uid',
	       'name',
           'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-domain', $givenParameters);
    }

    /**
     * Get a list of domains
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-domains~v1.6%20
     *
     */
    public function showDomains(array $givenParameters)
    {
    
    	$allowedParameters = [
    		'limit',
    		'offset',
    		'order',
    		'details-level',
    	];

    	Validator::checkParameters($givenParameters, $allowedParameters);

    	return $this->request('show-domains', $givenParameters);
    }
}
