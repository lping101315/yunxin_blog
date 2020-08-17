<?php

namespace app\admin\logic;
use app\admin\model\System as SystemModel;

class System
{
    /**
     * 修改系统常规设置的数据验证
     * @param $data
     * @return array
     */
    public function saveBasics($data)
    {
        if($data['sys_title'] == ''){
            return ["err"=>2,"msg"=>"网站标题不能为空","data"=>""];
        }
        if($data['sys_keyword'] == ''){
            return ["err"=>2,"msg"=>"网站关键词不能为空","data"=>""];
        }
        if($data['sys_createtime'] == ''){
            return ["err"=>2,"msg"=>"网站建立时间不能为空","data"=>""];
        }
        if($data['sys_copy'] == ''){
            return ["err"=>2,"msg"=>"网站版权位置间不能为空","data"=>""];
        }
        $data['sys_id'] = 1;
        $System = new SystemModel();
        $res = $System->edit($data);
        if($res !== false){
            return ["err"=>0,"msg"=>"修改系统常规设置完成","data"=>""];
        }else{
            return ["err"=>3,"msg"=>"修改系统常规设置时发生错误，请检查程序","data"=>""];
        }
    }

	/**
	 * 修改系统设置中的第三方SDK
	 * @param $data
	 * @return array
	 */
	public function saveSdk($data)
	{
		$configtxt = file_get_contents( CONF_PATH.'/extra/auth.php');
		$qq_inc = config('auth.qqconnect');
		$configtxt = str_replace("'appid'\t\t=>\t'{$qq_inc['appid']}'","'appid'\t\t=>\t'{$data['appid']}'",$configtxt);
		$configtxt = str_replace("'appkey'\t=>\t'{$qq_inc['appkey']}'","'appkey'\t=>\t'{$data['appkey']}'",$configtxt);
		$configtxt = str_replace("'callback'\t=>\t'{$qq_inc['callback']}'","'callback'\t=>\t'{$data['callback']}'",$configtxt);
		file_put_contents( CONF_PATH.'/extra/auth.php',$configtxt);
		return ["err"=>0,"msg"=>"修改配置完成,记得清空缓存","data"=>""];
	}

	/**
	 * 修改系统显示设置
	 * @param $data
	 * @return array
	 */
    public function saveView($data)
    {
        $configtxt = file_get_contents( CONF_PATH.'/extra/auth.php');
        foreach ($data as $key => $value){
			$configtxt = str_replace("'{$key}'\t\t=>\t'".config('auth.'.$key)."'","'{$key}'\t\t=>\t'{$value}'",$configtxt);
        }
        file_put_contents( CONF_PATH.'/extra/auth.php',$configtxt);
		return ["err"=>0,"msg"=>"修改配置完成,记得清空缓存","data"=>""];
    }

}