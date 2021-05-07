<?php


namespace CheckPoint\ManagementApi\Api\SessionManagement;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class Session
 */
class Session extends Api
{
	/**
     * Show session details
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-session~v1.6%20
     *
     */
    public function showSession(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-session', $givenParameters);
    }
}
