$(document).ready(function(){

    $.ajax({
        url:domain+'index/ticket/getJsApiTicket?url='+window.location.href,
        type: 'GET',
        success:function(data) {
            wx.config({
                beta: true,// 必须这么写，否则在微信插件有些jsapi会有问题
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                appId: data.appid, // 必填，企业号的唯一标识，此处填写企业号corpid
                timestamp: data.timestamp, // 必填，生成签名的时间戳
                nonceStr: data.noncestr, // 必填，生成签名的随机串
                signature: data.signature,// 必填，签名，见附录1
                jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
            });
            wx.ready(function(){

                var isCheck=false;
                // wx.checkJsApi({
                //     jsApiList: [
                //         'onMenuShareTimeline',
                //         'onMenuShareAppMessage'
                //     ],
                // });
                wx.onMenuShareAppMessage({
                    title: title, // 分享标题
                    desc: desc, // 分享描述
                    link:window.location.href, //绑定到微信公众号上的那个跳转地址，不晓得可以百度是什么！
                    imgUrl: share_img, // 分享图标
                    success: function() {
                        // 用户确认分享后执行的回调函数
                        alert("分享成功");
                    }
                });

                //				朋友圈------
                wx.onMenuShareTimeline({
                    title: title, // 分享标题
                    desc: desc, // 分享描述
                    link:window.location.href, //绑定到微信公众号上的那个跳转地址，不晓得可以百度是什么！
                    imgUrl: share_img, // 分享图标
                    success: function() {
                        // 用户确认分享后执行的回调函数
                        alert("分享成功");
                    }
                });


            });

            wx.error(function(res){
            });


        },
        error:function(jqXHR){
//          alert("发生错误："+ jqXHR.status);
        }
    });
})
