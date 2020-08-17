<?php

namespace app\admin\logic;

class Tip
{
	/**
	 * 验证 添加 和 修改
	 * @param $data
	 * @return array
	 */
	public function validata($data)
	{
		if($data['tip_title'] == ''){
			return ["err"=>1,"msg"=>"请填写描述","data"=>""];
		}
	}
}