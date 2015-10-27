<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/24
 * Time: 23:39
 */

function load () {
    check_uri();
    check_permission();
    if ($_GET['a']) {
        load_action($_GET['a']);
    }else {
        load_view($_GET['v']);
    }
}

function check_permission () {

}

function load_action ($a) {
    $path = ACTION_PATH . get_path($a);
    file_exists($path) || _404('访问的方法不存在');
    require($path);
    $action = new ACTION();
    $action->run();
}

function load_view ($v) {
    $path = VIEW_PATH . get_path($v);
    file_exists($path) || _404('访问的页面不存在');
    require($path);
}

function get_path ($arg) {
    $tmp_arr = explode('/', $arg);
    $len = count($tmp_arr);
    $file = $dir = '';
    if ($len == 1) {
        $file = $tmp_arr[0] . EXT;
    } elseif ($len == 2) {
        $dir  = $tmp_arr[0] . DIRECTORY_SEPARATOR;
        $file = $tmp_arr[1] . EXT;
    } else {
        for ($i=0; $i<$len; $i++) {
            if ($i < $len-1) {
                $dir .= $tmp_arr[$i] . DIRECTORY_SEPARATOR;
            } else {
                $file = $tmp_arr[$i] . EXT;
            }
        }
    }
    $path = $dir . $file;
    return $path;
}

function check_uri () {
    $_GET || $_GET['v'] = 'login';
    if (!isset($_GET['a']) && !isset($_GET['v'])) {
        _404 ();
    }
}

function _404 ($msg = '访问不存在') {
    exit($msg);
}
