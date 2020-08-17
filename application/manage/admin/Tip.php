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
    use app\common\model\TipModel;

    class Tip extends Admin
    {
        public function lists(){

            $list = TipModel::order('id desc')->paginate();


            return ZBuilder::make('table')
                ->hideCheckbox()
                ->setTableName('tip')
                ->setColumnWidth([
                    'id'        => 50,
                    'tip_view'        => 50,
                    'tip_addtime'        => 70,
                    'tip_sort'        => 50,
                    'right_button'        => 50,
                    'tip_title'     => 250,
                ])
                ->addColumns([
                    ['id', '记录id'],
                    ['tip_title', '内容', 'text.edit'],
                    ['tip_sort', '排序', 'text.edit'],
                    ['tip_view', '状态', 'switch'],
                    ['create_time', '添加时间', 'datetime', '', 'Y-m-d H:i:s'],
                    ['right_button', '操作'],
                ])
                ->setRowList($list)
                ->addTopButton('add', ['href' => url('tipAdd')])
                ->addRightButton('delete')
                ->fetch();
        }


        /*
         * 新增
         * */
        public function tipAdd(){

            if(request()->isPost()){
                $post  = input('post.');

                TipModel::create($post);

                $this->success('操作成功！');
            }


            return ZBuilder::make('form')
                ->addText('tip_title','内容')
                ->addNumber('tip_sort','排序','',100)
                ->addRadio('tip_view','显示','',[1=>'显示',0=>'不显示'], 1)
                ->fetch();
        }


    }