<?php

namespace app\admin\logic;
class Menu
{
	/**
	 * 验证
	 * @param $data
	 * @return array
	 */
	public function validata($data)
	{
		if($data['menu_name'] == ''){
			return ["err"=>1,"msg"=>"栏目名不能为空","data"=>""];
		}
		if($data['menu_parent'] == 0 && $data['menu_url'] == ''){
			return ["err"=>1,"msg"=>"没有子栏目的菜单父级ID不能为空","data"=>""];
		}
	}
}