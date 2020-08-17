<?php
    //+----------------------------------------

    //Author：main@ainixch.cn

    //+-----------------------------------------
    //用户模型
    namespace app\index\model;
    use think\Model;
    use think\Db;
    class UserModel extends Model{

        protected $name = 'user';
        /*
         * 用户信息
         * */
        public static function userInfo($uid,$field='*'){

            $info=Db::name('user')->where('id',$uid)->field($field)->find();

            return $info;
        }

        /*
         * 检测用户数据
         * */
        public static function doLogin($data){

            $user=Db::name('user')->where('openid',$data['openid'])->field('avatar,id,nick,phone,inter,left_gift_time,status')->find();
            //如果存在用户就更新头像
            if($user){
                unset($data['id']);
                $user['avatar'] = get_file_path($user['avatar']);
                Db::name('user')->where('openid',$data['openid'])->update($data);
            }else{
                $user['phone'] = 0;
                $user['pwd'] = 0;
                $user['openid'] = $data['openid'];
                $user['nick'] = $data['nick'];
                $user['avatar'] = $data['avatar'];
                $user['instruc'] = '暂无介绍';
                $user['role'] = 1;
                $user['inter'] = 0;
                $user['left_gift_time'] = 0;
                $user['create_time'] = time();
                $user['status'] = 1;
                $user['id'] = $data['id'];
                $res=Db::name('user')->insertGetId($user);

            }
            return ['status' => 1 , 'data' => $user];
        }

        public function getAvatarAttr($v){
            if(!preg_match('/admin/',$_SERVER['REQUEST_URI'])){
                return get_file_path($v);
            }else{
                return $v;
            }
        }

    }