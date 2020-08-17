<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\Member as MemberModel;

class Member extends Auth
{
	/**
	 * 会员首页
	 * @return mixed
	 */
	public function index()
	{
		$query		=	request()->param();
		if(isset($query['keyword'])){
			$where['mem_name']	=	['like','%'.$query['keyword'].'%'];
		}else{
			$where = 1;
		}
		$MemberModel = new MemberModel();
		$list = $MemberModel->getList($where);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function setAuth()
    {
        if(request()->isAjax()){
            $data['mem_id']     = request()->param("id");
            $data['mem_auth']   = (request()->param("auth") == 1) ? 0 : 1 ;
            $MemberModel    = new MemberModel();
            $result         = $MemberModel->edit($data);
            if(false !== $result){
                return ["err"=>0,"msg"=>"修改管理员完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"修改管理员时发生错误","data"=>""];
            }
        }else{
            return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
        }
    }
}