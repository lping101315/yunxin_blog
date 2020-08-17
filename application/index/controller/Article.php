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
    use app\common\model\MenuModel;

    class Article extends Base
    {

        /*
         * 首页
         * */
        public function index(){

            $id = input('id');

            $article_where[] = ['art_pid','eq', $id];
            $article = ArticleModel::lists('paginate', $article_where, 'art_id,art_title,art_img,art_remark,art_keyword,art_hit,art_original,art_from,art_author,art_hit,create_time',  'art_id desc')
                ->each(function ($it){

                    $it->com_nums = CommentModel::where(['com_artid' => $it->art_id])->count();

                    return $it;
                });

            $cate_name = MenuModel::where('menu_id', $id)->value('menu_name');

            return $this->fetch('',[
                'article'    => $article,
                'cate_name' => $cate_name
            ]);
        }


        /*
         * 详情
         * */
        public function detail(){

            $id = input('id');

            $info = ArticleModel::where('art_view', 'in', '1,2')->get(['art_id' => $id]);

            if(!$info) $this->error('该文章不存在，请重试！');

            $com_nums = CommentModel::where(['com_artid' => $info->art_id])->count();

            ArticleModel::where('art_id',  $id)->setInc('art_hit');//增加点击量

            $comments = CommentModel::all(['com_artid' => $id]);

            $next = ArticleModel::where('art_id', 'gt', $id)->where('art_view', 'in', '1,2')->find();
            $pre = ArticleModel::where('art_id', 'lt', $id)->where('art_view', 'in', '1,2')->find();
            return $this->fetch('',[
                'info'      => $info,
                'com_nums'  => $com_nums,
                'next'      => $next,
                'pre'       => $pre,
                'comments'  => $comments
            ]);

        }


    }