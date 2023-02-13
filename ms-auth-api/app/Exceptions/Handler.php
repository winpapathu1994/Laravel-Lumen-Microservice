<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Utilities\GeneralUtility;
use Illuminate\Support\Facades\Response;
use Exception;
use App\Constants\ErrorConstant;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {

            $this->renderable(function (Exception $exception, $request) {       
                if($exception->getMessage() == 'Unauthenticated.'){
                    throw new UnprocessableEntityHttpException(
                    ErrorConstant::INVALID_AUTHORIZATION);
                }
                return Response::json((new GeneralUtility())
                    ->getReturnMessage($exception), ($this->isHttpException($exception) ? $exception->getStatusCode() : 500));
            });

    }

    }
