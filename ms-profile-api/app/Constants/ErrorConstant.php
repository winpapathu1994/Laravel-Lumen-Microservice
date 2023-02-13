<?php
/**
 * Error Constants file for Storing Error Message codes and Message Text for Application.
 *
 * Created On: 15/11/2022
 */

namespace App\Constants;

final class ErrorConstant
{
    const SERVER_UNDER_MAINTENACE = 'SERVERUNDERMAINTENACE';
    const INVALID_AUTHORIZATION = 'INVALIDAUTHORIZATION';
    const RESOURCE_NOT_FOUND = 'NORESOURCEFOUND';
    const METHOD_NOT_ALLOWED = 'METHODNOTALLOWED';
    const REQ_TIME_OUT = 'REQTIMEOUT';
    const INTERNAL_ERR = 'INTERNALERR';
    const GATEWAY_TIMEOUT = 'GATEWAYTIMEOUT';
    const INVALID_CONTENT_TYPE = 'INVALIDCONTENTTYPE';
    const INVALID_REQ_DATA = 'INVALIDREQDATA';
    const INVALID_CONTENT_LENGTH = 'INVALIDCONTENTLEN';
    const INVALID_CONTENTMD5 = 'INVALIDCONTENTMD5';
    const INVALID_DATE_TIME = 'INVALIDDATETIME';
    const EMPTY_AUTH_HEADER = 'EMPTYAUTHHEAD';
    const MISSING_AUTH_FIELD = 'MISSINGAUTHFIELD';
    const UNAUTHENTICATION = 'UNAUTHENTICATION';
    const INVALID_REFERER = 'INVALIDREFERER';
    const INVALID_SESSION = 'INVALIDSESSION';
    const INVALID_USER_ROLE = 'INVALIDUSERROLE';
    const INVALID_EMAIL = 'INVALIDEMAIL';
    const INVALID_MOBILE_NUMBER = 'INVALIDMOBILENUMBER';
    const INVALID_PASSWORD = 'INVALIDPASSWORD';
    const INVALID_USER_IDENTIFIER = 'INVALIDUSERIDENTIFIER';
    const EMAIL_EXIST = 'EMAILEXIST';
    const EMAIL_DOES_NOT_EXIST = 'EMAILDOESNOTEXIST';
    const MOBILE_NUMBER_DOES_NOT_EXIST = 'MOBILENUMBERDOESNOTEXIST';
    const PASSWORD_CONFIRM_PASSWORD_DOES_NOT_MATCH = 'PASSWORDCONFIRMASSWORDDOESNOTMATCH';
    const INCORRECT_CURRENT_PASSWORD = 'INCORRECTCURRENTPASSWORD';
    const INVALID_CURRENT_PASSWORD = 'INVALIDCURRENTPASSWORD';
    const INVALID_NEW_PASSWORD = 'INVALIDNEWPASSWORD';
    const INVALID_CONFIRM_PASSWORD = 'INVALIDCONFIRMPASSWORD';

    const INVALID_CREDENTIALS = 'INVALIDCREDENTIALS';
    const INVALID_DEVICE_ID = 'INVALIDDEVICEID';
    const INVALID_DEVICE_NAME = 'INVALIDDEVICENAME';
    const INVALID_IP_ADDRESS = 'INVALIDIPADDRESS';
    const INVALID_HTTP_METHOD = 'INVALIDHTTPMETHOD';
    const INVALID_TOKEN = 'INVALIDTOKEN';

    const INVALID_MAX = 'INVALIDMAX';
    const INVALID_USER_NAME = 'INVALIDUSERNAME';

