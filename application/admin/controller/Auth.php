<?php

namespace app\admin\controller;
use think\Controller;
use think\facade\Env;
use think\facade\Session;
use app\admin\logic\Login as LoginLogic;

class Auth extends Controller
{
    /**
     * 验证授权
     */
    public function initialize()
    {
        $LoginLogic = new LoginLogic();

        if( !$LoginLogic->checkaccess(session('qq.mem_id'))){
            $this->redirect('admin/Login/index');
        }
    }

    /**
     * 选择主题颜色
     */
    public function color()
    {
        $color = request()->param('color');
        cookie('color',$color);
        return;
    }

	/**
	 * 清空缓存
	 */
	public function clean()
	{
		echo "<span style='color: red;'>缓存清理中……</span> <br/><br/>";
		$path1 = Env::get('RUNTIME_PATH') . "cache/";
		echo delCache($path1);
		$path2 = Env::get('RUNTIME_PATH') . "temp/";
		echo delCache($path2);
		echo "<br/><span style='color: red;'>缓存清理完毕。</span>";
	}
	/**
	 * QQ退出
	 * @return array
	 */
    public function logout()
    {
        Session::delete('qq');
		return ["err"=>0,"msg"=>"退出完成!","data"=>""];
    }
  
      public function sendEmail($Email,$type=1,$cont){
    	//var_dump(EXTEND_PATH);
    	$smtpserver = "ssl://smtp.qq.com";//SMTP服务器
		$smtpserverport =465;//SMTP服务器端口
		$smtpusermail = "info@ainixch.cn";//SMTP服务器的用户邮箱
		$smtpemailto = $Email;//$_POST['toemail'];//发送给谁
		$smtpuser = "3160108031@qq.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
		//$smtppass = "dayghmlqxzvlbfhg";//SMTP服务器的用户密码66448
		$smtppass = "iwgiwbslpyfidejc";//31601的授权码
		$mailtitle = '留言提醒';//$_POST['title'];//邮件主题
		$mailcontent = "<h3>亲爱的站长，又有人在博客上留言啦，赶快回复哦！</h3>
						<span>留言内容为：".$cont."</span>
							";//.$_POST['content']."</h1>";//邮件内容
		if($type==2){
			$mailtitle='浅唱春天留言提醒';
			$mailcontent="<h3>留言反馈</h3>
						<p>您好，欢迎在浅唱春天博客留言，你的留言已经邮件通知站长，站长将会对本留言进行回复并以邮件的形式将内容发送到此邮箱。</p>
						<p>再次感谢您对本站的支持，您的每次点击都是对站长的最大支持。</p>

			";
		}
		$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
		//************************ 配置信息 ****************************
		$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = false;//是否显示发送的调试信息
		$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

		if($state==""){
			return false;
		}
		return true;
    }

}