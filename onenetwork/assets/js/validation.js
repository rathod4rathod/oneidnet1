function getCookie(t) {
    for (var n = t + "=", e = document.cookie.split(";"), r = 0; r < e.length; r++) {
        for (var o = e[r];
            " " == o.charAt(0);) o = o.substring(1);
        if (0 == o.indexOf(n)) return o.substring(n.length, o.length)
    }
    return ""
}

function onlyNumeric(t) {
    var n = /^[0-9]+$/;
    return n.test(t) ? !0 : !1
}

function onlyYear(t) {
    var n = /^(19[5-9]\d|20[0-4]\d|2090)$/;
    return n.test(t) ? !0 : !1
}

function alphaNumWithHyphenDotSpace(t) {
    var n = /^[A-Za-z .-]+$/;
    return n.test(t) ? !0 : !1
}

function alphaNumericWithHyphenDotSpace(t) {
    var n = /^[A-Za-z0-9 .-]+$/;
    return n.test(t) ? !0 : !1
}

function alphaWithHyphenSpace(t) {
    var n = /^[A-Za-z -]+$/;
    return n.test(t) ? !0 : !1
}

function alphaNumericOnly(t) {
    var n = /^[A-Za-z0-9 ]+$/;
    return n.test(t) ? !0 : !1
}

function hasWhiteSpace(t) {
    var n = /\s/g;
    return n.test(t) ? !0 : !1
}

function validateEmail(t) {
    var n = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return n.test(t)
}

function onlyAlphabetsWithSpace(t) {
    var n = /^[a-zA-Z ]+$/;
    return n.test(t) ? !0 : !1
}

function alphaNumericWithHyphenComma(t) {
    var n = /^[a-zA-Z0-9\s\-,]+$/;
    return n.test(t) ? !0 : !1
}

function alphaNumericWithSpecial(t) {
    var n = /^[a-zA-Z0-9?=.*!@#$%^&*_\-\s]+$/;
    return n.test(t) ? !0 : !1
}

function alphnumericWithspecialchr(t) {
    var n = /^ [A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$/;
    return n.test(t) ? !0 : !1
}

function timertn() {
    var t = new Date;
    return datetime = t.getDate() + "_" + (t.getMonth() + 1) + "_" + t.getFullYear() + "_" + t.getHours() + "_" + t.getMinutes() + "_" + t.getSeconds()
}

function bin2hex(t) {
    var n, e, r, o = "";
    for (t += "", n = 0, e = t.length; e > n; n++) r = t.charCodeAt(n).toString(16), o += r.length < 2 ? "0" + r : r;
    return o
}

function sekey_return() {
    return bin2hex(timertn() + "[@#$]" + $.trim($("#cid").val()) + "[@#$]" + $.trim($("#user_id").val()))
}

function error_data(t) {
    var n = jQuery.parseJSON(t);
    $.each(n, function(t, n) {
        $("#" + t).addClass("redfoucusclass")
    })
}

function isJson(t) {
    t = "string" != typeof t ? JSON.stringify(t) : t;
    try {
        t = JSON.parse(t)
    } catch (n) {
        return !1
    }
    return "object" == typeof t && null !== t ? !0 : !1
}

function url_redirection(t) {
    return "CLOGOUT" == $.trim(t) ? (window.top.location.href = document.location.origin + "/oneidnet/", !1) : void 0
}
if ("127.0.0.1" == window.location.host || "localhost" == window.location.host || "192.168.0.100" == window.location.host) {
    var onenetwork_url = document.location.origin + "/onenetwork/",
        oneidnet_url = document.location.origin + "/oneidnet/";
    coffice_url = document.location.origin + "/coffice/"
} else {
    var onenetwork_url = document.location.origin + "/",
        oneidnet_url = "https://www.oneidnet.com/";
    coffice_url = "https://coffice.oneidnet.com/"
}
var seg = getCookie("oud"),path=window.location.pathname;
var f=path.split("/");
if("livechat"!=f[1]){
	if ("https:" != window.location.protocol) var current_url = "https:" + window.location.href.substring(window.location.protocol.length);
else var current_url = window.location.href;
(self == top || "" == seg) && (top.location.href = oneidnet_url + "redirection?url=" + current_url);
	}


