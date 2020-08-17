<?php

namespace app\admin\logic;
use app\admin\model\Article as ArticleModel;
class Article
{
	/**
	 * 添加文章 [补全参数]
	 * @param $data
	 * @return bool
	 */
	public function add($data)
	{
		$data['art_img']	= makeImg($data['art_img']);
		$data['art_addtime']= time();
		$data['art_from']   = getOs();
		$data['art_city']   = (request()->ip() == '127.0.0.1')?"本机地址":getCity(request()->ip());
		$data['art_down']   = (isset($data['art_file'])) ? 1 : 0 ;
		$ArticleModel = new ArticleModel();
		$res = $ArticleModel->add($data);
		return ($res !== false) ? true : false ;
	}

	/**
	 * 修改文章 [补全参数]
	 * @param $data
	 * @return bool
	 */
	public function edit($data)
	{
		@unlink($data['art_old_img']);
		$data['art_img']	= makeImg($data['art_img']);
        $data['art_down']   = ($data['art_pid'] == 99) ? 1 : 0 ;
		$ArticleModel = new ArticleModel();
		$res = $ArticleModel->edit($data);
		return ($res !== false) ? true : false ;
	}

	/**
	 * 验证 添加 和 修改
	 * @param $data
	 * @return array
	 */
	public function validata($data)
	{
		if($data['art_title'] == ''){
			return ["err"=>1,"msg"=>"请填写文章标题","data"=>""];
		}
		if($data['art_pid'] == ''){
			return ["err"=>1,"msg"=>"请选择文章栏目","data"=>""];
		}
		if($data['art_keyword'] == ''){
			return ["err"=>1,"msg"=>"请输入关键词，用中文逗号分隔","data"=>""];
		}
		if($data['art_original'] == 0 && $data['art_url'] == ''){
			return ["err"=>1,"msg"=>"非原创文章请填写来源","data"=>""];
		}
		if($data['art_content'] == ''){
			return ["err"=>1,"msg"=>"请填写文章正文内容","data"=>""];
		}
	}
}