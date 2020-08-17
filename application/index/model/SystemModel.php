<?php
//+--------------------------------------------------
//Author：Snow  main@ainixch.cn
//Date:2019/9/23
//+--------------------------------------------------
//
//      ┏┛ ┻━━━━━┛ ┻┓
//      ┃　　　　　　 ┃
//      ┃　　　━　　　┃
//      ┃　┳┛　  ┗┳　┃
//      ┃　　　　　　 ┃
//      ┃　　　┻　　　┃
//      ┃　　　　　　 ┃
//      ┗━┓　　　┏━━━┛
//        ┃　　　┃   神兽保佑
//        ┃　　　┃   代码无BUG！
//        ┃　　　┗━━━━━━━━━┓
//        ┃　　　　　　　    ┣┓
//        ┃　　　　         ┏┛
//        ┗━┓ ┓ ┏━━━┳ ┓ ┏━┛
//          ┃ ┫ ┫   ┃ ┫ ┫
//          ┗━┻━┛   ┗━┻━┛
//+--------------------------------------------------

namespace app\index\model;

use think\Db;
use think\Model;

/*
 * 系统控制器
 * */
class SystemModel extends Model {

    public static function webConf(){

        $conf = Db::name('admin_config')
                ->where('group','in','base')
                ->field('name,value')
                ->select();

        $confs = [];

        foreach ($conf as $v){
            $confs[$v['name']]=$v['name']=='web_site_logo'?get_file_path($v['value']):$v['value'];
        }

        return $confs;
    }


    /*
             * 获取单个配置项
             * */
    public static function config($config,$value=''){

        $conf=Db::name('config');
        $val=$conf->where('name',$config)->find();

        if(!empty($value)){
            //更新配置
            $conf->where('id',$val['id'])->update([
                'value'     =>$val['type']=='json'?json_encode($value):$value,
                'up_time'   =>now(),
                'id'        =>$val['id']
            ]);

            return true;
        }elseif($val['type']=='json'){
            return json_decode($val['value'],true);
        }else{
            return $val['value'];
        }
    }



}