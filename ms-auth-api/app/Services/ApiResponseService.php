<?php
/**
 * Service Class for Creating API Request Response.
 *
 * Created On: 11/11/2022
 */

namespace App\Services;

use App\Constants\ErrorConstant;

class ApiResponseService
{
    /**
     * Function to create Error API Response.
     *
     * @param $errorCode
     * @return array
     */
    public static function standardErrorResponse($errorCode)
    {

        $response = [
            'reasonCode' => '300',
            'reasonText' => __('message.api.response.failure.message'),
            'error' => [
                'code' => ErrorConstant::$errorCodeMap[$errorCode]['code'],
                'text' => __('message.'.ErrorConstant::$errorCodeMap[$errorCode]['message'])
            ],
        ];

        return $response;
    }

    /**
     *  Function to create Success API Response.
     *
     *  @param $responseKey
     *  @param $responseContent
     *  @return array
     */
    public function createSuccessApiResponse($responseKey, $responseContent)
    {
        $response['reasonCode'] = '200';
        $response['reasonText'] = __('message.api.response.success.message');
        $response[$responseKey] = $responseContent;
        return $response;
    }

 
}
