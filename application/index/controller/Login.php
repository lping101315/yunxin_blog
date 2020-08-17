<?php
//+--------------------------------------------------
//Author：Snow  main@ainixch.cn
//Date:2019/11/7
//+--------------------------------------------------
//
//      ┏┛ ┻━━━━━┛ ┻┓
//      ┃　　　　　　 ┃
//      ┃　　　━　　　┃
//      ┃　┳┛　  ┗┳　┃
//      ┃　　　　　　 ┃
//      ┃　　　┻　　　┃
//      ┃　　　　　　 ┃
//      ┗━┓　　　┏━━━┛
//        ┃　　　┃   神兽保佑
//        ┃　　　┃   代码无BUG！
//        ┃　　　┗━━━━━━━━━┓
//        ┃　　　　　　　    ┣┓
//        ┃　　　　         ┏┛
//        ┗━┓ ┓ ┏━━━┳ ┓ ┏━┛
//          ┃ ┫ ┫   ┃ ┫ ┫
//          ┗━┻━┛   ┗━┻━┛
//+--------------------------------------------------

    namespace app\index\controller;

    use app\index\model\UserModel;
    use think\Db;

    class Login extends Base {

        public function login(){

            if($this->user) $this->error('您已经登录过了');

            //记录错误次数
            $err_time = session('err_time');
//            session('err_time',[]);die;

            if($err_time){
                if($err_time['times'] >= 10 && strtotime($err_time['date']) >= time()){

                    session('err_time.req_time', session('err_time.req_time') +1);

                    return json(['err' => -110 ,'err_icon' => 'error', 'err_msg' =>'登录次数太多，请于'.$err_time['date'].'后再试！频繁的请求将会有禁止IP访问的风险']);
                }elseif(strtotime($err_time['date']) <= time()){

                    session('err_time',['times' => 0, 'date' => now()]);
                }
            }


            if(request()->isAjax()){
                //简单验证，就不用验证器了
                $post = input('post.');
                if(!isset($post['username']) || !isset($post['password']) || empty($post['username']) || empty($post['password'])){
                    return json(['err' => 1 ,'err_icon' => 'error', 'err_msg' =>'请输入用户名以及密码']);
                }

                //用户登录
                $user = UserModel::get(['username' => trim($post['username'])]);

                if($user){
                    $err = 0;
                    $err_icon = 'success';
                    $err_msg = '登录成功';

                    if($user->status != 1){
                        $err = 3;
                        $err_icon = 'warning';
                        $err_msg = '该用户已被冻结，暂时无法登录！';

                    }elseif($user->pwd != md5($post['password'])){
                        $err = 4;
                        $err_icon = 'error';
                        $err_msg = '密码错误，请重试！';
                    }


                }else{
                    $err = 5;
                    $err_icon = 'error';
                    $err_msg = '该用户不存在，请重试！';
                }

                //错误记录
                if($err >2){

                    $new_err_time = [
                        'times'  => isset($err_time['times'])? ($err_time['times'] + 1 ): 1 ,
                        'date'   => date("Y-m-d H:i:s",time() + 600)
                    ];

                    session('err_time', $new_err_time);
                }else{
                    session('user',$user);
                }

                return json(['err' => $err ,'err_icon' => $err_icon, 'err_msg' => $err_msg]);

            }else{
                $this->error('错误的请求方式！');
            }
        }

        /*
         * 注册  未开放
         * */
        public function register(){

            if(request()->isAjax()){

                $post = $this->request->only('nick,username,pwd,pwd2');

                $res = $this->validate($post,[
                   'nick|昵称'    => 'require|max:50',
                   'username|用户名'    => 'require|max:50|unique:user',
                   'pwd|密码'    => 'require|max:50|confirm:pwd2',
                ]);

                if(true !== $res) return ['status'=>-1,'msg'=>$res];

                $post['avatar'] = 0;

                UserModel::create($post);

                return ['status'=>1,'msg'=>'注册成功,欢迎你!'];

            }


            return $this->fetch();
        }


        /*
         * 退出
         * */
        public function out(){
            session('user',null);
            cookie('uid',0);
            $this->error('退出成功');
        }


        /*
         * 快速登录
         * */
        public function fastLogin(){

            $type = input('type', 'qq');

            switch ($type){
                case "qq" : $call = "qqLogin";break;
                case "sina" : $call = "sinaLogin";break;
                default : $call = "qqLogin";break;
            }

            $this->$call();

        }


        /*
         * qq登录
         * */
        private function qqLogin(){

            $qq = new \tencent\QQ();

            $res = $qq->doLogin();
        }

        /*
         * 微博登录
         * */
        private function sinaLogin(){

            $sina = new \sina\Sina();

            $res = $sina->doLogin();
        }


        /*
         * 回调
         * */
        public function callback(){
            $type = input('type');
            switch ($type){
                case "qq" : $call = new \tencent\QQ();break;
                case "sina" : $call = new \sina\Sina();break;
            }

            $res = $call->callback(input('get.'));
        }





    }