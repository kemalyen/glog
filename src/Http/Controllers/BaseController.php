<?php

namespace Gazatem\Glog\Http\Controllers;

use Gazatem\Glog\Repositories\RepositoryContract;
use Illuminate\Routing\Controller as Controller;

class BaseController extends Controller
{


    public function __construct()
    {
        if (config('glog.auth')) {
            $this->middleware('auth');
        }
    }
}
