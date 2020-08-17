<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\Banner as BannerModel;
use app\admin\logic\Banner as BannerLogic;
use think\facade\Env;

class Banner extends Auth
{
	/**
	 * 添加Banner
	 * @return array
	 */
	public function add()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$Bannerlogic = new BannerLogic();
			$result = $Bannerlogic->validata($data);
			if($result['err']!=0){
				return $result;
			}
			$data['ban_createtime']	= date('Y-m-d H:i:s');
			$data['ban_view']		= 0;
			$BannerModel = new BannerModel();
			$res = $BannerModel->add($data);
			if($res !== false){
				return ["err"=>0,"msg"=>"添加Banner完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"添加Banner时发生错误","data"=>""];
			}
		}else{
			return $this->fetch();
		}
	}

	/**
	 * 修改Banner
	 * @return array|mixed
	 */
	public function edit()
	{
		if(request()->isAjax()){
			$data = request()->param();

			$Bannerlogic = new BannerLogic();
			$result = $Bannerlogic->validata($data);
			if($result['err']!=0){
				return $result;
			}
			$BannerModel = new BannerModel();
			if(isset($data['ban_new_img'])){
				@unlink('.'.$data['ban_old_img']);
                $data['ban_img'] = $data['ban_new_img'];
			}
			$res = $BannerModel->edit($data);
			if($res !== false){
				return ["err"=>0,"msg"=>"修改Banner完成"];
			}else{
				return ["err"=>1,"msg"=>"修改Banner时发生错误"];
			}
		}else{
			$id = request()->param('id');
			$BannerModel = new BannerModel();
			$info = $BannerModel::get($id);
			$this->assign('info',$info);
			return $this->fetch();
		}
	}

    /**
     * 删除Banner
     * @return array
     */
	public function delete()
	{
		if(request()->isAjax()){
			$id = request()->param('id');
			$BannerModel = new BannerModel();
			$res = $BannerModel::where('ban_id',$id)->delete();
			if($res !== false){
				return ["err"=>0,"msg"=>"删除Banner完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"删除Banner时发生错误","data"=>""];
			}
		}else{
			return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
		}
	}

	/**
	 * Banner首页
	 * @return mixed
	 */
	public function index()
	{
		$Banner = new BannerModel();
		$bannerlist = $Banner->order('ban_id desc')->paginate(10);
		$this->assign('bannerlist',$bannerlist);
		return $this->fetch();
	}

	/**
	 * 修改Banner排序
	 * @return array
	 */
	public function sort()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$Banner = new BannerModel();
			$res = $Banner->changeSort($data['sort']);
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
	 * 上传banner图 # 非ajax请求返回需要json
	 * @return array|\think\response\Json
	 */
	public function upload()
	{
		if(request()->isPost()){
			$file = request()->file('image');
			$info = $file->move(Env::get('ROOT_PATH') . 'public/uploads/banner');
			if($info){
				return json(["err"=>0,"msg"=>"上传完成","data"=>['url'=>uploadreg($info->getSaveName())]]);
			}else{
				return json(["err"=>1,"msg"=>$file->getError(),"data"=>""]);
			}
		}
	}

	/**
	 * 修改Banner显示
	 * @return array
	 */
	public function view()
	{
		if(request()->isAjax()){
			$data['ban_id'] = request()->param('id');
			$data['ban_view'] = (request()->param('view') == 1 )?0:1;
			$Banner = new BannerModel();
			$res = $Banner->edit($data);
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