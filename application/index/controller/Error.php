<?php

    namespace app\index\controller;


    class Error extends Base
    {

        public function _empty()
        {
            $this->redirect('/404.html');
        }
    }