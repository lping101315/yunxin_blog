<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/20
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
    use app\common\model\DynamicModel;

    /*
     * 动态
     * */
    class Dynamic extends Admin
    {
        public function lists(){

            $list = DynamicModel::order('id desc')->paginate();

            return ZBuilder::make('table')
                ->setTableName('dynamic')
                ->hideCheckbox()
                ->addColumns([
                    ['id', 'id'],
                    ['cont', '内容', 'text.edit'],
                    ['good', '点赞', 'text.edit'],
                    ['equipment', '设备', 'text.edit'],
                    ['right_button', '操作']
                ])
                ->setRowList($list)
                ->addTopButton('add', ['href' => url('denamicAdd')])
                ->addRightButton('delete')
                ->fetch();
        }


        /*
         * 添加
         * */
        public function denamicAdd(){

            if(request()->isPost()){

                $post = input('post.');

                DynamicModel::create($post);

                $this->success('操作成功');
            }

            return ZBuilder::make('form')
                ->addTextArea('cont', '内容')
                ->addText('equipment', '设备', '', 'win10')
                ->addNumber('good', '点赞', '', 0)
                ->fetch();
        }

    }