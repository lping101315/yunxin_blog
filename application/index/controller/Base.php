<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/7
//+--------------------------------------------------
//.--,       .--,
// ( (  \.---./  ) )
//  '.__/o   o\__.'
//     {=  ^  =}
//      >  -  <
//     /       \
//    //       \\
//   //|   .   |\\
//   "'\       /'"_.-~^`'-.
//      \  _  /--'         `
//    ___)( )(___
//   (((__) (__)))    高山仰止,景行行止.虽不能至,心向往之。
//+--------------------------------------------------

    namespace app\index\controller;

    use app\common\model\ArticleModel;
    use app\common\model\CommentModel;
    use app\common\model\DynamicModel;
    use app\common\model\LinkModel;
    use app\common\model\MenuModel;
    use app\common\model\TipModel;
    use app\common\model\UserModel;
    use app\index\model\SystemModel;
    use think\Controller;
    use think\facade\Cache;


    class Base extends Controller {

        public $uid = [];

        /*
         * 系统初始化操作
         * */
        public function initialize()
        {
            $this->user = session('user');

            //访问方法
            $controller = request()->controller();
            $action = request()->action();


            $me = [
                'avatar'    => 'https://thirdqq.qlogo.cn/g?b=oidb&k=WyFOLrOSzSPdfDBISh7cHA&s=100&t=1555698854',
                'nick'      => 'snow',
                'tips'      => '你好呀！',
                'motto'     => '清澈明朗,积极向上'
            ];

            if( !($conf = Cache::get('web_conf')) ){
                $conf=SystemModel::webConf();
                Cache::set('web_conf',$conf);
            }

            //网站配置

            //菜单暂时不给活动，v2升级上来需要调整
            $menu = MenuModel::lists('index', ['menu_parent' => 8, 'menu_view' => 1], 'menu_name,menu_id', 'menu_sort asc');

            $last_relese = ArticleModel::order('art_id desc')->value('create_time');

            //首条公告
            $conf['web_site_tips'] = TipModel::where(['tip_view' => 1])->order('id desc')->value('tip_title');

            //首条动态
            $dynamic = DynamicModel::where(['status' => 1])->order('id desc')->find();

            //友情链接
            $links = LinkModel::where(['link_view' => 1])->order('link_sort asc')->limit(5)->select();

            //热门文章
            $hot_article = ArticleModel::hotArticle();

            //随机文章
            $rand_article = ArticleModel::randArticle();

            //最新留言
            $last_comment = CommentModel::lastComment(5);

            $this->assign('finder',strtolower($controller.'_'.$action));
            $this->assign('config',$conf);
            $this->assign('author',$me);
            $this->assign('menu',$menu);
            $this->assign('last_relese',time_to_date_frdly($last_relese));
            $this->assign('run_day', floor((time() - strtotime($conf['web_site_create_time'])) / 86400));
            $this->assign('article_nums', ArticleModel::count());
            $this->assign('com_nums', CommentModel::count());
            $this->assign('dym', $dynamic);
            $this->assign('link', $links);
            $this->assign('hot_article', $hot_article);
            $this->assign('last_comment', $last_comment);
            $this->assign('rand_article', $rand_article);
            $this->assign('user', $this->user);
            $this->assign('key', '');
        }



        /*
         * 回调操作
         * */
        public function callback(){
            $type = input('type','qq');

            switch ($type){
                case "qq" : $call = new \tencent\QQ();break;
                case "sina" : $call = new \sina\Sina();break;
                default : $call = new \tencent\QQ();break;
            }

            $res = $call->callback(input('get.'));

            if($res['err'] != 0){
                $this->error('登录失败，请稍后再试！',url('index/index'));
            }

            $user  = UserModel::get([$type . '_openid' => $res['openid'] ]);

            if(!$user){
                $res[$type.'_openid'] = $res['openid'];

                $user =  UserModel::create($res);
            }else{
                UserModel::where('id', $user->id)->update($res);
            }

            session('user',  $user->toArray());

            $this->success('登录成功 ，欢迎你 ！',url('index/index'));
        }



    }