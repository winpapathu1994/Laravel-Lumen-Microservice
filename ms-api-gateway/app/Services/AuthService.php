<?php
/**
 *  Service Class for Authentication user related functionality.
 *
 * Created On: 15/11/2022
 */
namespace App\Services;
use App\Traits;
use App\Traits\ApiRequestService;
class AuthService
{

/**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $secret;


     use ApiRequestService;
    public function __construct()
    {
        $this->baseUri = config('constant.auth.base_uri');
        $this->secret = config('constant.auth.secret');
    
    }

    /**
     * @return string
     */
    public function loginService($data)
    {
        return $this->request('POST', '/api/login',$data);
    }
    /**
     * @return string
     */
    public function registerService($data)
    {
        return $this->request('POST', '/api/register',$data);
    }


}