<?php


namespace CheckPoint\ManagementApi\Api\Policy;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class PolicyPackage
 */
class PolicyPackage extends Api
{
    /**
     * Get the datails of a package
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-package~v1.6%20
     *
     */
    public function showPackage(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
            'name',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-package', $givenParameters);
    }

    /**
     * Get a list of a packages
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-packages~v1.6%20
     *
     */
    public function showPackages(array $givenParameters)
    {
        $allowedParameters = [
            'limit',
            'offset',
            'order',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-packages', $givenParameters);
    }
}
