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

    use app\common\model\DynamicModel;
    use app\index\model\SystemModel;

    class Time extends Base
    {

        /*
         * 我的动态
         * */
        public function index(){

            $list = DynamicModel::order('id desc')->where(['status' => 1])->paginate(6);

            $contact = SystemModel::config('contact');//联系方式

            return $this->fetch('',[
                'list'      => $list,
                'ct'      => $contact
            ]);
        }


    }