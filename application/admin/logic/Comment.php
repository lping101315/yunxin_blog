<?php

namespace app\admin\logic;
use app\admin\model\Comment as CommentModel;

class Comment
{
	/**
	 * 留言 & 评论 回复
	 * @param $data
	 * @return bool
	 */
	public function edit($data)
	{
		$CommentModel = new CommentModel();
		$data['com_rtime']		=	time();
		$data['com_rcontent']	=	$data['content'];
		$data['com_status']		=	$data['content']? 1 : 0;
		$res = $CommentModel->edit($data);
		return ($res !== false) ? true : false ;
	}

	/**
	 * 查询
	 * @param $data
	 * @return mixed
	 */
	public function getList($data)
	{
		$CommentModel = new CommentModel();
		if (isset($data['type'])) {
			if ($data['type'] == 0) {
				$where['c.com_artid'] = ['eq', 0];
			} elseif ($data['type'] == 1) {
				$where['c.com_artid'] = ['neq', 0];
			}
		}
		if (isset($data['status'])) {
			if ($data['status'] == 0) {
				$where['c.com_status'] = ['eq', 0];
			} elseif ($data['status'] == 1) {
				$where['c.com_status'] = ['eq', 1];
			}
		}
		if (isset($data['view'])) {
			if ($data['view'] == 0) {
				$where['c.com_view'] = ['eq', 0];
			} elseif ($data['view'] == 1) {
				$where['c.com_view'] = ['eq', 1];
			}
		}
		if(!isset($data['type']) && !isset($data['status']) && !isset($data['view'])){
			$where = 1;
		}
		$list = $CommentModel->getList($where);
		return $list;
	}

	/**
	 * 验证 回复
	 * @param $data
	 * @return array
	 */
	public function validata($data)
	{
		if($data['com_content'] == ''){
			return ["err"=>1,"msg"=>"请勿清空原评论","data"=>""];
		}
		if($data['content'] == ''){
			return ["err"=>1,"msg"=>"回复内容不能为空","data"=>""];
		}
		if($data['com_view'] == ''){
			return ["err"=>1,"msg"=>"请选择是否显示","data"=>""];
		}
	}
}