<?php

namespace app\admin\model;
use think\Model;
class Member extends Model
{
	/**
	 * 获取用户列表 - 筛选
	 * @param $where
	 * @return mixed
	 */
	public function getList($where)
	{
		$data = $this->where($where)->order('mem_id desc')->paginate(10,false,['query' => request()->param()]);
		return $data;
	}

    /**
     * 修改管理员设置
     * @param $data
     * @return false|int
     */
    public function edit($data){
        $res = $this->allowField(true)->isUpdate(true)->save($data);
        return $res;
    }

    public function getAccess()
    {
        $data = $this->where('mem_auth',1)->column("mem_id");
        return $data;
    }
}