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

    /*
     * 评论
     * */
    class CommentModel extends Model
    {
        protected $name = 'comment';

        protected $pk = 'com_id';



        /*
         * 最新评论
         * @param int $nums 输了
         * @param string $field 字段
         * */
        public static function lastComment($nums = 5, $field = 'com_id,com_content'){
            return self::where(['com_artid' => 0])->field($field)->withJoin(['comUser' =>['nick','avatar']])->order('com_id desc')->limit($nums)->select();
        }

        /*
         * 评论列表
         * @param array $where 查询条件
         * @param string $field 字段
         * */
        public static function all($where = ['com_artid' => 0], $field = 'com_id,com_content,create_time'){

            return self::where($where)->field($field)->withJoin(['comUser' =>['nick','avatar']])->order('com_id desc')->paginate(10);

        }


        /*
         * 关联评论用户
         * */
        public function comUser(){
            return $this->hasOne('user_model','id', 'com_userid');
        }

        /*
         * 新评论
         * @param int $aid 文字id
         * @param int $uid 用户uid
         * @param string $email 邮箱
         * @param string $content 内容
         * @param string $from 来源
         * */
        public static function newComment($aid, $uid, $email, $content, $from = ''){

            self::create([
                'com_artid'     => $aid,
                'com_userid'     => $uid,
                'com_email'     => $email,
                'com_content'     => $content,
                'com_from'     => $from,
                'com_ip'     => request()->ip(),
            ]);
            return true;
        }
    }