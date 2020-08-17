<?php

namespace app\admin\model;
use think\Model;

class Version extends Model
{

    protected $pk = 'ver_id';


    /**
     * 添加新版本
     * @param $data
     * @return false|int
     */
    public function add($data){
        $res = $this->isUpdate(false)->save($data);
        return $res;
    }

    /**
     * 修改提示
     * @param $data
     * @return false|int
     */
    public function edit($data){
        $res = $this->allowField(true)->isUpdate(true)->save($data);
        return $res;
    }

}