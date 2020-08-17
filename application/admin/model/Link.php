<?php

namespace app\admin\model;
use think\Model;
class Link extends Model
{

    protected $pk = 'link_id';

    /**
     * 添加链接
     * @param $data
     * @return false|int
     */
    public function add($data)
    {
        $res = $this->isUpdate(false)->save($data);
        return $res;
    }

    /**
     * 修改排序
     * @param $data
     * @return array|false
     */
    public function changeSort($data)
    {
        $res = $this->saveAll($data);
        return $res;
    }

    /**
     * 修改链接
     * @param $data
     * @return false|int
     */
    public function edit($data)
    {
        $res = $this->allowField(true)->isUpdate(true)->save($data);
        return $res;
    }
}