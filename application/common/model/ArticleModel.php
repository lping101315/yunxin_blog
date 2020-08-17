<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/8
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

    namespace app\common\model;

    use think\Model;
    use think\model\concern\SoftDelete;

    /*
     * 文章
     * */
    class ArticleModel extends Model
    {

        use SoftDelete;

        protected $name = 'article';

        protected $pk = 'art_id';

        public $append = [
            'art_img_text'
        ];


        //列表
        public static function lists($type = 'index', $where = [], $field = '*', $order = ''){

            $action = $type == 'index' ? 'select' : 'paginate';

            return self::where($where)->field($field)->order($order)->$action();
        }



        /*
         * 热门文章
         * */
        public static function hotArticle($nums = 5, $field = 'art_id,art_title,art_hit,art_img'){

           return self::where('art_view' ,'in', '1,2')->where('art_down',0)->order('art_hit desc')->field($field)->limit($nums)->select();

        }

        /*
         * 随机文章
         * */
        public static function randArticle($nums = 5, $field = 'art_id,art_title,art_hit,art_img'){

            $ids = self::column('art_hit');

            $ids_ = [];

            $t_nums = count($ids);

            for ($i = 0; $i < $nums; $i++){
                $ids_[] = $ids[mt_rand(0, $t_nums - 1)];
            }


            return self::where('art_view' ,'in', '1,2')
                ->where('art_hit', 'in', $ids_)
                ->where('art_down',0)
                ->order('art_hit desc')
                ->field($field)
                ->limit($nums)
                ->select();

        }


        /*
         * 获取菜单
         * */
        public function getArtPidAttr($v){
            if(!preg_match('/admin/', $v)){
                return MenuModel::where(['menu_id' => $v])->value('menu_name');
            }

            return $v;
        }

        /*
         * 图片地址
         * */
        public function getArtImgAttr($v){

            $this->art_img_text = get_file_path($v, 'all');

            return $v;
        }


        public function getArtContentAttr($v){



            return $v;
        }

    }