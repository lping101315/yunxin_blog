<?php
namespace app\manage\model;
use think\Model;
use think\Db;

class UserModel extends Model{

		public static function users($where='') {

			$list=Db::name('user')->where($where)->order('id DESC')->paginate()->each(function ($it,$index){
			    $it['status'] = $it['status']==1?'正常':($it['status']==0?'审核中':'冻结');

			    $it['role'] = get_user_role($it['role']);
			    return $it;
            });

			return $list;
		}


		/*
		 * 用户信息
		 * */
		public static function userInfo($id,$field='*'){

			$info=Db::name('user')->where('id',$id)->field($field)->find();

			return $info;
		}



		/*
		 * 更新用户信息
		 * */
		public static function updateUserInfo($id,$info) {

		    $info['update_time'] = time();
			$res=Db::name('user')->where('id',$id)->update($info);

			return $res;
		}



}