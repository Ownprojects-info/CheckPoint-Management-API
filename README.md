<h1 align="center">Check Point management API client for PHP</h1>

## Requirements ##
To use the Check Point management API client, the following things are required:

+ The management API should be active at the management server.
+ Username and password or an API key.
+ 

## Composer Installation ##


## Getting started ##
Initializing the client and logging in.
```php
// Management server with special port
$checkPointManagementApiClient = new \CheckPoint\ManagementApi\Client('127.0.0.1', 8080);

// Management server without port
$checkPointManagementApiClient = new \CheckPoint\ManagementApi\Client('127.0.0.1');

// Login with username and password
$loginResponse = $checkPointManagementApiClient->sessionManagement()->login([
    'user'     => 'admin',
    'password' => 'admin',
]);

// Login with API key
$loginResponse = $checkPointManagementApiClient->sessionManagement()->login([
    'api-key' => 'key',
]);

```

The login response should return something like this:
```json
{
     "uid": "5fcaf9e8-cb8c-4d9e-91fd-58227c4f71e8",
     "sid": "ofsg1UcwLFQV2-XEKmnMeZ6iWaml06CJ3OAtfyv7Isp",
     "url": "https://host:port/web_api/v1.6",
     "session-timeout": 600,
     "last-login-was-at": {
       "posix": 1593377918896,
       "iso-8601": "2020-06-28T22:58+0200",
     },
     "api-server-version": "1.6",
}
```

The session token can be found in the login response, which is the 'sid'. 

Make sure to save and set the session token in order to use it later on.
```php
$sessionToken = $loginResponse->sid;
$checkPointManagementApiClient->setSessionToken($sessionToken);
```

From now on you can use the Check Point management API just like it is documented. Here are some examples:
```php
$sessionManagement = $checkPointManagementApiClient->sessionManagement();
$session           = $sessionManagement->session();

$currentSession = $session->showSession([
    'uid' => $loginResponse->uid,
]);
```
or
```php
$currentSession = $checkPointManagementApiClient->sessionManagement()->session()->showSession([
    'uid' => $loginResponse->uid,
]);
```
