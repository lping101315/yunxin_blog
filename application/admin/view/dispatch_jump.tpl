<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="zh"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="zh"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>跳转提示 | {:config('web_site_title')}</title>

    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="__STATIC__/img/favicons/favicon.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap and OneUI CSS framework -->
    <link rel="stylesheet" href="__ADMIN_CSS__/bootstrap.min.css">
    <link rel="stylesheet" href="__ADMIN_CSS__/oneui.css">
    <link rel="stylesheet" href="__ADMIN_CSS__/yxin.css">
    <!-- END Stylesheets -->
</head>
<body>
<!-- Error Content -->
<div class="content bg-white text-center pulldown overflow-hidden">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <!-- Error Titles -->
            <h1 class="font-w300 {$code? 'text-success' : 'text-city'} push-10 animated flipInX"><i class="fa fa-{$code? 'check' : 'times'}-circle"></i> <?php echo(strip_tags($msg));?></h1>
            <p class="font-w300 push-20 animated fadeInUp">页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>秒</p>
            <div class="push-50">
                <a class="btn btn-minw btn-rounded btn-success" href="<?php echo($url);?>"><i class="fa fa-external-link-square"></i> 立即跳转</a>
                <button class="btn btn-minw btn-rounded btn-warning" type="button" onclick="stop()"><i class="fa fa-ban"></i> 禁止跳转</button>
                <!--<a class="btn btn-minw btn-rounded btn-default" href="{$Request.baseFile}"><i class="fa fa-home"></i> 返回首页</a>-->
            </div>
            <!-- END Error Titles -->

        </div>
    </div>
</div>
<!-- END Error Content -->

<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);

        // 禁止跳转
        window.stop = function (){
            clearInterval(interval);
        }
    })();
</script>
</body>
</html>