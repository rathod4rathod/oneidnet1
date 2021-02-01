function getCookie(n) {
    for (var o = n + "=", e = document.cookie.split(";"), t = 0; t < e.length; t++) {
        for (var i = e[t];
            " " == i.charAt(0);) i = i.substring(1);
        if (0 == i.indexOf(o)) return i.substring(o.length, i.length)
    }
    return ""
}

function createCookie(n, o, e) {
    if (e) {
        var t = new Date;
        t.setTime(t.getTime() + 24 * e * 60 * 60 * 1e3);
        var i = "; expires=" + t.toGMTString()
    } else var i = "";
    document.cookie = n + "=" + o + i + "; path=/"
}

function payVideo() {
    var n = document.getElementById("isdes_myVideo");
    document.getElementById("isdes_playButton");
    n.paused ? n.play() : n.pause()
}
$(document).ready(function() {
    var n;
    null != sessionStorage.getItem("currentURL") && $("#main_iframe").attr("src", sessionStorage.getItem("currentURL")), $("#main_iframe").load(function() {
        n = document.getElementById("main_iframe").src, sessionStorage.setItem("currentURL", n)
    }), "load" == $("#main_iframe").attr("src") && ($("#main_iframe").attr("src", ""), $("#main_iframe").attr("src", "https://tszmail.oneidnet.com"));
    var o = decodeURIComponent(getCookie("rdc"));
    if ("" !== o && "null" !== o) {
        window.location.protocol, "localhost" === window.location.hostname ? "localhost" : window.location.hostname;
        $("#main_iframe").attr("src", o), createCookie("rdc", "", -1)
    }
    $(".selectAll").click(function() {
        $(".trashpopUpWrapper ul li").addClass("selectModule")
    }), $(".systemTrash img").dblclick(function() {
        $(".trashPopup").fadeIn(300)
    }), $(".oneidsystemPopupCloseBtn").click(function() {
        $(".trashPopup").fadeOut(100)
    }), $(".settings").click(function() {
        $(".settingsPopup").fadeIn(300)
    }), $(".oneidsystemPopupCloseBtn").click(function() {
        $(".settingsPopup").fadeOut(100)
    }), $(".aboutUs").click(function() {
        $(".aboutMePopup").fadeIn(300)
    }), $(".oneidsystemPopupCloseBtn").click(function() {
        $(".aboutMePopup").fadeOut(100)
    }), $(".paybook").click(function() {
        $(".paybookPopup").fadeIn(300)
    }), $(".oneidsystemPopupCloseBtn").click(function() {
        $(".paybookPopup").fadeOut(100)
    }), $("#tunnelContainer").dblclick(function() {
        $(".systemContainerWrapper").css({
            backgroundColor: "rgba(250, 250, 250, 0.1)"
        }), document.getElementById("moduleSectionContainer").innerHTML = '<object style="width: 920px; height: 100% border: solid 0px #333; overflow-x: hidden;" type="text/html" data="../../14-08-2015/ResponsiveModuleHeader/responsiveModuleHeader.html"></object>'
    }), $(".minMicroMailContentWrapper,.minMicroClickContentWrapper,.minMicroTunnelContentWrapper,.minMicroFinditContentWrapper,.minMicroCvbankContentWrapper,.minMicroNetproContentWrapper,.minMicroOneidshipContentWrapper,.minMicroOnevisionContentWrapper,.minMicroTraveltimeContentWrapper,.minMicroDealerxContentWrapper,.minMicroIsnewsContentWrapper,.minMicroVcomContentWrapper,.minMicroCoofficeContentWrapper,.minMicroOnenetworkContentWrapper,.minMicroOneshopContentWrapper,.minMicroBuzzinContentWrapper,.microMailContentWrapper,.microClickContentWrapper,.microTunnelContentWrapper,.microFinditContentWrapper,.microCvbankContentWrapper,.microNetproContentWrapper,.microOneidshipContentWrapper,.microOnevisionContentWrapper,.microTraveltimeContentWrapper,.microDealerxContentWrapper,.microIsnewsContentWrapper,.microVcomContentWrapper,.microCoofficeContentWrapper,.microOnenetworkContentWrapper,.microOneshopContentWrapper,.microBuzzinContentWrapper").click(function() {
        var n = $(this).attr("class");
        if ("127.0.0.1" == window.location.host || "localhost" == window.location.host || "192.168.0.100" == window.location.host) var o = {
            microMailContentWrapper: document.location.origin + "/360mail/",
            microClickContentWrapper: document.location.origin + "/click/",
            microTunnelContentWrapper: document.location.origin + "/tunnel/",
            microFinditContentWrapper: document.location.origin + "/fi/",
            microCvbankContentWrapper: document.location.origin + "/cvbank/",
            microNetproContentWrapper: document.location.origin + "/netpro/",
            microOneidshipContentWrapper: document.location.origin + "/oneidship/",
            microOnevisionContentWrapper: document.location.origin + "/OneVision/",
            microTraveltimeContentWrapper: document.location.origin + "/traveltime/index.php",
            microDealerxContentWrapper: document.location.origin + "/dealerx/",
            microIsnewsContentWrapper: document.location.origin + "/isnews/",
            microVcomContentWrapper: document.location.origin + "/vcom/",
            microCoofficeContentWrapper: document.location.origin + "/coffice/",
            microOnenetworkContentWrapper: document.location.origin + "/onenetwork/",
            microOneshopContentWrapper: document.location.origin + "/oneshop/",
            microBuzzinContentWrapper: document.location.origin + "/buzzin/",
            minMicroMailContentWrapper: document.location.origin + "/360mail/",
            minMicroClickContentWrapper: document.location.origin + "/click/",
            minMicroTunnelContentWrapper: document.location.origin + "/tunnel/",
            minMicroFinditContentWrapper: document.location.origin + "/fi/",
            minMicroCvbankContentWrapper: document.location.origin + "/cvbank/",
            minMicroNetproContentWrapper: document.location.origin + "/netpro/",
            minMicroOneidshipContentWrapper: document.location.origin + "/oneidship/",
            minMicroOnevisionContentWrapper: document.location.origin + "/OneVision/",
            minMicroTraveltimeContentWrapper: document.location.origin + "/traveltime/",
            minMicroDealerxContentWrapper: document.location.origin + "/dealerx/",
            minMicroIsnewsContentWrapper: document.location.origin + "/isnews/",
            minMicroVcomContentWrapper: document.location.origin + "/vcom/",
            minMicroCoofficeContentWrapper: document.location.origin + "/coffice/",
            minMicroOnenetworkContentWrapper: document.location.origin + "/onenetwork/",
            minMicroOneshopContentWrapper: document.location.origin + "/oneshop/",
            minMicroBuzzinContentWrapper: document.location.origin + "/buzzin/"
        };
        else var o = {
            microMailContentWrapper: "https://tszmail.oneidnet.com",
            microClickContentWrapper: "https://click.oneidnet.com",
            microTunnelContentWrapper: "https://tunnel.oneidnet.com",
            microFinditContentWrapper: "https://fi.oneidnet.com",
            microCvbankContentWrapper: "https://cvbank.oneidnet.com",
            microNetproContentWrapper: "https://netpro.oneidnet.com",
            microOneidshipContentWrapper: "https://oneidship.oneidnet.com",
            microOnevisionContentWrapper: "https://onevision.oneidnet.com",
            microTraveltimeContentWrapper: "https://traveltime.oneidnet.com/",
            microDealerxContentWrapper: "https://dealerx.oneidnet.com",
            microIsnewsContentWrapper: "https://isnews.oneidnet.com",
            microVcomContentWrapper: "https://vcom.oneidnet.com",
            microCoofficeContentWrapper: "https://coffice.oneidnet.com",
            microOnenetworkContentWrapper: "https://onenetwork.oneidnet.com",
            microOneshopContentWrapper: "https://oneshop.oneidnet.com",
            microBuzzinContentWrapper: "https://buzzin.oneidnet.com",
            minMicroMailContentWrapper: "https://tszmail.oneidnet.com",
            minMicroClickContentWrapper: "https://click.oneidnet.com",
            minMicroTunnelContentWrapper: "https://tunnel.oneidnet.com",
            minMicroFinditContentWrapper: "https://fi.oneidnet.com",
            minMicroCvbankContentWrapper: "https://cvbank.oneidnet.com",
            minMicroNetproContentWrapper: "https://netpro.oneidnet.com",
            minMicroOneidshipContentWrapper: "https://oneidship.oneidnet.com",
            minMicroOnevisionContentWrapper: "https://OneVision.oneidnet.com",
            minMicroTraveltimeContentWrapper: "https://traveltime.oneidnet.com/",
            minMicroDealerxContentWrapper: "https://dealerx.oneidnet.com",
            minMicroIsnewsContentWrapper: "https://isnews.oneidnet.com",
            minMicroVcomContentWrapper: "https://vcom.oneidnet.com",
            minMicroCoofficeContentWrapper: "https://coffice.oneidnet.com",
            minMicroOnenetworkContentWrapper: "https://onenetwork.oneidnet.com",
            minMicroOneshopContentWrapper: "https://oneshop.oneidnet.com",
            minMicroBuzzinContentWrapper: "https://buzzin.oneidnet.com"
        };
        var e = n.split(" ");
        $(".coffice_notif_jobs_Click")[0] ? ($("#main_iframe").attr("src", document.location.origin + "/coffice/index.php/viewapplicant/viewapplicantPage"), $(".microCoofficeContentWrapper").removeClass("coffice_notif_jobs_Click")) : $(".coffice_notif_calls_Click")[0] ? ($("#main_iframe").attr("src", document.location.origin + "/coffice/index.php/events/callsPage"), $(".microCoofficeContentWrapper").removeClass("coffice_notif_calls_Click")) : $(".coffice_notif_meetings_Click")[0] ? ($("#main_iframe").attr("src", document.location.origin + "/coffice/index.php/events/meetingsPage"), $(".microCoofficeContentWrapper").removeClass("coffice_notif_meetings_Click")) : "NONE" !== o[n] && $("#main_iframe").attr("src", o[e[0]])
    }), $(".isdes_menuBtn").click(function() {
        "0px" == $(".isdes_menu").css("height") ? $(".isdes_menu").animate({
            height: "85%"
        }) : $(".isdes_menu").animate({
            height: "0%"
        })
    })
});
