<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    // 安全中心首页
    public function index()
    {
    	return view('Home.security.index');
    }
}
