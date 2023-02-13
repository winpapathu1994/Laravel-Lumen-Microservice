<?php
/**
 *  Service Class for Profile user related functionality.
 *
 * Created On: 15/11/2022
 */
namespace App\Services;
use App\Traits;
use App\Traits\ApiRequestService;
class ProfileService
{

/**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $secret;
   /**
     * @var apiRequestService
     */
     use ApiRequestService;
    public function __construct()
    {
        $this->baseUri = config('constant.profile.base_uri');
        $this->secret = config('constant.profile.secret');
    }

    /**
     * @return string
     */
    public function userProfileService($id)
    {
        return $this->request('GET', '/api/profile/'.$id);
    }

}