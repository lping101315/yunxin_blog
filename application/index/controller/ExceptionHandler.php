<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/8/10
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
    use think\exception\Handle;
    /**
     * 自定义异常类
     */
    class ExceptionHandler extends Handle {
        /**
         * http状态码
         * @var unknown
         */
        public $httpCode = 200;

        public function render(\Exception $e){

            $debug_status = config('app_debug');

            if($debug_status){
                return parent::render($e);
            }else{
                return view('./404.html');
//                return $this->show(2, $e->getMessage(), $this->httpCode);
            }

        }

        /**
         * 通用化API接口数据输出
         */
        public function show($status, $message ,$httpCode = 200)
        {



            $data =  [
                'err' => $status,
//                'msg' => config('app_debug') ? $message: '网络错误，请重试!',
                'msg' => $message,
                'result' =>[]
            ];

            return json($data, $httpCode);

        }
    }
