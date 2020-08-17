<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/4/21
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

    namespace app\api\home;

    use app\common\model\ArticleModel;

    class Article extends Base
    {
        public function index(){

            $list = ArticleModel::field('art_id,art_title,art_img,art_remark,art_hit,art_author')
                ->order('art_id desc')
                ->limit(0,15)
                ->select();

            $this->succ($list);
        }


        /*
         * 文章详情
         * */
        public function detail(){

            $id = input('id');

            $info = ArticleModel::field('art_title,art_author,art_content,art_pid,art_keyword,art_hit,art_img,create_time')->get($id);

            $info->create_time = time_to_date_frdly($info->create_time);
            if(preg_match('/\/uploads\/images\//',$info->art_content) ){

                $info->art_content = str_replace('/uploads/images/', get_host().'uploads/images/',$info->art_content);
            }
            $this->succ($info);
        }


    }