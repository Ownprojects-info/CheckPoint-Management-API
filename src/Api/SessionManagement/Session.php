<?php


namespace CheckPoint\ManagementApi\Api\SessionManagement;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Tools\Validator;

class Session extends Api
{
    public function showSession(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('show-session', $givenParameters);
    }
}
