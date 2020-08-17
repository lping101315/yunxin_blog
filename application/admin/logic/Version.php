<?php

namespace app\admin\logic;

class Version
{
    /**
     * 验证 添加 和 修改
     * @param $data
     * @return array
     */
    public function validata($data)
    {
        if($data['ver_text'] == ''){
            return ["err"=>1,"msg"=>"请填写描述","data"=>""];
        }
        if($data['ver_bate'] == ''){
            return ["err"=>1,"msg"=>"请填写版本号","data"=>""];
        }
    }
}