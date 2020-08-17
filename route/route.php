<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

    Route::get('think', function () {
        return 'hello,ThinkPHP5!';
    });

    Route::get('hello/:name', 'index/hello');

//return [
//
//];
    Route::rule('','Index/index');
    Route::rule('about','About/index');
    Route::rule('time','Time/index');
    Route::rule('links','Links/index');
    Route::rule('class/:id','Article/index');
    Route::rule('article/:id','Article/detail');
    Route::rule('comment','Comment/index');
    Route::rule('login','Login/login');
    Route::rule('feed/:type','Feed/feed');
    Route::rule('commentadd','Comment/newComment','post');
