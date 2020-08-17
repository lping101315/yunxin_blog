<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/17
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
    use app\common\model\LinkModel;

    /*
     * 友情链接
     * */
    class Link extends Admin
    {

        public function lists(){

            $list = LinkModel::order('id desc')->paginate();

            return ZBuilder::make('table')
                ->setTableName('link')
                ->hideCheckbox()
                ->setColumnWidth([
                    'id'        => 30,
                    'link_favicon'        => 50,
                    'link_sort'        => 50,
                    'link_name'        => 50,
                    'link_view'        => 50,
                    'right_button'        => 50,
                    'link_content'        => 300,
                ])
                ->addColumns([
                    ['id', 'id'],
                    ['link_favicon', '图标', 'picture'],
                    ['link_name', '申请人','text.edit'],
                    ['link_url', '地址','text.edit'],
                    ['link_content', '描述','text.edit'],
                    ['link_sort', '排序','text.edit'],
                    ['link_view', '显示', 'switch'],
                    ['right_button', '操作']
                ])
                ->setRowList($list)
                ->addTopButton('add', ['href' => url('linkAdd')])
                ->addRightButton('edit', ['href' => url('linkEdit', ['id' => '__id__'])])
                ->addRightButton('delete')
                ->fetch();
        }

        /*
         * 编辑
         * */
        public function linkEdit(){

            if(request()->isPost()){

                $post = input('post.');

                LinkModel::where('id', $post['id'])->update($post);

                $this->success('操作成功!',url('lists'));
            }



            $id = input('id');

            $info = LinkModel::get($id);
            return ZBuilder::make('form')
                ->addHidden('id', $id)
                ->addText('link_name', '申请人', '', $info->link_name)
                ->addText('link_url', 'url', '', $info->link_url)
                ->addImage('link_favicon', '图标', '', $info->link_favicon)
                ->addTextArea('link_content', '详情', '', $info->link_content)
                ->addNumber('link_sort', '排序', '', $info->link_sort)
                ->addRadio('link_view', '状态', '', [1=>'显示', 0 =>'不显示'], $info->link_view)
                ->fetch();
        }


        /*
         * 添加
         * */
        public function linkAdd(){
            if(request()->isPost()){

                $post = input('post.');

                LinkModel::create($post);

                $this->success('操作成功!',url('lists'));
            }

            return ZBuilder::make('form')
                ->addText('link_name', '申请人', '')
                ->addText('link_url', 'url', '')
                ->addImage('link_favicon', '图标', '')
                ->addTextArea('link_content', '详情', '')
                ->addNumber('link_sort', '排序', '')
                ->addRadio('link_view', '状态', '', [1=>'显示', 0 =>'不显示'], 1)
                ->fetch();

        }

    }