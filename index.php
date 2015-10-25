<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/24
 * Time: 23:21
 */
Frame::run();

class Frame{
    public static function run () {
        self::_ini_set();
        self::_ini_const();
        self::_ini_require();
        load();
    }

    protected static function _ini_set () {
        ini_set('display_errors', 1);
        date_default_timezone_set('PRC');
    }

    protected static function _ini_const () {
        $base_folder = '.';
        $base = rtrim(realpath($base_folder), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $system_folder = 'system';
        $system = rtrim(realpath($system_folder), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        define('BASE_PATH', $base);
        define('SYSTEM_PATH', $system);
        define('CORE_PATH', $system . 'core' . DIRECTORY_SEPARATOR);
    }

    protected static function _ini_require () {
        require_once CORE_PATH . 'loader.php';
    }
}