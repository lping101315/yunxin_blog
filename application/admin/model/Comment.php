<?php

namespace app\admin\model;
use think\Model;

class Comment extends Model
{

    protected $pk = 'com_id';
	/**
	 * 后台 - 修改
	 * @param $data
	 * @return false|int
	 */
	public function edit($data)
	{
		$res = $this->allowField(true)->isUpdate(true)->save($data);
		return $res;
	}

	/**
	 * 获取显示文章评论数量
	 * @return int
	 */
	public function getArtViewCount()
	{
		$count = $this->where('com_view = 1 and com_artid != 0')->count();
		return $count;
	}

	/**
	 * 获取评论信息
	 * @param $id
	 * @return mixed
	 */
	public function getInfo($id)
	{
		$data = $this->alias('c')->join('lt_article a','c.com_artid = a.art_id','left')->join('lt_member m','c.com_userid = m.mem_id','left')->where('com_id',$id)->find();
		return $data;
	}

	/**
	 * 查询留言表 筛选
	 * @param $where
	 * @return mixed
	 */
	public function getList($where)
	{
		$data = $this->alias('c')->join('lt_article a','c.com_artid = a.art_id','left')->join('lt_member m','c.com_userid = m.mem_id','left')->where($where)->order('com_id desc')->paginate(10,false,['query'=>request()->param()]);
		return $data;
	}

    /**
     * 统计显示留言数量
     * @return int
     */
    public function getViewCount()
    {
        $count = $this->where('com_view= 1 and com_artid = 0')->count();
        return $count;
    }




}