<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/13
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

    namespace app\manage\admin;

    use app\admin\controller\Admin;
    use app\common\builder\ZBuilder;
    use app\common\model\ArticleModel;
    use app\common\model\MenuModel;

    /*
     * 文章
     * */
    class Article extends Admin
    {

        public function lists(){

            $list = ArticleModel::lists('admin',$this->getMap(), '*,art_id as id', 'art_id desc');
            return ZBuilder::make('table')
                ->setTableName('article')
                ->hideCheckbox()
                ->setColumnWidth([
                    'art_id'    => 50,
                    'art_pid'    => 50,
                    'art_title'    => 120,
                    'art_img'    => 40,
                    'art_keyword'    => 100,
                ])
                ->addColumns([
                    ['id','id'],
                    ['art_title','标题','text.edit'],
                    ['art_pid','分类'],
                    ['art_img','缩略图','picture'],
                    ['art_keyword','关键字','text.edit'],
                    ['art_view','类型','callback','get_art_view'],
                    ['art_hit','点击量'],
                    ['art_original','原创','switch'],
                    ['art_author','作者'],
                    ['create_time','添加时间','datetime','','Y-m-d H:i:s'],
                    ['right_button','操作']
                ])
                ->setRowList($list)
                ->setSearchArea([
                    ['text','art_title','标题','like'],
                    ['text','art_keyword','关键字','like'],
                    ['daterange','create_time','添加时间'],
                ])
                ->addTopButton('add',['href' => url('articleAdd')])
                ->addRightButton('edit',['href' => url('articleEdit',['aid' => '__id__'])])
                ->addRightButton('delete')
                ->fetch();
        }


        /*
         * 编辑文章
         * */
        public function articleEdit(){

            if(request()->isPost()){

                $post = input('post.');

                ArticleModel::where(['art_id' => $post['art_id']])->update($post);

                $this->success('操作成功!',url('lists'));
            }


            $aid = input('aid');
            $menu = MenuModel::lists('index', ['menu_parent' => 8, 'menu_view' => 1], 'menu_name,menu_id', 'menu_sort asc')->toArray();

            $menu_ = key_to_value($menu, 'menu_id', 'menu_name');

            $info = ArticleModel::get($aid);
            return ZBuilder::make('form')
                ->addHidden('art_id',$aid)
                ->addText('art_title','标题','',$info->art_title)
                ->addImage('art_img','缩略图','',$info->art_img)
                ->addTextArea('art_remark','描述','',$info->art_remark)
                ->addText('art_keyword','关键字','',$info->art_keyword)
                ->addSelect('art_pid','分类','',$menu_,$info->art_pid)
                ->addWangeditor('art_content','内容','',$info->art_content)
                ->addRadio('art_view','显示类型','',[ 0 => '草稿',1=>"显示", 2=>'推荐'],$info->art_view)
                ->addNumber('art_hit','点击量','',$info->art_hit)
                ->addRadio('art_original','原创','',[ 0 => '不是',1=>"是",2=>'投稿'],$info->art_original)
                ->addText('art_url','非原创地址','',$info->art_url)
                ->addText('art_from','设备','',$info->art_from)
                ->addText('art_author','作者','',$info->art_author)
                ->fetch();
        }


        /*
         * 添加文章
         * */
        public function articleAdd(){

            //后台添加，不验证了
            if(request()->isPost()){

                $post = input('post.');
            
                ArticleModel::create($post);

                $this->success('添加成功！');
            }

            $menu = MenuModel::lists('index', ['menu_parent' => 8, 'menu_view' => 1], 'menu_name,menu_id', 'menu_sort asc')->toArray();

            $menu_ = key_to_value($menu, 'menu_id', 'menu_name');

            return ZBuilder::make('form')
                ->addText('art_title','标题','')
                ->addImage('art_img','缩略图','')
                ->addTextArea('art_remark','描述','')
                ->addText('art_keyword','关键字','')
                ->addSelect('art_pid','分类','', $menu_)
                ->addWangeditor('art_content','内容','')
                ->addRadio('art_view','显示类型','',[ 0 => '草稿',1=>"显示", 2=>'推荐'],1)
                ->addNumber('art_hit','点击量','')
                ->addRadio('art_original','原创','',[ 0 => '不是',1=>"是",2=>'投稿'],1)
                ->addText('art_url','非原创地址','')
                ->addText('art_from','设备','','win10')
                ->addText('art_author','作者','','snow')
                ->fetch();
        }


    }