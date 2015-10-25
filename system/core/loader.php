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

    }
}

function check_permission () {

}

function load_action () {

}

function load_view () {

}

function check_uri () {
    $_GET || $_GET['v'] = 'login';
    if (!isset($_GET['a']) && !isset($_GET['v'])) {
        _404 ();
    }
}

function _404 () {
    exit('访问不存在');
}