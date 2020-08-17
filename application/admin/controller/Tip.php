<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\Tip as TipModel;
use app\admin\logic\Tip as TipLogic;

class Tip extends Auth
{
	/**
	 * 添加提示
	 * @return array
	 */
	public function add()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$TipLogic = new TipLogic();
			$result = $TipLogic->validata($data);
			if($result['err']!=0){
				return $result;
			}
			$data['tip_addtime']	= date('Y-m-d H:i:s');
			$TipModel = new TipModel();
			$res = $TipModel->add($data);
			if($res !== false){
				return ["err"=>0,"msg"=>"添加Tip完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"添加Tip时发生错误","data"=>""];
			}
		}else{
			return $this->fetch();
		}
	}

	/**
	 * 修改提示
	 * @return array|mixed
	 */
	public function edit()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$TipLogic = new TipLogic();
			$result = $TipLogic->validata($data);
			if($result['err']!=0){
				return $result;
			}
			$TipModel = new TipModel();
			$res = $TipModel->edit($data);
			if($res !== false){
				return ["err"=>0,"msg"=>"修改Tip完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"修改Tip时发生错误","data"=>""];
			}
		}else{
			$id = request()->param('id');
			$TipModel = new TipModel();
			$info = $TipModel::get(['tip_id'=>$id]);
			$this->assign('info',$info);
			return $this->fetch();
		}
	}

	/**
	 * 删除提示
	 * @return array
	 */
	public function delete()
	{
		if(request()->isAjax()){
			$id = request()->param('id');
			$TipModel = new TipModel();
			$res = $TipModel::where('tip_id',$id)->delete();
			if($res !== false){
				return ["err"=>0,"msg"=>"删除Tip完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"删除Tip时发生错误","data"=>""];
			}
		}else{
			return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
		}
	}

	/**
	 * Tip 首页
	 * @return mixed
	 */
	public function index()
	{
		$TipModel = new TipModel();
		$tiplist = $TipModel->order('tip_id desc')->paginate(10);;
		$this->assign('tiplist',$tiplist);
		return $this->fetch();
	}

	/**
	 * 修改菜单排序
	 * @return array
	 */
	public function sort()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$TipModel = new TipModel();
			$res = $TipModel->changeSort($data['sort']);
			if($res !== false){
				return ["err"=>0,"msg"=>"修改排序完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"修改排序完成时发生错误","data"=>""];
			}
		}else{
			return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
		}
	}

	/**
	 * 修改显示
	 * @return array
	 */
	public function view()
	{
		if(request()->isAjax()){
			$data['tip_id'] = request()->param('id');
			$data['tip_view'] = (request()->param('view') == 1 )?0:1;
			$TipModel = new TipModel();
			$res = $TipModel->edit($data);
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