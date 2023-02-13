<?php
/**
 * Constant file for storing constant and getting environment related variable.
 *
 * Created On: 15/11/2022
 */
declare(strict_types = 1);

return [

 /*
    |--------------------------------------------------------------------------
    | Access secret key to call from API gateway 
    |----------------------------------------------------------------
    */
    'allowed_access_secrets' => env('ALLOWED_ACCESS_SECRETS'),

    /*
    |--------------------------------------------------------------------------
    | Exception report email
    |--------------------------------------------------------------------------
    |
    | config variable to determine to which email the exceptions need to be sent
    */
    'exception_report_email' => env('EXCEPTION_REPORT_EMAIL'),

    /*
    |--------------------------------------------------------------------------
    | Exception email log flag
    |--------------------------------------------------------------------------
    |
    | Exception report email flag to determine if exceptio to be sent to developer
    */
    'exception_report_email_flag' => env('EXCEPTION_REPORT_EMAIL_FLAG'),

    /*
    |--------------------------------------------------------------------------
    | Exception DB log flag
    |--------------------------------------------------------------------------
    |
    | Exception DB log flag to determine if exception to be log on DB
    */
    'exception_db_log_flag' => 'exception_db.log',

    /*
    |--------------------------------------------------------------------------
    | App environment
    |--------------------------------------------------------------------------
    |
    | config variable to determine the app environment
    */
    'app_env' => env('APP_ENV'),

    /*
    |--------------------------------------------------------------------------
    | Developer emails
    |--------------------------------------------------------------------------
    |
    | These email address will be used to send emails to developers.
    | Such as exceptions, notifications, etc.
    */

    'developer_emails' => ['seniordev@ovmyanmar.com'],
    /*
    |--------------------------------------------------------------------------
    | Exception log file name
    |--------------------------------------------------------------------------
    |
    |This file contain all custom exception thrown in project.
    |
    */

    'exception_log_filename' => 'exception.log',

   
];
