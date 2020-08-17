<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\Link as LinkModel;
use app\admin\logic\Link as LinkLogic;

class Link extends Auth
{
    /**
     * 添加Link
     * @return array
     */
    public function add()
    {
        if(request()->isAjax()){
            $data = request()->post();
            $LinkLogic = new LinkLogic();
            $result = $LinkLogic->validata($data);
            if($result['err']!=0){
                return $result;
            }
            $LinkModel = new LinkModel();
            $res = $LinkModel->add($data);
            if($res !== false){
                return ["err"=>0,"msg"=>"添加 Link 完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"添加 Link 时发生错误","data"=>""];
            }
        }else{
            return $this->fetch();
        }
    }

    /**
     * 修改Link
     * @return array|mixed
     */
    public function edit()
    {
        if(request()->isAjax()){
            $data = request()->param();
            $LinkLogic = new LinkLogic();
            $result = $LinkLogic->validata($data);
            if($result['err']!=0){
                return $result;
            }
            $LinkModel = new LinkModel();
            if(isset($data['link_favicon']) && $data['link_old_img'] != '/favicon.ico'){
                @unlink('.'.$data['link_old_img']);
            }
            $res = $LinkModel->edit($data);
            if($res !== false){
                return ["err"=>0,"msg"=>"修改 Link 完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"修改 Link 时发生错误","data"=>""];
            }
        }else{
            $id = request()->param('id');
            $LinkModel = new LinkModel();
            $info = $LinkModel::get($id);
            $this->assign('info',$info);
            return $this->fetch();
        }
    }

    /**
     * 删除Link
     * @return array
     */
    public function delete()
    {
        if(request()->isAjax()){
            $id = request()->param('id');
            $LinkModel = new LinkModel();
            $res = $LinkModel::where('link_id',$id)->delete();
            if($res !== false){
                return ["err"=>0,"msg"=>"删除 Link 完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"删除 Link 时发生错误","data"=>""];
            }
        }else{
            return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
        }
    }

    /**
     * Link首页
     * @return mixed
     */
    public function index()
    {
        $LinkModel = new LinkModel();
        $list = $LinkModel->order('link_id desc')->paginate(10);
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 修改Link排序
     * @return array
     */
    public function sort()
    {
        if(request()->isAjax()){
            $data = request()->param();
            $LinkModel = new LinkModel();
            $res = $LinkModel->changeSort($data['sort']);
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
     * 上传Link图 # 非ajax请求返回需要json
     * @return array|\think\response\Json
     */
    public function upload()
    {
        if(request()->isPost()){
            $file = request()->file('image');
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS .'link');
            if($info){
                return json(["err"=>0,"msg"=>"上传完成","data"=>uploadreg($info->getSaveName())]);
            }else{
                return json(["err"=>1,"msg"=>$file->getError(),"data"=>""]);
            }
        }
    }

    /**
     * 修改Link显示
     * @return array
     */
    public function view()
    {
        if(request()->isAjax()){
            $data['link_id'] = request()->param('id');
            $data['link_view'] = (request()->param('view') == 1 )?0:1;
            $LinkModel = new LinkModel();
            $res = $LinkModel->edit($data);
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