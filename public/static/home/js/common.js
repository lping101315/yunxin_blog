

function close_() {

    $("#tips-box").hide()
}

/*
* level : error,success,warning
* */
function tips(title = '', cont = '', level = 'success') {
    $("#tips-box").hide();
    var class_ = 'c-message--icon c-message--'+level;
    $("#tip-icon").removeAttr('class');
    $("#tip-icon").addClass(class_);
    $("#tips-box").show();

    $(".c-message__title").html(title);
    $(".el-notification__content").html(cont);

    setTimeout('$("#tips-box").hide()',3500)

}