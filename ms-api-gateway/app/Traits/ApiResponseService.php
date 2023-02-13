<?php

namespace App\Traits;

use Illuminate\Http\Response;

use function response;

trait ApiResponseService
{
    /**
     * @param     $data
     * @param int $statusCode
     *
     * @return mixed
     */
    public function successResponse($data, $statusCode = Response::HTTP_OK)
    {
   
        return response($data, $statusCode)->header('Content-Type', 'application/json');
    }
  /**
     * @param $errorMessage
     * @param $statusCode
     *
     * @return mixed
     */
    public function errorMessage($errorMessage = [])
    {
        return response($errorMessage)->header('Content-Type', 'application/json');
    }
}
