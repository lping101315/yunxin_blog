<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/8/11
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
    use app\common\model\VersionModel;

    class Version extends Admin
    {

        /*
         * 版本管理
         * */
        public function index(){

            $list = VersionModel::order('id desc')->paginate();

            return ZBuilder::make('table')
                ->hideCheckbox()
                ->setTableName('version')
                ->addColumns([
                    ['id','id'],
                    ['ver_bate','版本号','text.edit'],
                    ['ver_text','描述','text.edit'],
                    ['ver_addtime','发布时间','datetime','','Y-m-d H:i:s'],
                    ['right_button','操作']
                ])
                ->setRowList($list)
                ->addTopButton('add',['href'=>url('addVersion')])
                ->addRightButton('edit',['href'=>url('editVersion',['id'=>'__id__'])])
                ->addRightButton('delete')
                ->fetch();
        }


        /*
         * 编辑版本
         * */
        public function editVersion(){

            if(request()->isPost()){

                $post = input('post.');

                VersionModel::where('id',$post['id'])->update($post);

                $this->success('操作成功',url('index'));
            }


            $info = VersionModel::get(input('id'));

            return ZBuilder::make('form')
                ->addHidden('id',$info->id)
                ->addText('ver_bate','版本号','',$info->ver_bate)
                ->addTextArea('ver_text','描述','',$info->ver_text)
                ->fetch();

        }

        /*
         * 发布版本
         * */
        public function addVersion(){

            if(request()->isPost()){

                $post = input('post.');

                VersionModel::create($post);

                $this->success('操作成功',url('index'));
            }

            return ZBuilder::make('form')
                ->addText('ver_bate','版本号')
                ->addTextArea('ver_text','描述')
                ->fetch();

        }


    }