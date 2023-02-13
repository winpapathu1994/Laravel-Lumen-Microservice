<?php
/**
 *  Service Class for Authentication user related functionality.
 *
 * Created On: 11/11/2022
 */
namespace App\Services;
use App\Constants\GeneralConstant;
use App\Utilities\GeneralUtility;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Constants\ErrorConstant;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
class AuthService
{

    public function processCheckTokenRequest()
    { 
        $processingResult['status'] = false;
        try {
            $user = auth()->user();
            $data = [
                'message' => 'Successfully Authorization Token',
                'data' => $user
            ];

          // Creating Response Array to be returned.
            $processingResult['message']['response'] = $data;

            $processingResult['status'] = true;

        } catch (UnprocessableEntityHttpException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            GeneralUtility::logException($ex, __FUNCTION__);
        // Throwing Internal Server Error Response In case of Unknown Errors.
            throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
        }

        return $processingResult;
    }

    public function processLoginRequest($request)
    { 
        $processingResult['status'] = false;
        try {
               // Get user details from the database.
            $checkUser = User::where('email',$request['email'])->first();

                // If user details does not exists.
            if (empty($checkUser)) {

                throw new UnprocessableEntityHttpException(
                    ErrorConstant::EMAIL_DOES_NOT_EXIST);
            }

            if(Auth::attempt(['email' => $request['email'], 'password'=> $request['password']])){
                $user = auth()->user();
               // Create user to Redis
                Redis::set('user_' .$user->id, $user);

                $token = $user->createToken('Microservice')->plainTextToken;

                $data = [
                    'message' => 'Successfully Login',
                    'token' => $token
                ];

            }else{
                throw new UnprocessableEntityHttpException(ErrorConstant::INVALID_CREDENTIALS);
            }

          // Creating Response Array to be returned.
            $processingResult['message']['response'] = $data;

            $processingResult['status'] = true;


        } catch (UnprocessableEntityHttpException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            GeneralUtility::logException($ex, __FUNCTION__);
        // Throwing Internal Server Error Response In case of Unknown Errors.
            throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
        }

        return $processingResult;
    }

    public function processRegisterRequest($request)
    { 

        $processingResult['status'] = false;
        try {
               // Get user details from the database.
            $checkUser = User::where('email',$request['email'])->first();

                // If user details does not exists.
            if (!empty($checkUser)) {

                throw new UnprocessableEntityHttpException(
                    ErrorConstant::EMAIL_EXIST);
            }

            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->save();

            // Create user to Redis
            Redis::set('user_' .$user->id, $user);

            $token = $user->createToken('Microservice')->plainTextToken;

            $data = [
                'message' => 'Successfully Register',
                'token' => $token
            ];
            // Creating Response Array to be returned.
            $processingResult['message']['response'] = $data;
            $processingResult['status'] = true;


        } catch (UnprocessableEntityHttpException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            GeneralUtility::logException($ex, __FUNCTION__);
        // Throwing Internal Server Error Response In case of Unknown Errors.
            throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
        }

        return $processingResult;
    }

    public function processUserListRequest()
    { 

        $processingResult['status'] = false;
        try {
          // $cachedUsers = Redis::lrange("userList", 0, -1);
            $cachedUsers = Redis::get("userList");
            if(isset($cachedUsers)) {
                $users = json_decode($cachedUsers, FALSE);

                $data = [
                    'message' => 'Fetch All User List from Redis',
                    'data' => $users
                ];

            }else {

                $users = User::all();
           // Create user List to Redis
                Redis::set('userList', $users);

                $data = [
                    'message' => 'Fetch All User List from database',
                    'data' => $users
                ];
            }
         // Creating Response Array to be returned.
            $processingResult['message']['response'] = $data;
            $processingResult['status'] = true;


        } catch (UnprocessableEntityHttpException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            GeneralUtility::logException($ex, __FUNCTION__);
        // Throwing Internal Server Error Response In case of Unknown Errors.
            throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
        }

        return $processingResult;
    }

    public function processUserProfileRequest($id)
    { 

        $processingResult['status'] = false;
        try {
            $cachedUsers = Redis::get("user_".$id);
            if(isset($cachedUsers)) {
                $user = json_decode($cachedUsers, FALSE);

                $data = [
                    'message' => 'Fetch User Profile from Redis',
                    'data' => $user
                ];

            }else {
                $user = User::find($id);
           // Create user List to Redis
                Redis::set('user_' . $id, $user);

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
            GeneralUtility::logException($ex, __FUNCTION__);
        // Throwing Internal Server Error Response In case of Unknown Errors.
            throw new HttpException(500, ErrorConstant::INTERNAL_ERR);
        }

        return $processingResult;
    }


}