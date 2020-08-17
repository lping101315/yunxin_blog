<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/18
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

    namespace app\common\model;

    use think\Model;

    class VersionModel extends Model
    {

        protected $name = 'version';
        protected $pk = 'id';

        public function getVerAddtimeAttr($v){
            if(!preg_match('/admin/',$_SERVER['REQUEST_URI'])){
                return now($v);
            }
            return $v;
        }
    }