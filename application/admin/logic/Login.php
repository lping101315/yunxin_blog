<?php

namespace app\admin\logic;
use app\admin\model\Member as MemberModel;
use think\Db;

class Login
{
    /**
     * 后台登录权限验证
     * @param $uid
     * @return bool
     */
    public function checkaccess($uid)
    {
        $MemberModel = new MemberModel();
        $accesslist = $MemberModel->getAccess();

        if( in_array($uid,$accesslist) ){
            return true;
        }else{
            return false;
        }
    }
}