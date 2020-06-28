<?php


namespace CheckPoint\ManagementApi\Tools;


use CheckPoint\ManagementApi\Exceptions\CheckPointManagementApiException;

class Validator
{
    public static function checkParameters(array $givenParameters, array $allowedParameters)
    {
        $errors = [];
        foreach ($givenParameters as $givenParameterKey => $givenParameterData) {
            if (!in_array($givenParameterKey, $allowedParameters)) {
                $errors[] = "The parameter '{$givenParameterKey}' is not in the allowed parameters";
            }
        }

        if (!empty($errors)) {
            throw new CheckPointManagementApiException(self::buildErrorMessage($errors));
        }
    }

    private static function buildErrorMessage(array $errors) {
        $message = '';

        foreach ($errors as $error) {
            $message .= $error.PHP_EOL;
        }

        return $message;
    }
}
