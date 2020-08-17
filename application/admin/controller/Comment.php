<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\logic\Comment as CommentLogic;
use app\admin\model\Comment as CommentModel;

class Comment extends Auth
{
    /**
     * 删除留言 & 评论
     * @return array
     */
    public function delete()
    {
        if(request()->isAjax()){
            $id = request()->param('id');
            $CommentModel = new CommentModel();
            $res = $CommentModel::where('com_id',$id)->delete();
            if($res !== false){
                return ["err"=>0,"msg"=>"删除评论完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"删除评论时发生错误","data"=>""];
            }
        }else{
            return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
        }
    }


	/**
	 * 留言 & 评论 查看 回复
	 * @return array|mixed
	 */
	public function edit()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$CommentLogic = new CommentLogic();
			$result = $CommentLogic->validata($data);
			if($result['err']!=0){
				return $result;
			}
			$res = $CommentLogic->edit($data);
			if($res !== false){
				return ["err"=>0,"msg"=>"回复评论完成"];
			}else{
				return ["err"=>1,"msg"=>"回复评论时发生错误"];
			}
		}else{
			$id = request()->param('id');
			$CommentModel = new CommentModel();
			$info = $CommentModel->getInfo($id);
			$this->assign('info',$info);
			return $this->fetch();
		}
	}

	/**
	 * 留言 & 评论 首页
	 * @return mixed
	 */
	public function index()
	{
		$data = request()->param();
		$CommentLogic = new CommentLogic();
		$list = $CommentLogic->getList($data);
		$this->assign('list',$list);
		return $this->fetch();
	}

    /**
     * 修改显示
     * @return array
     */
    public function view()
    {
        if(request()->isAjax()){
            $data['com_id'] = request()->param('id');
            $data['com_view'] = (request()->param('view') == 1 )?0:1;
            $CommentModel = new CommentModel();
            $res = $CommentModel->edit($data);
            if($res !== false){
                return ["err"=>0,"msg"=>"修改显示状态完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"修改显示状态时发生错误","data"=>""];
            }
        }else{
            return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
        }
    }

}