<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\ApiResponseService;
use App\Services\AuthService;
use App\Utilities\GeneralUtility;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Constants\ErrorConstant;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\HttpKernel\Exception\RouteNotFoundException;
class AuthController extends Controller
{
      /**
     * @var ApiResponseService
     */
      protected $apiResponseService;
   /**
     * @var authService
     */
   protected $authService;

    /**
     * AuthController constructor.
     *
     * @param ApiResponseService $apiResponseService
     */
    public function __construct(ApiResponseService $apiResponseService,AuthService $authService)
    {
        $this->apiResponseService = $apiResponseService;
        $this->authService = $authService;
    }

 public function checkToken(Request $request){
     try {  

    $result = $this->authService->processCheckTokenRequest();
    // Getting success response value
    $response = $this->apiResponseService->createSuccessApiResponse('userResponse',
            $result['message']['response']);
    } catch (UnprocessableEntityHttpException $ex) {
        throw $ex;
    } catch (HttpException $ex) {
        throw $ex;
    } catch (\Exception $ex) {
        GeneralUtility::logException($ex, __FUNCTION__);
            // Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }
     // Creating and final array of response from API.
    return $response;
}

    public function register(RegisterRequest $request){
     try {  

        $result = $this->authService->processRegisterRequest($request->validated()['userRequest']);
            // Getting success response value
        $response = $this->apiResponseService->createSuccessApiResponse('userResponse',
            $result['message']['response']);
    } catch (UnprocessableEntityHttpException $ex) {
        throw $ex;
    } catch (HttpException $ex) {
        throw $ex;
    } catch (\Exception $ex) {
        GeneralUtility::logException($ex, __FUNCTION__);
            // Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }

        // Creating and final array of response from API.
    return $response;

}
   //all permission token
public function Login(LoginRequest $request){
    try {  
        $result = $this->authService->processLoginRequest($request->validated()['userRequest']);
        
            // Getting success response value
        $response = $this->apiResponseService->createSuccessApiResponse('userResponse',
            $result['message']['response']);
    } catch (UnprocessableEntityHttpException $ex) {
        throw $ex;
    } catch (HttpException $ex) {
        throw $ex;
    } catch (\Exception $ex) {
        GeneralUtility::logException($ex, __FUNCTION__);
            // Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }
        // Creating and final array of response from API.
    return $response;

}

//User Details
public function userProfile($id){
 try {  
        $result = $this->authService->processUserProfileRequest($id);
            // Getting success response value
        $response = $this->apiResponseService->createSuccessApiResponse('userResponse',
            $result['message']['response']);
    } catch (UnprocessableEntityHttpException $ex) {
        throw $ex;
    } catch (HttpException $ex) {
        throw $ex;
    } catch (RouteNotFoundException $ex) {
        throw $ex;
    } catch (\Exception $ex) {
        GeneralUtility::logException($ex, __FUNCTION__);
        //Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }
    // Creating and final array of response from API.
    return $response;

}

//User List
public function userList(){
 try {  
 
        $result = $this->authService->processUserListRequest();
            // Getting success response value
        $response = $this->apiResponseService->createSuccessApiResponse('userResponse',
            $result['message']['response']);
    } catch (UnprocessableEntityHttpException $ex) {
        throw $ex;
    } catch (HttpException $ex) {
        throw $ex;
    } catch (RouteNotFoundException $ex) {
        throw $ex;
    } catch (\Exception $ex) {
        GeneralUtility::logException($ex, __FUNCTION__);
        //Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }
    // Creating and final array of response from API.
    return $response;

}

public function logout(Request $request){
    $user = auth()->user();
    // Revoke all tokens...
    //auth()->user()->tokens()->delete();
    // Revoke the token that was used to authenticate the current request...
    $user->currentAccessToken()->delete();
    // Delete user_$id from Redis
    Redis::del('user_' . $user->id);

    return response()->json([
        'status' => 200,
        'message' => 'Successfully Logout',
    ]);

    // Revoke a specific token...
    //$user->tokens()->where('id', $tokenId)->delete();
}
}
