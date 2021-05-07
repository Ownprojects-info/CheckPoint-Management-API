<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class AccessLayer
 *
 */
class AccessLayer extends Api
{
    /**
     * Get the datails of an AccessLayer
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-access-rule~v1.6%20
     *
     */
    public function showAccessLayer(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
	    'name',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-access-layer', $givenParameters);
    }

    /**
     * Get the access layers
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-access-layers~v1.6%20
     *
     */
    public function showAccessLayers(array $givenParameters)
    {
        $allowedParameters = [
            'limit',
	    'offset',
	    'order',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-access-layers', $givenParameters);
    }
}
