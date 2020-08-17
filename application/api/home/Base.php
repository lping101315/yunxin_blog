<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/4/21
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

    namespace app\api\home;

    use think\Controller;

    class Base extends Controller
    {


        //统一返回方法
        protected function succ($respon,$err=0){
            //如果没有数据也返回0
            $data = (is_array($respon) || is_object($respon) )?$respon:[];
            $msg = is_string($respon)?$respon:'ok';

            $data=[
                'err'	=>$err,
                'msg'	=>$msg,
                'result'	=>$data
            ];

            echo (json_encode($data));exit();
        }


        protected function err($msg = '请求错误，请重试',$err = 1){

            $data=[
                'err'	=>$err,
                'msg'	=>$msg,
                'data'	=>['description'=>$msg,'request_time'=>$_SERVER['REQUEST_TIME_FLOAT'],'response_time'=>get_msec_time()]
            ];

            echo (json_encode($data));exit();
        }

    }