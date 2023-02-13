<?php
/**
 * Middleware Class for Verify Token Authenticating the request.
 *
 * @author seniordev@ovmyanmar.com
 * Created On: 16/11/2020
 */

namespace App\Http\Middleware;

use App\Constants\GeneralConstant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Constants\ErrorConstant;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Support\Facades\Auth;
use App\Traits;
use App\Traits\ApiRequestService;
use App\Traits\ApiResponseService;

class VerifyTokenMiddleware
{
  
     use ApiRequestService;
     use ApiResponseService;
   /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $secret;

    public function __construct()
    {
        $this->baseUri = config('constant.auth.base_uri');
        $this->secret = config('constant.auth.secret');
    }


    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {   
           // Check access key exist or not
        if (empty(request()->header('Authorization'))) {
            throw new UnauthorizedHttpException('Basic', 'MISSING_AUTH_FIELD');
        }
        
        $headers['Authorization'] = request()->header('Authorization');

        $response = $this->request('POST', '/api/checkToken',[],$headers);

        $result = json_decode($response, true);

        if($result['reasonCode'] !== '200'){
           /* return $this->errorMessage(
                $result['error']['text'],
                Response::HTTP_UNAUTHORIZED);*/

            return $this->errorMessage($result);
        }else{
            return $next($request);
        }
        
    }

      
}