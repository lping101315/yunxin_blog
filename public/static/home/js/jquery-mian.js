


$(".Tab_show").click(function(){
    if($(this).hasClass("Tab_show2")){
        $(this).removeClass("Tab_show2");
        $(".goods_list").removeClass("goods_list-tran");
    }else {
        $(this).addClass("Tab_show2")
        $(".goods_list").addClass("goods_list-tran");
    }
})


$(".jia").click(function(){
    var vl = $(this).siblings(".val").val();
    vl++;
    $(this).siblings(".val").val(vl);
})
$(".jian").click(function(){
    var vl = $(this).siblings(".val").val();
    if(vl > 1){
        vl--;
        $(this).siblings(".val").val(vl);
    }else {

    }
})
function clickf(){
    $(".baTanchu").css("transform","translateY(0)");
    $(".Mcake").fadeIn();
}
function none(){
    $(".baTanchu").css("transform","translateY(120%)");
    $(".Mcake").fadeOut();
}
$(".guige span").click(function(){
    $(this).addClass("on").siblings().removeClass("on")
})

function tab_cl(obg){
    var _this = $(obg);
    _this.addClass("on").siblings().removeClass("on");
    var index = _this.index();
    $(".Detailed_list").hide();
    $(".Detailed_list").eq(index).show();
}

//解绑银行卡

$(".yonghangja").on("click",function(){
    $(".tanchuop").fadeIn()
    $(".Mask2").fadeIn()
})

$(".tanchuop span").on("click",function(){
    $(".tanchuop").fadeOut()
    $(".Mask2").fadeOut()
})

$(".tanchuop em").on("click",function(){
    $(".tanchuop").fadeOut()
    $(".Mask2").fadeOut()
})

// 提现
$true = true
$('.tedxt').bind('input propertychange', function() {
    var gb = parseFloat($(".mai").text()).toFixed(2);
    var zb = parseFloat($(this).val()).toFixed(2);
    var gb1 = parseInt($(".mai").text());
    var zb2 = parseInt($(this).val());
    if(parseInt(zb)==zb){
        if(zb2 > gb1){
            if($true == true){
                $(".sui").find("b").css("display","block");
                $true = false
            }
        }else {
            $(".sui").find("b").css("display","none");
            $true = true
        }
    }else {
        if(zb > 0){
            if(zb > gb){
                if($true == true){
                    $(".sui").find("b").css("display","block");
                    $true = false
                }
            }else {
                $(".sui").find("b").css("display","none");
                $true = true
            }
        }
    }
});
$(".sui em").on("click",function(){
    var gb = parseFloat($(".mai").text()).toFixed(2);
    $(".tedxt").val(gb)
})
//提现只能输入两位小数
function clearNoNum(obj){
    obj.value = obj.value.replace(/[^\d.]/g,"");  //清除“数字”和“.”以外的字符
    obj.value = obj.value.replace(/\.{2,}/g,"."); //只保留第一个. 清除多余的
    obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
    obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3');//只能输入两个小数
    if(obj.value.indexOf(".")< 0 && obj.value !=""){//以上已经过滤，此处控制的是如果没有小数点，首位不能为类似于 01、02的金额
        obj.value= parseFloat(obj.value);
    }
}


//自定以弹出





















