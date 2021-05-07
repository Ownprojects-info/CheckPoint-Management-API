<?php


namespace CheckPoint\ManagementApi\Api\Misc;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class Administrator
 */
class Administrator extends Api
{
    /**
     * Get the datails of an administrator
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-administrator~v1.6%20
     *
     */
    public function showAdministrator(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
            'name',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-administrator', $givenParameters);
    }

    /**
     * Get a list of administrators
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-administrators~v1.6%20
     *
     */
    public function showAdministrators(array $givenParameters)
    {
        $allowedParameters = [
            'limit',
            'offset',
            'order',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-administrators', $givenParameters);
    }

}
