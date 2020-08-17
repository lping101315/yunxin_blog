<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/7
//+--------------------------------------------------
//.--,       .--,
// ( (  \.---./  ) )
//  '.__/o   o\__.'
//     {=  ^  =}
//      >  -  <
//     /       \
//    //       \\
//   //|   .   |\\
//   "'\       /'"_.-~^`'-.
//      \  _  /--'         `
//    ___)( )(___
//   (((__) (__)))    高山仰止,景行行止.虽不能至,心向往之。
//+--------------------------------------------------

    namespace app\index\controller;

    use app\common\model\VersionModel;
    use app\index\model\SystemModel;
    use think\facade\Cache;

    class About extends Base
    {

        /*
         * 关于
         * */
        public function index(){

            if(!($info = Cache::get('ca_about'))){
                $info = SystemModel::config('about');
                Cache::set('ca_about',$info);
            }

            if(!($version = Cache::get('ca_version'))){
                $version = VersionModel::order('id desc')->select();
                Cache::set('ca_version',$version);
            }
            return $this->fetch('',[
                'info'      => $info,
                'version'   => $version
            ]);
        }


    }