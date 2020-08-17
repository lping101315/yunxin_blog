/**
 * Created by Administrator on 2018/8/23.
 */
var p = document.documentElement.clientWidth ;
szie();
window.onresize=function(){
    szie();
}
function szie(){
    if(p > 1204){
        ! function(e, t) { var n = t.documentElement,
            d = e.devicePixelRatio || 1;
            function i() {
                var e = n.clientWidth / 19.2;

                n.style.fontSize = e + "px" } if (function e() { t.body ? t.body.style.fontSize = "14px" : t.addEventListener("DOMContentLoaded", e) }(), i(), e.addEventListener("resize", i), e.addEventListener("pageshow", function(e) { e.persisted && i() }), d >= 2) { var o = t.createElement("body"),
                a = t.createElement("div");
                a.style.border = ".5px solid transparent", o.appendChild(a), n.appendChild(o), 1 === a.offsetHeight && n.classList.add("hairlines"), n.removeChild(o) }


        }(window, document)
    }else {

        ! function(e, t) { var n = t.documentElement,
            d = e.devicePixelRatio || 1;

            function i() {
                var e = n.clientWidth / 7.5;

                n.style.fontSize = e + "px" } if (function e() { t.body ? t.body.style.fontSize = "14px" : t.addEventListener("DOMContentLoaded", e) }(), i(), e.addEventListener("resize", i), e.addEventListener("pageshow", function(e) { e.persisted && i() }), d >= 2) { var o = t.createElement("body"),
                a = t.createElement("div");
                a.style.border = ".5px solid transparent", o.appendChild(a), n.appendChild(o), 1 === a.offsetHeight && n.classList.add("hairlines"), n.removeChild(o) }


        }(window, document)

    }
}