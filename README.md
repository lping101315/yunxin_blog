###云心博客程序

---
#####Description:

*v3.0基于thinkphp + Zbuilder(dolphinphp分离出来)构建的博客系统* 
  
ThinkPhp版本: 5.1.34 LTS  
Zbuilder版本: 1.4.5

#####使用范围: 
允许个人学习使用并修改部分源代码，但不能用于**商业用途**。  



#####环境:
1. `mysql` > 5.6
2. `php` > 5.6 建议7.1



#####安装方法:
1. 将`web`目录指向`public`下，修改`config`里面的`database.php`配置文件。  
2. 导入`sql.sql`
3. 如果要使用`redis`作为缓存，配置`redis.php`并将`cache.php`里面的`type`设为redis
4. 目前没有开放注册跟微博登录功能，使用的是`qq`快速登录,具体可以修改`config`下面的`qq.php`

#####Tips:
1. 后续更新后台部分将会去掉`zbuilder`，使用`vue`开发，
2. `zbuilder`使用请查看 [官方手册](https://www.kancloud.cn/ming5112/dolphinphp/256302)
3. `zbuilder`版权属于 [dolphinphp](http://www.dolphinphp.com/)




  
