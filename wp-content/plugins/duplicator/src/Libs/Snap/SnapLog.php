<?php

/**
 *
 * @package Duplicator
 * @copyright (c) 2021, Snapcreek LLC
 *
 */

namespace Duplicator\Libs\Snap;

use Error;
use Exception;

class SnapLog
{
    public static $logFilepath      = null;
    public static $logHandle        = null;
    private static $profileLogArray = null;
    private static $prevTS          = -1;

    /**
     * Init log file
     *
     * @param string $logFilepath lof file path
     *
     * @return void
     */
    public static function init($logFilepath)
    {
        self::$logFilepath = $logFilepath;
    }

    /**
     * Remove file log if exists
     *
     * @return void
     */
    public static function clearLog()
    {
        if (file_exists(self::$logFilepath)) {
            if (self::$logHandle !== null) {
                fflush(self::$logHandle);
                fclose(self::$logHandle);
                self::$logHandle = null;
            }
            @unlink(self::$logFilepath);
        }
    }

    /**
     * Write in log passed object
     *
     * @param string  $s     log string
     * @param mixed   $o     object to print
     * @param boolean $flush if true flush log file
     *
     * @return void
     */
    public static function logObject($s, $o, $flush = false)
    {
        self::log($s, $flush);
        self::log(print_r($o, true), $flush);
    }

    /**
     * Write in log file
     *
     * @param string        $s                       string to write
     * @param boolean       $flush                   if true flush log file
     * @param null|callback $callingFunctionOverride @deprecated 4.0.4 not used
     *
     * @return void
     */
    public static function log($s, $flush = false, $callingFunctionOverride = null)
    {
        //   echo "{$s}<br/>";
        $lfp = self::$logFilepath;
        //  echo "logging $s to {$lfp}<br/>";
        if (self::$logFilepath === null) {
            throw new Exception('Logging not initialized');
        }

        if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
            $timepart = $_SERVER['REQUEST_TIME_FLOAT'];
        } else {
            $timepart = $_SERVER['REQUEST_TIME'];
        }

        $thread_id = sprintf("%08x", abs(crc32($_SERVER['REMOTE_ADDR'] . $timepart . $_SERVER['REMOTE_PORT'])));

        $s = $thread_id . ' ' . date('h:i:s') . ":$s";

        if (self::$logHandle === null) {
            self::$logHandle = fopen(self::$logFilepath, 'a');
        }

        fwrite(self::$logHandle, "$s\n");

        if ($flush) {
            fflush(self::$logHandle);

            fclose(self::$logHandle);

            self::$logHandle = fopen(self::$logFilepath, 'a');
        }
    }

    /**
     * Init profiling
     *
     * @return void
     */
    public static function initProfiling()
    {
        self::$profileLogArray = array();
    }

    /**
     * Write profile to log
     *
     * @param string $s profile key
     *
     * @return void
     */
    public static function writeToPLog($s)
    {
        throw new Exception('not implemented');
        $currentTime = microtime(true);

        if (array_key_exists($s, self::$profileLogArray)) {
            $dSame = $currentTime - self::$profileLogArray[$s];
            $dSame = number_format($dSame, 7);
        } else {
            $dSame = 'N/A';
        }

        if (self::$prevTS != -1) {
            $dPrev = $currentTime - self::$prevTS;
            $dPrev = number_format($dPrev, 7);
        } else {
            $dPrev = 'N/A';
        }

        self::$profileLogArray[$s] = $currentTime;
        self::$prevTS              = $currentTime;

        self::log("  {$dPrev}  :  {$dSame}  :  {$currentTime}  :     {$s}");
    }

    /**
     * Get formatted string fo value
     *
     * @param mixed $var           value to convert to string
     * @param bool  $checkCallable if true check if var is callable and display it
     *
     * @return string
     */
    public static function v2str($var, $checkCallable = false)
    {
        if ($checkCallable && is_callable($var)) {
            return '(callable) ' . print_r($var, true);
        }
        switch (gettype($var)) {
            case "boolean":
                return $var ? 'true' : 'false';
            case "integer":
            case "double":
                return (string) $var;
            case "string":
                return '"' . $var . '"';
            case "array":
            case "object":
                return print_r($var, true);
            case "resource":
            case "resource (closed)":
            case "NULL":
            case "unknown type":
            default:
                return gettype($var);
        }
    }

    /**
     * Get exception message file line trace
     *
     * @param Exception|Error $e              exception object
     * @param bool            $displayMessage if true diplay exception message
     *
     * @return string
     */
    public static function getTextException($e, $displayMessage = true)
    {
        $result = ($displayMessage ? $e->getMessage() . "\n" : '');
        return $result . "FILE:" . $e->getFile() . '[' . $e->getLIne() . "]\n" .
        "TRACE:\n" . $e->getTraceAsString();
    }
}
