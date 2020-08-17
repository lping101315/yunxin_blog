<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\Comment as CommentModel;
use app\admin\model\Menu as MenuModel;
use app\admin\model\Article as ArticleModel;
use app\admin\logic\Article as AtricleLogic;
use think\Db;
use think\facade\Env;
class Article extends Auth
{

	/**
	 * 添加文章
	 * @return array
	 */
	public function add()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$AtricleLogic = new AtricleLogic();
			$result = $AtricleLogic->validata($data);
			if($result['err']!=0){
				return $result;
			}
          	unset($data['/admin-article-add_html']);
			$res = $AtricleLogic->add($data);
			if($res !== false){
				return ["err"=>0,"msg"=>"添加文章完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"添加文章时发生错误","data"=>""];
			}
		}else{
			$MenuModel	= new MenuModel();
			$menulist	= $MenuModel::where('menu_parent','neq','0')->where('menu_view','neq',0)->select();
			$this->assign('menulist',$menulist);
			return $this->fetch();
		}
		die;
	}

	/**
	 * 修改文章
	 * @return array|mixed
	 */
	public function edit()
	{
		if(request()->isAjax()){
			$data = request()->param();
			$AtricleLogic = new AtricleLogic();
			$result = $AtricleLogic->validata($data);
			if($result['err']!=0){
				return $result;
			}
			$res = $AtricleLogic->edit($data);
			if($res !== false){
				return ["err"=>0,"msg"=>"修改文章完成","data"=>""];
			}else{
				return ["err"=>1,"msg"=>"修改文章时发生错误","data"=>""];
			}
		}else{
			$MenuModel	= new MenuModel();
			$menulist	= $MenuModel::where('menu_parent','neq','0')->where('menu_view','neq',0)->select();
			$this->assign('menulist',$menulist);
			$id = request()->param('id');
			$ArticleModel = new ArticleModel();
			$info = $ArticleModel::get($id);
			$this->assign('info',$info);
			return $this->fetch();
		}
	}

	/**
	 * 删除文章
	 */
	public function delete()
	{
		if(request()->isAjax()){
			$id = request()->param('id');
            Db::startTrans();
			$ArticleModel = new ArticleModel();
			$res = $ArticleModel::where('art_id',$id)->delete();
			$CommentModle = new CommentModel();
			$com = $CommentModle::where("com_artid",$id)->delete();
			if($res !== false && $com !== false){
			    Db::commit();
				return ["err"=>0,"msg"=>"删除文章和文章下的评论完成","data"=>""];
			}else{
			    Db::rollback();
				return ["err"=>1,"msg"=>"删除文章时发生错误","data"=>""];
			}
		}else{
			return ["err"=>1,"msg"=>"错误的请求方式"];
		}
	}

	/**
	 * 文章首页
	 * @return mixed
	 */
	public function index()
	{
		$query		=	request()->param();
		if(isset($query['keyword'])){
			$where['a.art_title']	=	['like','%'.$query['keyword'].'%'];
		}
        if(isset($query['type'])){
            $where['a.art_down']	=	$query['type'];
        }
        if(empty($where)){
            $where = true;
        }
		$ArticleModel = new ArticleModel();
		$list = $ArticleModel->getList($where);
		$this->assign('list',$list);
		return $this->fetch();
	}

    /**
     * 文章上传图片
     * @return mixed
     */
	public function uploadimage()
	{
		if(request()->isPost()){
			$file = request()->file('image');

			//添加水印
            $file2 =  \think\Image::open($file);

			$info = $file->move(Env::get('ROOT_PATH') . 'public/uploads');
			if($info){
			    $src = uploadreg('uploads/'.$info->getSaveName());
                $fil = $file2->water('static/home/img/icon/qcct.png',\think\Image::WATER_NORTHWEST,50)
                        ->text('https://www.glping.net','static/ttf/pingfang.ttf',14,'#FF6A6A')
                        ->save($src);
				return $src;
			}
		}
	}

    /**
     * 文章上传附件
     * @return mixed
     */
	public function uploadfile()
    {
        if(request()->isPost()){
            $file = request()->file('file');
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS .'file','');
            if($info){
                $path =  uploadreg('uploads/file/'.$info->getSaveName());
                return json(["err"=>0,"msg"=>"上传附件完成","data"=>$path]);
            }
        }
    }

	/**
	 * 修改显示
	 * @return array
	 */
	public function view()
	{
		if(request()->isAjax()){
			$data['art_id'] = request()->param('id');
			$data['art_view'] = (request()->param('view') == 1 )?0:1;
			$ArticleModel = new ArticleModel();
			$res = $ArticleModel->edit($data);
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