var $$ = function(id) {
    return "string" == typeof id ? document.getElementById(id) : id;
};
var Class = {
    create: function() {
        return function() {
            this.initialize.apply(this, arguments);
        }
    }
}
Object.extend = function(destination, source) {
    for(var property in source) {
        destination[property] = source[property];
    }
    return destination;
}
var Calendar = Class.create();
Calendar.prototype = {
    initialize: function(container, options) {
        this.Container = $$(container); //容器(table结构)
        this.Days = []; //日期对象列表
        this.SetOptions(options);
        this.Year = this.options.Year;
        this.Month = this.options.Month;
        this.onToday = this.options.onToday;
        this.onSignIn = this.options.onSignIn;
        this.onFinish = this.options.onFinish;
        this.qdDay = this.options.qdDay;
        this.isSignIn = false;
        this.Draw();
    },
    //设置默认属性
    SetOptions: function(options) {
        this.options = { //默认值
            Year: new Date().getFullYear(), //显示年
            Month: new Date().getMonth() + 1, //显示月
            qdDay: null,
            onToday: function() {}, //已签到
            onSignIn: function(){}, //今天是否签到
            onFinish: function() {} //日历画完后触发
        };
        Object.extend(this.options, options || {});
    },
    //上一个月
    PreMonth: function() {
        //先取得上一个月的日期对象
        var d = new Date(this.Year, this.Month - 2, 1);
        //再设置属性
        this.Year = d.getFullYear();
        this.Month = d.getMonth() + 1;
        //重新画日历
        this.Draw();
    },
    //下一个月
    NextMonth: function() {
        var d = new Date(this.Year, this.Month, 1);
        this.Year = d.getFullYear();
        this.Month = d.getMonth() + 1;
        this.Draw();
    },
    //画日历
    Draw: function() {
        //签到日期
        var day = this.qdDay;
        //日期列表
        var arr = [];
        //用当月第一天在一周中的日期值作为当月离第一天的天数
        for(var i = 1, firstDay = new Date(this.Year, this.Month - 1, 1).getDay(); i <= firstDay; i++) {
            arr.push("&nbsp;");
        }
        //用当月最后一天在一个月中的日期值作为当月的天数
        for(var i = 1, monthDay = new Date(this.Year, this.Month, 0).getDate(); i <= monthDay; i++) {
            arr.push(i);
        }
        var frag = document.createDocumentFragment();
        this.Days = [];
        while(arr.length > 0) {
            //每个星期插入一个tr
            var row = document.createElement("tr");
            //每个星期有7天
            for(var i = 1; i <= 7; i++) {
                var cell = document.createElement("td");
                cell.innerHTML = "&nbsp;";
                if(arr.length > 0) {
                    var d = arr.shift();
                    cell.innerHTML = "<span>" + d + "</span>";
                    if(d > 0 && day.length) {
                        for(var ii = 0; ii < day.length; ii++) {
                            this.Days[d] = cell;
                            //已签到
                            if(this.IsSame(new Date(this.Year, this.Month - 1, d), day[ii])) {
                                this.onToday(cell);
                            }
                            //判断今天是否签到
                            if(this.checkSignIn(new Date(), day[ii])) {
                                this.onSignIn();
                            }
                        }
                    }
                }
                row.appendChild(cell);
            }
            frag.appendChild(row);
        }
        //先清空内容再插入(ie的table不能用innerHTML)
        while(this.Container.hasChildNodes()) {
            this.Container.removeChild(this.Container.firstChild);
        }
        this.Container.appendChild(frag);
        this.onFinish();
        if(this.isSignIn) {
            this.isSignIn = false;
            return this.SignIn();
        }
    },
    //是否签到
    IsSame: function(d1, d2) {
        d2 = new Date(d2 * 1000);
        return(d1.getFullYear() == d2.getFullYear() && d1.getMonth() == d2.getMonth() && d1.getDate() == d2.getDate());
    },
    //今天是否签到
    checkSignIn: function(d1, d2) {
        d2 = new Date(d2 * 1000);
        return(d1.getFullYear() == d2.getFullYear() && d1.getMonth() == d2.getMonth() && d1.getDate() == d2.getDate());
    },
    //签到
    SignIn: function() {
        var now = new Date();
        var Year = now.getFullYear();
        var Month = now.getMonth() + 1;
        if(Year != this.Year || Month != this.Month) {
            this.Year = Year;
            this.Month = Month;
            this.isSignIn = true;
            return this.Draw();
        }
        var day = now.getDate();
        var arr = new Array();
        var tb = document.getElementById('idCalendar');
        for(var i = 0; i < tb.rows.length; i++) {
            for(var j = 0; j < tb.rows[i].cells.length; j++) {
                if(day == tb.rows[i].cells[j].innerText && Year == this.Year && Month == this.Month) {
                    if(tb.rows[i].cells[j].className == "onToday"){
                        return 2;
                    }
                    tb.rows[i].cells[j].className = "onToday"
                    this.qdDay.push(Date.parse(new Date()) / 1000)
                    return 1;

                }
            }
        }
    }
};



















