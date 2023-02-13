<?php
/**
 * @author seniordev@ovmyanmar.com
 * Created On: 11/11/2022
 */
declare(strict_types = 1);

namespace App\Utilities;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Exception;
use function config;
/**
 * This is a helper class to handle all log operations.
 *
 * Class FileUtility
 * @package App\Utilities
 */
class FileUtility
{
    /**
     * Helper function to write all logs to custom files.
     *
     * @param $filename
     * @param $logContent
     * @param bool $forced
     * @return bool
     */
    public static function writeCustomLog($filename, $logContent)
    {

        // Get log file path.
        $path = storage_path('logs/'. $filename);

        // Add log timestamp
        $content = array(Carbon::now(), $logContent);

        //Append write to log file.
        File::append($path, PHP_EOL . json_encode($content) . PHP_EOL);

        return true;
    }

}
