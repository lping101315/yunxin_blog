$(document).ready(function () {

    $("#login-submit").click(function () {
        var logins = $("#Login_form").serialize();

        if($("#navbar-login-user").val() == ''){
            tips('登录错误！', '请输入用户名或邮箱', 'error');
            return;
        }else if($("#navbar-login-password").val() == ''){
            tips('登录错误！', '请输入密码', 'error');
            return;
        }

        $("#spin-login").removeClass('hide');
        $.post('/login',logins,function (res) {
            $("#spin-login").addClass('hide');
            if(res.err != 0){
                tips('登录错误！', res.err_msg, res.err_icon);
            }else{
                setTimeout('location.reload()',1200);
            }

        });


    })

        








})