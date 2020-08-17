
$(document).ready(function () {
    
    $("#form-sbt-commet").click(function () {
        var cont = $("#comment").val();
        // var author = $("#author").val();
        var mail = $("#mail").val();
        var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;


        if(cont ==''  || mail == '' ){
            tips('补全必填项', '请将必填项补齐', 'warning')
            return false;
        }else if(!reg.test(mail)){
            tips('必填项错误', '邮箱格式不正确', 'warning')
            return false;
        }

        $(this).addClass('text-active');
        $('.do-sbt-text').removeClass('text-active');

        $.post('/commentadd',$("#comment_form").serialize(),function (res) {
            $("#form-sbt-commet").removeClass('text-active');
            $('.do-sbt-text').addClass('text-active');

                if(res.err == 0){
                    tips('操作结果', res.msg);
                    setTimeout("location.reload()",1800)
                }else{
                    tips('操作结果', res.msg, res.err_icon);
                }
        })
    })
    
    
});