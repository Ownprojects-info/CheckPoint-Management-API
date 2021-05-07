<?php


namespace CheckPoint\ManagementApi\Api;


use CheckPoint\ManagementApi\Abstracts\Api;
use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;
use CheckPoint\ManagementApi\Tools\Validator;

/**
 * Class PackageDeployment
 */
class PackageDeployment extends Api
{
    /**
     * Get the software package details
     *
     * @param array $givenParameters
     *
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws CheckPointManagementApiException
     * @link https://sc1.checkpoint.com/documents/latest/APIs/index.html#web/show-software-package-details~v1.6%20
     *
     */
	public function showSoftwarePackageDetails(array $givenParameters)
	{
			$allowedParameters = [
					'name',
			];

			Validator::checkParameters($givenParameters, $allowedParameters);

			return $this->request('show-software-package-details', $givenParameters);
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
