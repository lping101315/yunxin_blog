<?php

namespace app\admin\controller;
use app\admin\controller\Auth;
use app\admin\model\Version as VersionModel;
use app\admin\logic\Version as VersionLogic;

class Version extends Auth
{
    /**
     * 添加提示
     * @return array
     */
    public function add()
    {
        if(request()->isAjax()){
            $data = request()->param();
            $VersionLogic = new VersionLogic();
            $result = $VersionLogic->validata($data);
            if($result['err']!=0){
                return $result;
            }
            $data['ver_addtime']	= date('Y-m-d H:i:s');
            $VersionModel = new VersionModel();
            $res = $VersionModel->add($data);
            if($res !== false){
                return ["err"=>0,"msg"=>"添加新版本完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"添加新版本时发生错误","data"=>""];
            }
        }else{
            $VersionModel   = new VersionModel();
            $lastversion    = $VersionModel::max("ver_bate");
            $this->assign("lastversion",$lastversion ? $lastversion : "0");
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
            $VersionLogic = new VersionLogic();
            $result = $VersionLogic->validata($data);
            if($result['err']!=0){
                return $result;
            }
            $VersionModel = new VersionModel();
            $res = $VersionModel->edit($data);
            if($res !== false){
                return ["err"=>0,"msg"=>"修改版本完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"修改版本时发生错误","data"=>""];
            }
        }else{
            $id = request()->param('id');
            $VersionModel = new VersionModel();
            $lastversion    = $VersionModel::max("ver_bate");
            $info = $VersionModel::get($id);
            $this->assign("lastversion",$lastversion ? $lastversion : "0");
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
            $VersionModel = new VersionModel();
            $res = $VersionModel::where('ver_id',$id)->delete();
            if($res !== false){
                return ["err"=>0,"msg"=>"删除版本完成","data"=>""];
            }else{
                return ["err"=>1,"msg"=>"删除版本时发生错误","data"=>""];
            }
        }else{
            return ["err"=>1,"msg"=>"错误的请求方式","data"=>""];
        }
    }

    /**
     * Version 首页
     * @return mixed
     */
    public function index()
    {
        $VersionModel = new VersionModel();
        $versionlist = $VersionModel->order('ver_id desc')->paginate(10);;
        $this->assign('versionlist',$versionlist);
        return $this->fetch();
    }

}