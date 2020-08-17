<?php

namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
use app\admin\logic\Login as LoginLogic;

class Login extends Controller
{
    /**
     * 后台登陆
     * @return mixed
     */
    public function index()
    {
        $LoginLogic = new LoginLogic();

        $user = session('qq');
        if($user){
            $admin = \app\admin\model\Member::where('mem_openid',$user['openid'])->where('mem_auth',1)->find();

            if(! $admin){
                $tip = 1;
                $this->assign('tip',$tip);
                return $this->fetch();
            }else{
                $this->redirect('admin/Index/index');
            }
        }else{
            $tip = 1;
            $this->assign('tip',$tip);
            return $this->fetch();
        }




    }
}