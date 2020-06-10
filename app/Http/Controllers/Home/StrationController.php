<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrationController extends Controller
{
    // 加款页面
    public function index()
    {
    	return view('Home.stration.index');
    }

    // 加款目录
    public function record()
    {
    	return view('Home.stration.record');
    }

}
