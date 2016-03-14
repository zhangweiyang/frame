<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;

class IndexController extends CommonController
{
    //
    public function index () {
        dd(1111);
        return 'Hello admin!';
    }
}
