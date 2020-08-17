<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/21
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

    class Contact extends Admin
    {
        public function contact(){

            if(request()->isPost()){
                $post = input('post.');
                SystemModel::config('contact',$post);
                $this->success('操作成功');
            }

            $ct = SystemModel::config('contact');
            return ZBuilder::make('form')
                ->addText('email', '邮箱', '', $ct['email'])
                ->addText('qq', 'qq', '', $ct['qq'])
                ->addText('sina', '微博', '', $ct['sina'])
                ->addText('net_easy', '网易云音乐', '', $ct['net_easy'])
                ->fetch();

        }


    }