    public static $errorCodeMap = [
        self::INVALID_SESSION => ['code' => '1000', 'message' => 'api.response.error.invalid_session'],
        self::EMAIL_EXIST => ['code' => '1001', 'message' => 'api.response.error.email_exist'],
          self::EMAIL_DOES_NOT_EXIST => ['code' => '1002', 'message' => 'api.response.error.email_does_not_exist'],
        self::SERVER_UNDER_MAINTENACE => ['code' => '1003', 'message' => 'api.response.error.server_under_maintainance'],
        self::INVALID_AUTHORIZATION => ['code' => '1004', 'message' => 'api.response.error.request_unauthorized'],
        self::RESOURCE_NOT_FOUND => ['code' => '1005', 'message' => 'api.response.error.resource_not_found'],
        self::METHOD_NOT_ALLOWED => ['code' => '1006', 'message' => 'api.response.error.request_method_not_allowed'],
        self::REQ_TIME_OUT => ['code' => '1007', 'message' => 'api.response.error.request_timed_out'],
        self::INTERNAL_ERR => ['code' => '1008', 'message' => 'api.response.error.internal_error'],
        self::GATEWAY_TIMEOUT => ['code' => '1009', 'message' => 'api.response.error.gateway_timeout'],
        self::INVALID_CONTENT_TYPE => ['code' => '1010', 'message' => 'api.response.error.invalid_content_type'],
        self::INVALID_REQ_DATA => ['code' => '1011', 'message' => 'api.response.error.invalid_request_data'],
        self::INVALID_CONTENT_LENGTH => ['code' => '1012', 'message' => 'api.response.error.invalid_content_length'],
        self::INVALID_CONTENTMD5 => ['code' => '1013', 'message' => 'api.response.error.invalid_content_md5'],
        self::INVALID_DATE_TIME => ['code' => '1014', 'message' => 'api.response.error.invalid_date_time'],
        self::EMPTY_AUTH_HEADER => ['code' => '1015', 'message' => 'api.response.error.empty_auth_header'],
        self::MISSING_AUTH_FIELD => ['code' => '1016', 'message' => 'api.response.error.missing_auth_fields'],
        self::UNAUTHENTICATION => ['code' => '1017', 'message' => 'api.response.error.unauthenticated'],
        self::INVALID_REFERER => ['code' => '1018', 'message' => 'api.response.error.invalid_referer'],
        self::INVALID_USER_ROLE => ['code' => '1019', 'message' => 'api.response.error.invalid_user_role'],
        self::INVALID_EMAIL => ['code' => '1020', 'message' => 'api.response.error.invalid_email'],
        self::INVALID_PASSWORD => ['code' => '1021', 'message' => 'api.response.error.invalid_password'],
        self::INVALID_USER_IDENTIFIER => ['code' => '1022', 'message' => 'api.response.error.invalid_user_identifier'],
        self::INVALID_CREDENTIALS => ['code' => '1023', 'message' => 'api.response.error.invalid_credentials'],
        self::INVALID_DEVICE_ID => ['code' => '1024', 'message' => 'api.response.error.invalid_device_id'],
        self::INVALID_DEVICE_NAME => ['code' => '1025', 'message' => 'api.response.error.invalid_device_name'],
        self::INVALID_IP_ADDRESS => ['code' => '1026', 'message' => 'api.response.error.invalid_ip_address'],
        self::INVALID_HTTP_METHOD => ['code' => '1027', 'message' => 'api.response.error.invalid_http_method'],
        self::INVALID_TOKEN => ['code' => '1028', 'message' => 'api.response.error.invalid_token'],
        self::INVALID_MAX => ['code' => '1029', 'message' => 'api.response.error.invalid_max'],
        self::INCORRECT_CURRENT_PASSWORD => ['code' => '1030', 'message' => 'api.response.error.incorrect_current_password'],
        self::INVALID_CURRENT_PASSWORD => ['code' => '1031', 'message' => 'api.response.error.invalid_current_password'],
        self::INVALID_NEW_PASSWORD => ['code' => '1032', 'message' => 'api.response.error.invalid_new_password'],
        self::INVALID_CONFIRM_PASSWORD => ['code' => '1033', 'message' => 'api.response.error.invalid_confirm_password'],
        self::INVALID_USER_NAME => ['code' => '1034', 'message' => 'api.response.error.invalid_user_name'],
    ];
}

