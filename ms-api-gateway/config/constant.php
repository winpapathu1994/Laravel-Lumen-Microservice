<?php
/**
 * Constant file for storing constant and getting environment related variable.
 *
 * Created On: 11/11/2022
 */

return [
    'auth' => [
        'base_uri' => env('AUTH_SERVICE_BASE_URI'),
        'secret' => env('AUTH_SERVICE_SECRET')
    ],
    'profile' => [
        'base_uri' => env('PROFILE_SERVICE_BASE_URI'),
        'secret' => env('PROFILE_SERVICE_SECRET')
    ],
];
