<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Services\ApiResponseService;
use App\Services\ProfileService;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Constants\ErrorConstant;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\HttpKernel\Exception\RouteNotFoundException;
use App\Utilities\GeneralUtility;
class ProfileController extends Controller
{
      /**
     * @var ApiResponseService
     */
      protected $apiResponseService;
   /**
     * @var ProfileService
     */
   protected $profileService;

    /**
     * ProfileController constructor.
     *
     * @param ApiResponseService $apiResponseService
     */
    public function __construct(ApiResponseService $apiResponseService,ProfileService $profileService)
    {
        $this->apiResponseService = $apiResponseService;
        $this->profileService = $profileService;
    }


    public function userProfileOld($id)
    {
       $users =  User::get();
       return $this->successResponse($users);
   }


//User Details
   public function userProfile($id){
     try {  
        $result = $this->profileService->processUserProfileRequest($id);
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
   // GeneralUtility::logException($ex, __FUNCTION__);
        //Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }
    // Creating and final array of response from API.
    return $response;

}


//User Details
   public function profileCreate(Request $request){
     try {  

        $result = $this->profileService->processProfileCreateRequest($request['userRequest']);
       
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
        //Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }
    // Creating and final array of response from API.
    return $response;

}


}