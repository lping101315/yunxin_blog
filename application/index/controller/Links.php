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

    use app\common\model\LinkModel;

    class Links extends Base
    {

        /*
         * 友情链接
         * */
        public function index(){

            $list = LinkModel::lists('index', ['link_view' => 1]);

            return $this->fetch('',[
                'lt'    => $list
            ]);
        }


    }