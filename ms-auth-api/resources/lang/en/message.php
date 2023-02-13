<?php
/**
 * message file for saving message translations for Application in english language.
 * @author seniordev@ovmyanmar.com
 * Created On: 11/11/2022
 */

return [
    'api' => [
        'response' => [
         'error' => [
            'resource_not_found' => 'The resource request could not be found on the server.',
            'request_unauthorized' => 'The request was found unauthorized to perform the specified task.',
            'request_method_not_allowed' => 'This operation is not allowed on the requested url.',
            'request_timed_out' =>
            'The request has timed out, i.e. request was not received within expected time interval by server.',
            'internal_error' =>
            'An error occurred on the server.  Some extra detail may exist in the Response object.',
            'gateway_timeout' => 'No response received by requesting server within specified time.',
            'server_under_maintainance' => 'Server is under maintenance. We will be back soon.',
            'invalid_content_type' => 'Content-Type not set in the header or the content type/content is invalid.',
            'invalid_request_data' => 'The transaction was rejected due to invalid request content provided.',
            'invalid_content_length' => 'Content Length not set or the content length set is incorrect.',
            'invalid_content_md5' => 'Content-MD5 not set or the md5 set is incorrect.',
            'invalid_date_time' => 'The date/time used is not valid. Please check once again.',
            'empty_auth_header' => 'The authorization fields have empty or null data.',
            'missing_auth_fields' => 'The authorization header has some missing fields.',
            'unauthenticated' => 'Unauthenticated.',
            'invalid_referer' => 'Invalid referer present on the request',
            'invalid_session' => 'Invalid session header present on the request.',
            'invalid_ip_address' => 'Invalid IP address present on the request.',
            'invalid_http_method' => 'Invalid HTTP method present on the request.',
            'invalid_token' => 'Invalid token present on the request.',
            'invalid_credentials' => 'The password entered is incorrect. Please check again.',

            'invalid_user_name' => 'Invalid username provided.',
            'invalid_email' => 'Invalid email address present in the request.',
            'invalid_password' => 'The provided password is invalid.',
            'email_exist' => 'A user already exists with the given email address.',
            'email_does_not_exist' => 'User does not exist. Enter a different account or create a new one.',
            
            'invalid_user_identifier' => 'Invalid user identifier present in the request.',
            'invalid_otp_request' => 'Invalid verification code request.',
            'otp_already_verified' => 'Verification code already verified.',
            'password_confirm_password_does_not_match' => 'The new password and confirm password do not match.',
            'invalid_device_id' => 'Invalid device Id present on the request.',
            'invalid_device_name' => 'Invalid device name present on the request.',
            'invalid_max' => 'The attribute may not be greater than max characters.',
            'invalid_confirm_password' => 'The confirm password is invalid.',
            'incorrect_current_password' => 'The current password entered is incorrect. Please check again.',
            'invalid_current_password' => 'The current password is invalid.',
            'invalid_new_password' => 'The new password is invalid.',
            
        ],

        'success' => [
            'message' => 'success',
            'password_reset' => 'Password reset successfully.',
            'password_change' => 'Password changed successfully.',
            'logout' => 'User logged out successfully.',
        ],

        'failure' => [
            'message' => 'failure'
        ], 

    ]

]
];