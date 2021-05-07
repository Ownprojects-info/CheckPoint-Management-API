<?php


namespace CheckPoint\ManagementApi\Abstracts;


use CheckPoint\ManagementApi\Client;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;

abstract class Api
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function request($uri, $parameters = null)
    {
        $options = [];

        if (is_array($parameters) && !empty($parameters)) {
            $options['json'] = $parameters;
        }

        $sessionToken = $this->client->getSessionToken();
        if ($sessionToken) {
            $options['headers'] = [
                'X-chkp-sid' => $sessionToken,
            ];
        }

	// Send an ampty json body if no parameters are given
	if (empty($parameters)) {
	    $options['headers']['Content-Type'] = "application/json";
	    $options['body'] = "{}";
	}

        $response = $this->client->getHttpClient()->post($uri, $options);

        $resonseBody = $response->getBody();

        if ($response->getStatusCode() != 200) {
            throw new CheckPointManagementApiException($resonseBody, $response->getStatusCode());
        }

        $jsonContent = json_decode($resonseBody);

        return ($jsonContent) ? $jsonContent : $resonseBody;
    }

    public function setSessionToken($sessionToken)
    {
        $this->client->setSessionToken($sessionToken);
    }
}
