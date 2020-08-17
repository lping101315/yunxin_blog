<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use think\facade\Env;
class Page extends Auth
{
	/**
	 * 关于单页
	 * @return array|mixed
	 */
	public function index()
	{
		$path = Env::get('app_path').'index/view/about_index.html';
		if(!file_exists($path)){
			abort('404','模板文件不存在!');
		}
		if(request()->isAjax()){
			$data = request()->param('content');
			$result = file_put_contents($path,str_replace('<p><br></p>','',$data));
			if(is_int($result)){
				return ["err"=>0,"msg"=>"修改单页完成","data"=>""];
			}else{
				return ["err"=>0,"msg"=>"修改单页时发生错误完成","data"=>""];
			}
		}else{
			$html = file_get_contents($path);
			$this->assign('html',$html);
			return $this->fetch();
		}
	}
}