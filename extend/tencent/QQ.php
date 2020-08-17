<?php
//+--------------------------------------------------
//Author：Snow  main@glping.net
//Date:2020/3/29
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

    namespace tencent;

    class QQ{

        public $appid;
        public $secret;
        public $callback;
        public $auth_base = 'https://graph.qq.com/oauth2.0/';
        public $auth_code_api = '';
        public $access_token_api = '';
        public $open_id_api = '';
        public $user_info_api = 'https://graph.qq.com/user/get_user_info';

        function __construct(){

            $this->auth_code_api    = $this->auth_base . 'authorize';
            $this->access_token_api = $this->auth_base . 'token';
            $this->open_id_api      = $this->auth_base . 'me';

            $cf = config('qq.');
            foreach ($cf as  $key => $v){
                $this->$key = $v;
            }

        }

        public function doLogin(){

            $state = md5(uniqid(rand(), TRUE));

            $this->write('state', $state);

            $params = [
                "response_type" => "code",
                "client_id" => $this->appid,
                "redirect_uri" => $this->callback,
                "state" => $state,
                "scope" => 'get_user_info'
            ];
            $url = $this->combineURL($this->auth_code_api, $params);

            header("Location:$url");
        }

        public function callback($param){

            $state = $this->read('state');

            if(!$state || $param['state'] != $state){

                return ['err' => -110, 'msg' =>'非法请求'];
            }


            $user_info = $this->getUserInfo($param['code']);

            return $user_info;
        }

        /*
         * 获取用户信息
         * */
        protected function getUserInfo($code){

            $acc_token = $this->getAccessToken($code);
            $open_id = $this->getOpenId();

            $param = [
                'access_token'          => $acc_token,
                'openid'                => $open_id,
                'oauth_consumer_key'    => $this->appid,
                'format'                => 'json'
            ];
            $res = http_get($this->combineURL($this->user_info_api,$param));

            $info = json_decode($res, true);

            if($info['ret'] != 0){
                return ['err' => -1 ,'msg' => $info['msg']];
            }

            $data = [
                'err'       => 0,
                'nick'      => $info['nickname'],
                'avatar'    => $info['figureurl_2'],
                'openid'    => $open_id
            ];

            return $data;
        }


        /*
         * 获取openid
         * */
        protected function getOpenId($code = ''){

            $op = $this->read('openid');

            if($op) return $op;

            $acc_token = $this->getAccessToken($code);

            if(isset($acc_token['err'])) return ['err' => 1, 'msg' => '获取openid失败！'];

            $op = http_get($this->combineURL($this->open_id_api, ['access_token' => $acc_token]));

            $op = json_decode(trim(substr($op, 9), " );\n"), true);

            if(isset($op['openid'])){
                $this->write('openid', $op['openid']);

                return $op['openid'];
            }else{
                return ['err' => 1, 'msg' => $op['error_description']];
            }

        }


        protected function getAccessToken($code = ''){

            $acc_token = '';

            $acc = $this->read('access_token');

            if($acc && $acc['expires_in'] > time()){
                $acc_token = $acc['access_token'];
            }else{
                $param = [
                    "grant_type"        => "authorization_code",
                    "client_id"         => $this->appid,
                    "redirect_uri"      => urlencode($this->callback),
                    "client_secret"     => $this->key,
                    "code" => $code
                ];
                $get_way = $this->combineURL($this->access_token_api, $param);

                $res = http_get($get_way);

                $res= $this->parseAccessToken($res);
                if($res['err'] != 0){
                    return  $res;
                }
                $acc_token = $res['data']['access_token'];
            }

            return $acc_token;
        }


        /**
         * 解析access_token方法请求后的返回值
         * @param string $result 获取access_token的方法的返回值
         */
        private function parseAccessToken($result){

            parse_str($result, $data);

            if(isset($data['access_token'])){
                $this->write('access_token',['access_token' => $data['access_token'], 'expires_in' => $data['expires_in'] -200 + time()]);

                return ['err' => 0 ,'data' =>  $data];
            } else
                return ['err' => 1 ,'data' =>  [], 'msg' => '获取access失败'];
        }



        /**
         * combineURL
         * 拼接url
         * @param string $baseURL   基于的url
         * @param array  $keysArr   参数列表数组
         * @return string           返回拼接的url
         */
        private function combineURL($baseURL,$keysArr){
            $combined = $baseURL."?";
            $valueArr = array();

            foreach($keysArr as $key => $val){
                $valueArr[] = "$key=$val";
            }

            $keyStr = implode("&",$valueArr);
            $combined .= ($keyStr);

            return $combined;
        }






        /*
         * 存相关资源
         * */
        private function write($key, $value){

            session($key, $value);

            return 1;
        }

        /*
         * 取相关资源
         * */
        private function read($key){
            return session($key);
        }



    }