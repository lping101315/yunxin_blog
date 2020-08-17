<?php

namespace app\index\controller;
use app\index\controller\Base;
use think\Session;
use app\index\model\Version as VersionModel;

class Contribute extends Base
{
    /**
     * 投稿
     */
    public function index()
    {	
      	if(request()->isAjax()){
          if(!Session::has('qq')){
			return ["err"=>2,"msg"=>"请先登录","data"=>""];
		}
         $cont=input('post.');

        $this->error('投稿功能开发中，暂时无法提交');

        }
        $this->assign('title',"投稿");
        return $this->fetch('index');
    }
}