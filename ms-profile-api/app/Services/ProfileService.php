<?php
/**
 *  Service Class for Authentication user related functionality.
 *
 * Created On: 15/11/2022
 */
namespace App\Services;
use App\Constants\GeneralConstant;
use App\Utilities\GeneralUtility;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Constants\ErrorConstant;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
class ProfileService
{

    public function processUserProfileRequest($id)
    { 
        //$client = new \Predis\Client();
        $processingResult['status'] = false;
        try {

            // fetch user to Redis
            $cachedUsers = Redis::get("user_profile_". $id);

            if(!empty($cachedUsers)) {

                $user = json_decode($cachedUsers, FALSE);

                $data = [
                    'message' => 'Fetch User Profile from Redis',
                    'data' => $user
                ];

            }else {

               $user = UserProfile::where('user_id',$id)->first();

               if(empty($user)){
                 throw new UnprocessableEntityHttpException(
                    ErrorConstant::INVALID_USER_IDENTIFIER);
             }
           // Create user to Redis
             Redis::set('user_profile_' . $id, $user);

             $data = [
                'message' => 'Fetch User Profile from database',
                'data' => $users
            ];
        }
         // Creating Response Array to be returned.
        $processingResult['message']['response'] = $data;
        $processingResult['status'] = true;


    } catch (UnprocessableEntityHttpException $ex) {
        throw $ex;
    } catch (\Exception $ex) {
        // Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }

    return $processingResult;
}

public function processProfileCreateRequest($request)
{ 
    $processingResult['status'] = false;
    try {
 
               // Get user details from the database.
        $checkUser = UserProfile::where('user_id',$request['userId'])->first();
      
        // If user details does not exists.
        if (!empty($checkUser)) {

            $checkUser->phone_no = $request['phoneNumber'];
            $checkUser->address = $request['address'];
            $checkUser->dob = $request['dob'];
            $checkUser->gender = $request['gender'];
            $checkUser->city = $request['city'];
            $checkUser->country = $request['country'];
            $checkUser->save();

            // Delete user profile from Redis
             Redis::del('user_profile_' . $checkUser->id);

             // Create user profile to Redis
             Redis::set('user_profile_' . $checkUser->id, $checkUser);

               $data = [
                    'message' => 'Successfully updated user profile',
                    'data' => $checkUser
                ];
        }else{

            $user = new UserProfile;
            $user->user_id = $request['userId'];
            $user->phone_no = $request['phoneNumber'];
            $user->address = $request['address'];
            $user->dob = $request['dob'];
            $user->gender = $request['gender'];

            $user->city = $request['city'];
            $user->country = $request['country'];
            $user->save();

              // Create user profile to Redis
             Redis::set('user_profile_' . $user->id, $user);

               $data = [
                    'message' => 'Successfully created user profile',
                    'data' => $user
                ];
        }

            // Creating Response Array to be returned.
        $processingResult['message']['response'] = $data;
        $processingResult['status'] = true;


    } catch (UnprocessableEntityHttpException $ex) {
        throw $ex;
    } catch (\Exception $ex) {
       // GeneralUtility::logException($ex, __FUNCTION__);
        // Throwing Internal Server Error Response In case of Unknown Errors.
        throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
    }

    return $processingResult;
}

}