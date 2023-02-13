<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Traits\ApiResponseService;
class AuthController extends Controller
{
    use ApiResponseService; 
    private $authService;

    /**
     * AuthController constructor.
     *
     * @param \App\Services\AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
   
    /**
     * @return mixed
     */
    public function checkToken(Request $request)
    {
      return $this->successResponse($this->authService->checkTokenService($request->all()));
    }

    /**
     * @return mixed
     */
    public function login(Request $request)
    {
      return $this->successResponse($this->authService->loginService($request->all()));
    }
    /**
     * @return mixed
     */
    public function register(Request $request)
    {
        return $this->successResponse($this->authService->registerService($request->all()));
    }
}