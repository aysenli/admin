<?php

namespace Zhuayi\admin\Base;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class BaseController extends Controller {

    // 页面标题
    public $title;

    // 搜索条件 
    // $this->search = [
    //     ['客户名称', 'user_name'],
    //     ['证件类型', 'zhengjianleixing'],
    //     ['证件号码', 'zhengjianhaoma'],
    //     ['合同编号', 'zhengjianhaoma'],
    //     ['合同编号', '所属机构'],
    // ];
    public $search = array();

    public function view($tpl, $show = array()) {

        $show['search'] = $this->search;
        return View($tpl, ['title' => $this->title, 'show' => $show]);
    }

}
