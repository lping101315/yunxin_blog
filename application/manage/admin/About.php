<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2019/12/30
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

    namespace app\manage\admin;

    use app\admin\controller\Admin;
    use app\common\builder\ZBuilder;
    use app\index\model\SystemModel;
    use think\Db;

    class About extends Admin
    {

        /*
         * 关于我们
         * */
        public function about(){

            if(request()->isPost()){
                $post = input('post.');

                unset($post['__token__']);
                SystemModel::config('about', $post);
                $this->success('操作成功');
            }
            $info = SystemModel::config('about');

            return ZBuilder::make('form')
                ->addImage('banner','banner','',$info['banner'])
                ->addWangeditor('about','关于','',$info['about'])
                ->fetch();
        }

        /*
         * 右侧
         * */
        public function aside(){

            if(request()->isPost()){
                $post = input('post.');

                unset($post['__token__']);
                SystemModel::config('about_aside', $post['cont']);
                $this->success('操作成功');
            }
            $info = SystemModel::config('about_aside');

            return ZBuilder::make('form')
                ->addText('cont','签名','',$info)
                ->fetch();
        }


    }