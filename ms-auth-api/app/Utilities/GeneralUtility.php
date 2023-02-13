<?php

/**
 * @author seniordev@ovmyanmar.com
 * Created On: 11/11/2022
 */


namespace App\Utilities;

use App\Constants\ErrorConstant;
use App\Models\ExceptionLogger;
use App\Services\ApiResponseService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Constants\GeneralConstant;


class GeneralUtility
{
    /**
     * Function to return message based on error code
     *
     * @param Exception $e
     *
     * @return array
     */
    public function getReturnMessage(Exception $exception)
    {

        $status = method_exists($exception, 'getStatusCode')
        ? $exception->getStatusCode() : 500;
        $exceptionMessage = $exception->getMessage();

        switch ($status) {
            case 400:
            $messageKey = $exceptionMessage;
            break;
            case 401:
            $messageKey = $exceptionMessage;
            break;
            case 403:
            $messageKey = $exceptionMessage;
            break;
            case 404:
            $messageKey = ErrorConstant::RESOURCE_NOT_FOUND;
            break;
            case 405:
            $messageKey = ErrorConstant::METHOD_NOT_ALLOWED;
            break;
            case 408:
            $messageKey = ErrorConstant::REQ_TIME_OUT;
            break;
            case 409:
            $messageKey = $exceptionMessage;
            break;
            case 413:
            $messageKey = $exceptionMessage;
            break;
            case 422:
            $messageKey = $exceptionMessage;
            break;
            case 500:
            $messageKey = ErrorConstant::INTERNAL_ERR;
            break;
            case 502:
            $messageKey = $exceptionMessage;
            break;
            case 503:
            $messageKey = $exceptionMessage;
            break;
            case 504:
            $messageKey = ErrorConstant::GATEWAY_TIMEOUT;
            break;
            default :
            $messageKey = ErrorConstant::INTERNAL_ERR;
            break;
        }

        return ApiResponseService::standardErrorResponse($messageKey);
    }

    /**
     * Function to write the error messages to log file.
     *
     * @param Exception $exception
     * @param null $functionName
     */
    public static function logException(Exception $exception, $functionName = null)
    {

        // Get the exception message
        $exceptionMessage =
        ($functionName ? $functionName . ' function failed due to Error : ' : '') . $exception->getMessage();
        $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;

        // Fetching exception details
        $exceptionDetails = [
            'end_point' => request()->fullUrl(),
            'code' => $exception->getCode(),
            'statusCode' => $statusCode,
            'trace' => $exception->getTraceAsString(),
            'line' => $exception->getLine(),
            'error_message' => $exceptionMessage,
            'class' => get_class($exception),
            'request' => json_encode([
                'method' => request()->getMethod(),
                'headers' => request()->header(),
                'content' => request()->getContent(),
                'query' => request()->getQueryString()
            ], true),
        ];

        // Write custom log to the exception file
        $file=FileUtility::writeCustomLog(config('constant.exception_log_filename'),
            json_encode($exceptionDetails, true));

        // Log exception in DB if DB flag is set
        if (config('constant.exception_db_log_flag')) {
            ExceptionLogger::create([
                'environment' => config('constant.app_env'),
                'end_point' => $exceptionDetails['end_point'],
                'code' => $exceptionDetails['code'],
                'message' => json_encode([
                    'statusCode' => $statusCode,
                    'trace' => $exception->getTraceAsString(),
                    'line' => $exception->getLine(),
                    'error_message' => $exceptionMessage,
                    'class' => get_class($exception)
                ], true),
                'request' => $exceptionDetails['request']
            ]);
        }

    }
   
}
