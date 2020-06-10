<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
// use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Imports\UsersImport;

use Illuminate\Support\Facades\Storage;
use Cookie;

class LaravelExcelControlle extends Controller
{
    // 导出模板
    public function LaravelExcel(){
    	echo '1';
    	// die;
    
    	$row = [[
            "phone"=>'充值号码',
            "jine"=>'充值金额'
        ]];

       //数据
        $list=[
            0=>[
                "phone"=>'13393051081（此列号码，不允许有空格，第一行标题不允许删除）',
   				"jine"=>'10（此列金额，不允许有单位）'
            ]
        ];
        ob_end_clean();
		ob_start();
        return Excel::download(new UserExport($row,$list),'批量导入模板.csv'); 
    } 

    public function UpdateloadFile(Request $request,Excel $excel){
        $merchant_id = Cookie::get('merchant');
        $file = $request->file('file');

        $data = Excel::toArray(new UsersImport, $file);
        // unset($data[0][0]);
        unset($data[0][0]);
        unset($data[0][1]);
        // 获取上传文件名称
        $originalName = $file->getClientOriginalName();
        // 获取上传文件后缀
        $ext = $file->getClientOriginalExtension();
        // 获取上传文件路径
        $realPath = $file->getRealPath();
        $file->move(public_path().'/Static/batch/'.$merchant_id,'batch.csv');
       

       return redirect('/phone/batch')->with('shuju',$data[0]);
    }

}
