<?php
declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App\Constants\ErrorConstant;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use function config;
class AuthenticateAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $allowedAccess = config('constant.allowed_access_secrets');

        // Check access key exist or not
        if (empty($request->header('accessKey'))) {
            throw new UnauthorizedHttpException('Basic', ErrorConstant::MISSING_AUTH_FIELD);
        }
        if (base64_decode($request->header('accessKey')) === $allowedAccess) {
            return $next($request);
        }else{
            throw new UnauthorizedHttpException('Basic', ErrorConstant::INVALID_AUTHORIZATION);
        }
  
        //  abort(Response::HTTP_UNAUTHORIZED);
    }
}
