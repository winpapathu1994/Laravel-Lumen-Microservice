<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use App\Traits\ApiResponseService;
class ProfileController extends Controller
{
    use ApiResponseService; 
    private $authService;
    private $profileService;

    /**
     * AuthController constructor.
     *
     * @param \App\Services\AuthService $authService
     */
    public function __construct(AuthService $authService,ProfileService $profileService)
    {
        $this->authService = $authService;
        $this->profileService = $profileService;
    }

    /**
     * @return mixed
     */
    public function userProfile($id)
    {
      return $this->successResponse($this->profileService->userProfileService($id));
    }
   
}