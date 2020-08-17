<?php

    function get_host(){

        $http='http://';
        if(isset($_SERVER['HTTPS'])){
            if($_SERVER['HTTPS']===1){
                $http='https://';
            }elseif($_SERVER['HTTPS']==='on'){
                $http='https://';
            }elseif($_SERVER['SERVER_PORT']===443){
                $http='https://';
            }
        }

        return $http.$_SERVER['HTTP_HOST'].'/';
    }


    /*
     * 文章显示类型
     * */
    function get_art_view($t){

        $ts = [
            -1   => '删除',
            0   => '草稿',
            1   => '显示',
            2   => '推荐',
        ];

        return $ts[$t];
    }

    /*
     * 转换键值
     * */
    function key_to_value($arr, $pk = 'id', $key = 'name'){

        if(!is_array($arr))  return [];

        $new_arr = [];
        foreach ($arr as $v){
            $new_arr[$v[$pk]] = $v[$key];
        }

        return $new_arr;
    }


    /*
     * 时间友好
     * */
    function time_to_date_frdly($time){
        $rtime  = date("m-d H:i", $time);
        $rtime2 = date("Y-m-d H:i", $time);
        $htime  = date("H:i", $time);
        $time   = time() - $time;
        if ($time < 60) {
            $str = '刚刚';
        } elseif ($time < 60 * 60) {
            $min = floor($time / 60);
            $str = $min . ' 分钟前';
        } elseif ($time < 60 * 60 * 24) {
            $h   = floor($time / (60 * 60));
            $str = $h . '小时前 ' . $htime;
        } elseif ($time < 60 * 60 * 24 * 3) {
            $d = floor($time / (60 * 60 * 24));
            if ($d == 1) {
                $str = '昨天 ' . $htime;
            } else {
                $str = '前天 ' . $htime;
            }
        } elseif ($time < 60 * 60 * 24 * 7) {
            $d   = floor($time / (60 * 60 * 24));
            $str = $d . ' 天前 ' . $htime;
        } elseif ($time < 60 * 60 * 24 * 30) {
            $str = $rtime;
        } else {
            $str = $rtime2;
        }
        return $str;
    }


    /*
     * 判断邮箱
     * */
    function is_email($v){
        if(preg_match('/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/', $v)){
            return true;
        }else{
            return false;
        }
    }

    function http_get( $url, $_header = NULL )
    {
        $curl = curl_init();
        //curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, false);
        if( stripos($url, 'https://') !==FALSE )
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if ( $_header != NULL )
        {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $_header);
        }
        $ret  = curl_exec($curl);
        $info  = curl_getinfo($curl);
        curl_close($curl);

        return $ret;

    }
    /*
     * post method
     */
    function http_post( $url, $param )
    {
        $oCurl = curl_init ();
        curl_setopt ( $oCurl, CURLOPT_SAFE_UPLOAD, false);
        if (stripos ( $url, "https://" ) !== FALSE) {
            curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYHOST, false );
        }

        curl_setopt ( $oCurl, CURLOPT_URL, $url );
        curl_setopt ( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $oCurl, CURLOPT_POST, true );
        curl_setopt ( $oCurl, CURLOPT_POSTFIELDS, $param );
        $sContent = curl_exec ( $oCurl );

        $aStatus = curl_getinfo ( $oCurl );
        curl_close ( $oCurl );

        return $sContent;
    }




    /*
     * 格式化时间戳
     * */
    function now($time=''){

        return date("Y-m-d H:i:s",$time?$time:time());
    }





    function filter_Emoji($str)
    {
        $str = preg_replace_callback(    //执行一个正则表达式搜索并且使用一个回调进行替换
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str);

        return $str;
    }





