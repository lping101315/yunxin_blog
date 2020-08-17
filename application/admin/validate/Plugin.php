<?php


namespace app\admin\validate;

use think\Validate;

/**
 * 插件验证器
 * @package app\admin\validate

 */
class Plugin extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|插件名称'  => 'require|unique:admin_plugin',
        'title|插件标题' => 'require',
    ];
}
