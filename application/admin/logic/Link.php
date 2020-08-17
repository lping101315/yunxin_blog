<?php

namespace app\admin\logic;

class Link
{
    /**
     * 验证 添加 banner 和 修改 banner
     * @param $data
     * @return array
     */
    public function validata($data)
    {
        if($data['link_name'] == ''){
            return ["err"=>1,"msg"=>"链接名不能为空","data"=>""];
        }
        if($data['link_url'] == ''){
            return ["err"=>1,"msg"=>"链接地址不能为空","data"=>""];
        }
        if($data['link_content'] == ''){
            return ["err"=>1,"msg"=>"描述不能为空","data"=>""];
        }
    }
}