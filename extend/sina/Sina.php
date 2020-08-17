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

    namespace sina;

    class Sina{
        public $appid;
        public $secret;
        public $callback;
        public $authorizeURL = 'https://api.weibo.com/oauth2/authorize';
        public $accessTokenURL = 'https://api.weibo.com/oauth2/access_token';
        public $api_base = 'https://api.weibo.com/2/';

        function __construct(){

            $cf = config('sina.');
            foreach ($cf as  $key => $v){
                $this->$key = $v;
            }

        }


        public function doLogin($response_type = 'code', $state = NULL, $display = NULL){
//        session(null);die;

            $params = [
                'client_id'     => $this->appid,
                'redirect_uri'  => $this->callback,
                'response_type' => $response_type,
                'state'         => $state,
                'display'       => $display
            ];

            $url = $this->authorizeURL . "?" . http_build_query($params);

            dump($url);
        }

        public function callback($param){

            $access = $this->getAccessToken($param['code']);

            if($access['err'] != 0) return $access;

            $access = $access['access_token'];

            $this->getUserInfo($access);
        }


        /*
         * 获取access_token
         * */
        private function getAccessToken($code){

            $access = $this->read('access');

            if($access['expire_time'] - time() <60){
                $get_way = 'https://api.weibo.com/oauth2/access_token';
                $param = [
                    'client_id'     => $this->appid,
                    'client_secret' => $this->secret,
                    'grant_type'    => 'authorization_code',
                    'redirect_uri'  => $this->callback,
                    'code'          => $code
                ];
                $res = http_post($this->combineURL($get_way, $param),[]);
              
                if($res){
                    $res = json_decode($res, true);

                    $this->write('access',['access_token' => $res['access_token'], 'expire_time' => time() + 3000,'uid' => $access['uid']]);

                    return ['err' => 0 , 'msg' => 'ok', 'access_token' => $res['access_token']];

                }else{
                    return ['err' => '-1211' , 'msg' => '请求错误，请稍后再试'];
                }

            }else{
                return ['err' => 0 ,'access_token' => $access['access_token']];
            }
        }

        private function oAuthRequest($url ,$method, $params){

            $url = $this->host.$url . '?' .http_build_query($params);

            return  http_post($url);
        }


        private function getUserInfo($access){
        dump($access);
            $get_way = 'https://api.weibo.com/2/users/show.json';

            $info = http_get($get_way, ['access_token' => $access]);

            dump($info);
        }



        /**
         * combineURL
         * 拼接url
         * @param string $baseURL   基于的url
         * @param array  $keysArr   参数列表数组
         * @return string           返回拼接的url
         */
        public function combineURL($baseURL,$keysArr){
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
        public function write($key, $value){

            session($key, $value);

            return 1;
        }

        /*
         * 取相关资源
         * */
        public function read($key){
            return session($key);
        }

    }