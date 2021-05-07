<?php


namespace CheckPoint\ManagementApi\Api\NetworkObjects;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class LsvProfile
 */
class LsvProfile extends Api
{
    /**
     * Get the datails of a lsvProfile
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-lsv-profile~v1.6%20
     *
     */
    public function showLsvProfile(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
            'name',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-lsv-profile', $givenParameters);
    }

    /**
     * Get a list of a lsv profiles
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-lsv-profiles~v1.6%20
     *
     */
    public function showLsvProfiles(array $givenParameters)
    {
        $allowedParameters = [
            'limit',
            'offset',
            'order',
            'details-level',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-lsv-profiles', $givenParameters);
    }
}
