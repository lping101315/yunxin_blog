<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\Menu as MenuModel;
use app\admin\logic\Menu as MenuLogic;

class Cate extends Auth
{
	/**
	 * 添加菜单
	 * @return array
	 */
	public function add()
	{
		if(request()->isAjax()){
			$menudata = request()->param();
			$Menulogic = new MenuLogic();
			$result = $Menulogic->validata($menudata);
			if($result['err']!=0){
				return $result;
			}
			$menudata['menu_createtime'] = date('Y-m-d H:i:s');
			$menudata['menu_view']		 = 0;
			$MenuModel = new MenuModel();
			$res = $MenuModel->add($menudata);
			if($res !== false){
				return ["err"=>0,"msg"=>"添加菜单完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"添加菜单时发生错误","data"=>""];
			}
		}else{
			$MenuModel = new MenuModel();
			$menulist = merg($MenuModel->select());
			$this->assign('menulist',tree($menulist));
			return $this->fetch();
		}
	}

	/**
	 * 修改菜单
	 * @return array|mixed
	 */
	public function edit()
	{
		if(request()->isAjax()){
			$menudata = request()->param();
			$Menulogic = new MenuLogic();
			$result = $Menulogic->validata($menudata);
			if($result['err']!=0){
				return $result;
			}
			$MenuModel = new MenuModel();
			$res = $MenuModel->edit($menudata);
			if($res !== false){
				return ["err"=>0,"msg"=>"修改菜单完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"修改菜单时发生错误","data"=>""];
			}
		}else{
			$id = request()->param('id');
			$MenuModel = new MenuModel();
			$menuinfo = $MenuModel::get($id);
			$menulist = merg($MenuModel->select());
			$this->assign('menulist',tree($menulist));
			$this->assign('menuinfo',$menuinfo);
			return $this->fetch();
		}
	}

    /**
     * 删除菜单
     * @return array
     */
	public function delete()
	{
		if(request()->isAjax()){
			$id = request()->param('id');
			$MenuModel = new MenuModel();
			$res = $MenuModel::where('menu_id',$id)->delete();
			if($res !== false){
				return ["err"=>0,"msg"=>"删除菜单完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"删除菜单时发生错误","data"=>""];
			}
		}else{
			return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
		}
	}

	/**
	 * 菜单主页
	 * @return mixed
	 */
	public function index()
	{
		$MenuModel = new MenuModel();
		$menulist = $MenuModel->select();
		$this->assign('menulist',tree(merg($menulist)));
		return $this->fetch();
	}

	/**
	 * 修改菜单排序
	 * @return array
	 */
	public function sort()
	{
		if(request()->isAjax()){
			$menudata = request()->param();
			$MenuModel = new MenuModel();
			$res = $MenuModel->changeSort($menudata['sort']);
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
	 * 修改菜单显示
	 * @return array
	 */
	public function view()
	{
		if(request()->isAjax()){
			$menudata['menu_id'] = request()->param('id');
			$menudata['menu_view'] = (request()->param('view') == 1 )?0:1;
			$MenuModel = new MenuModel();
			$res = $MenuModel->edit($menudata);
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