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
    namespace app\index\controller;
    use app\common\model\CommentModel;

    class Comment extends Base
    {

        /*
         * 列表
         * */
        public function index(){

            $list = CommentModel::all(['com_artid' => 0, 'com_view' =>1]);

            return $this->fetch('',[
                'list'      => $list
            ]);
        }

        /*
         * 新评论
         * */
        public function newComment(){
            if(request()->isAjax()){
                if(!$this->user) return ['err' => -1121, 'msg' => '请登录后操作', 'err_icon' => 'error'];

                $post = input('post.');

                if(time() - session('comment_time') <60){
                    return ['err' => -123, 'msg' => '提交频繁，请稍后再试', 'err_icon' => 'warning'];
                }elseif(!is_email($post['email'])){
                    return ['err' => -124, 'msg' => '邮箱格式错误', 'err_icon' => 'error'];
                }



                CommentModel::newComment($post['artid'], $this->user['id'], $post['email'], $post['content']);

                session('comment_time',time());

                return ['err' => 0, 'msg' =>'提交成功'];
            }
        }


    }