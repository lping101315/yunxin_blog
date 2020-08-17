<?php

namespace app\admin\model;
use think\Model;
class System extends Model
{
	/**
	 * 修改系统表参数
	 * @param $data
	 * @return false|int
	 */
	public function edit($data)
	{
		$res = $this->isUpdate(true)->where('sys_id',1)->update($data);
		return $res;
	}
}