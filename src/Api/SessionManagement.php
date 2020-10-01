<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class SessionManagement
 *
 * @method \CheckPoint\ManagementApi\Api\SessionManagement\Session session()
 */
class SessionManagement extends Api
{
    /**
     * Log in to the server with username and password or with an API key. The server shows your session unique
     * identifier. Enter this session unique identifier in the 'X-chkp-sid' header of each request.
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/login~v1.6%20
     *
     */
    public function login(array $givenParameters)
    {
        $allowedParameters = [
            'user',
            'password',
            'api-key',
            'continue-last-session',
            'domain',
            'enter-last-published-session',
            'session-comments',
            'session-description',
            'session-name',
            'session-timeout',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('login', $givenParameters);
    }

    /**
     * All the changes done by this user will be seen by all users only after publish is called.
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/publish~v1.6%20
     *
     */
    public function publish(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('publish', $givenParameters);
    }

    /**
     * All changes done by user are discarded and removed from database.
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/discard~v1.6%20
     *
     */
    public function discard(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('discard', $givenParameters);
    }

    /**
     * Log out from the current session. After logging out the session id is not valid any more.
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/logout~v1.6%20
     *
     */
    public function logout()
    {
        return $this->request('logout');
    }

    /**
     * Disconnect a private session.
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/disconnect~v1.6%20
     *
     */
    public function disconnect(array $givenParameters)
    {
        $allowedParameters = [
            'uid',
            'discard',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('disconnect', $givenParameters);
    }

    /**
     * Keep the session valid/alive.
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/keepalive~v1.6%20
     *
     */
    public function keepalive()
    {
        return $this->request('keepalive');
    }

    /**
     * Revert the Management Database to the selected revision.
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/disconnect~v1.6%20
     *
     */
    public function revertToSession(array $givenParameters)
    {
        $allowedParameters = [
            'to-session',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('revert-to-revision', $givenParameters);
    }

    /**
     * Verify the Management Database can revert to the selected revision.
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/verify-revert~v1.6%20
     *
     */
    public function verifyRevert(array $givenParameters)
    {
        $allowedParameters = [
            'to-session',
        ];

        Validator::checkParameters($givenParameters, $allowedParameters);

        return $this->request('verify-revert', $givenParameters);
    }

    public function __call($method, $arguments)
    {
        $pascalCaseMethod = ucfirst($method);
        $classPath        = __CLASS__ . "\\{$pascalCaseMethod}";

        if (class_exists($classPath)) {
            return new $classPath($this->client);
        }

        throw new CheckPointManagementApiException("Method {$method} does not exist");
    }
}
