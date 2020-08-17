<?php

namespace app\admin\model;
use think\Model;
class  Article extends Model
{

    protected $pk = 'art_id';
	/**
	 * 添加文章
	 * @param $data
	 * @return false|int
	 */
	public function add($data)
	{	
		$res = $this->isUpdate(false)->save($data);
		return $res;
	}

	/**
	 * 修改文章
	 * @param $data
	 * @return false|int
	 */
	public function edit($data)
	{
		$res = $this->allowField(true)->isUpdate(true)->save($data);
		return $res;
	}

	/**
	 * 获取文章列表 - 筛选
	 * @param $where
	 * @return mixed
	 */
	public function getList($where)
	{
		$data = $this->alias('a')->join('(select count(*) nums,com_artid from lt_comment group by com_artid) c','c.com_artid = a.art_id','left')->where($where)->order('art_id desc')->paginate(10,false,['query' => request()->param()]);
		return $data;
	}
}