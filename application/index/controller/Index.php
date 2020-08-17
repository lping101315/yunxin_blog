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

    use app\common\model\ArticleModel;
    use app\common\model\CommentModel;

    class Index extends Base
    {

        /*
         * 首页
         * */
        public function index(){

            $key = trim(input('key'));

            if($key){
                $article_where[] = ['art_title', 'like', '%'.$key.'%'];
            }
            $article_where[] = ['art_view', 'in', '1,2'];

            $article = ArticleModel::lists('paginate', $article_where, 'art_id,art_title,art_img,art_remark,art_keyword,art_hit,art_original,art_from,art_author,art_hit,create_time',  'art_id desc')
                    ->each(function ($it){

                        $it->com_nums = CommentModel::where(['com_artid' => $it->art_id])->count();//TODO:统计评论，后续更新将评论数加入字段

                        return $it;
                    });

            return $this->fetch('',[
                'article'    => $article,
                'key'        => $key
            ]);
        }


    }