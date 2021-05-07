<?php


namespace CheckPoint\ManagementApi\Api\MultiDomain;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class GlobalDomain
 */
class GlobalDomain extends Api
{
    /**
     * Get the datails of the global domain
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-global-domain~v1.6%20
     *
     */
    public function showGlobalDomain(array $givenParameters)
    {
        $allowedParameters = [
           'uid',
	       'name',
           'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-global-domain', $givenParameters);
    }
}
