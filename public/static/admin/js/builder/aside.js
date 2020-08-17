/*!
 *  Document   : aside.js
 *  Author     : caiweiming <314013107@qq.com>
 *  Description: 侧栏构建器
 */
jQuery(document).ready(function() {
    // 侧栏开关
    $('#aside .switch input:checkbox').on('click', function () {
        var $switch = $(this);
        var $data = {
            value: $switch.prop('checked'),
            _t: $switch.data('table') || '',
            name: $switch.data('field') || '',
            type: 'switch',
            pk: $switch.data('id') || ''
        };

        // 发送ajax请求
        Yxin.loading();
        $.post(yxin.aside_edit_url, $data).success(function(res) {
            Yxin.loading('hide');
            if (res.code) {
                Yxin.notify(res.msg, 'success');
            } else {
                Yxin.notify(res.msg, 'danger');
                $switch.prop('checked', !$data.status);
                return false;
            }
        }).fail(function (res) {
            Yxin.loading('hide');
            Yxin.notify($(res.responseText).find('h1').text() || '服务器内部错误~', 'danger');
        });
    });
});