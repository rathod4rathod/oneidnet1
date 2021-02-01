function netpro_notify_count() {
    $.ajax({
        type: "POST",
        url: oneidnet_url + "index.php/notifications/netpro_notification_count",
        success: function(i) {
            0 != i ? ($(".netpro .mmhoRestore").show(), $("#ntpntcnt").html(i)) : $(".netpro .mmhoRestore").hide()
        }
    })
}
function netpronotificationdata_div() {
    $.get(oneidnet_url + "index.php/notifications/get_netpro_notifications", function(i) {
        $("#netpronotifications").html(i)
    })
}
function tunnel_slide_view() {
    $.get(oneidnet_url + "index.php/notifications/tunnel_notification_slide_view", function(i) {
        $("#tun_ntf_count").html(i)
    })
}

function tunnel_notification_count() {
    $.ajax({
        type: "POST",
        url: oneidnet_url + "index.php/notifications/tunnel_notification_count",
        success: function(i) {
            $("#oneid_tundev_nft_count").html() != i && (0 != i ? ($(".tmmhoRestore").show(), $("#oneid_tundev_nft_count").html(i)) : $(".tmmhoRestore").hide())
        }
    })
}

function click_notification_total_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/click_notification_total_count",
        success: function(i) {
            0 != i ? ($(".cnotify_cnt").show(), $("#click_notification_cnt").html(i)) : $(".cnotify_cnt").hide()
        }
    })
}
function find_notification_total_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/find_notification_total_count",
        success: function(i) {
            0 != i ? ($(".fntnotify_cnt").show(), $("#finditnotify").html(i)) : $(".fntnotify_cnt").hide()
        }
    })
}
function onenetwork_notification_total_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/onenetwork_notification_total_count",
        success: function(i) {
            
            0 != i ? ($(".onenetworkntfcnt").show(), $("#ontnotify").html(i)) : $(".onenetworkntfcnt").hide()
        }
    })
}

function click_not_slider() {
    $.get(oneidnet_url + "index.php/notifications/click_notify_tpl", function(i) {
        $("#click_notification_slider").html(i)
    })
}

function os_notify_slider() {
    $.get(oneidnet_url + "index.php/notifications/os_notifies", function(i) {
        $("#os_notify_slider").html(i)
    })
}

function os_noti_cunt() {
    $.get(oneidnet_url + "index.php/notifications/os_notifies_count", function(i) {
        0 != i ? ($(".ntosstore").show(), $("#os_notify_count").html(i)) : $(".ntosstore").hide()
    })
}

function buz_notify_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/notification_total_count",
        success: function(i) {
            0 != i ? ($(".bzntf_count").show(), $("#buzzin_notification_cnt").html(i), buzz_notify_slider()) : ($(".bzntf_count").hide(), buzz_notify_slider())
        }
    })
}

function buzz_notify_slider() {
    $.get(oneidnet_url + "index.php/notifications/buzzin_notify_tpl", function(i) {
        $("#buzz_notify_slider").html(i)
    })
}

function cvbank_notify_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/cvbank_notify_count",
        success: function(i) {
            0 != i ? ($(".cvbank .mmhoRestore").show(), $("#cvbank_cnt").html(i)) : $(".cvbank .mmhoRestore").hide()
        }
    })
}

function cvbank_notify_slider() {
    $.get(oneidnet_url + "index.php/notifications/cvbankNotifications", function(i) {
        $("#cvbank_notify_slider").html(i)
    })
}

function isnews_notify_slider() {
    $.get(oneidnet_url + "index.php/notifications/isnewsNotifications", function(i) {
        $("#isnews_notify_slider").html(i)
    })
}

function coffice_notify_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/co_notify_cnt",
        success: function(i) {
            0 != i ? ($(".cooffice .mmhoRestore").show(), $("#co_notify_cnt").html(i)) : $(".cooffice .mmhoRestore").hide()
        }
    })
}

function coffice_slide_view() {
    $.get(oneidnet_url + "index.php/notifications/coNotifications", function(i) {
        $("#co_notify_slider").html(i)
    })
}

function dx_slide_view() {
    $.get(oneidnet_url + "index.php/notifications/dxNotifications", function(i) {
        $("#dx_notify_slider").html(i)
    })
}

function dx_notify_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/dxNotificationCnt",
        success: function(i) {
            0 != i ? ($(".dealerx .mmhoRestore").show(), $("#dx_notify_cnt").html(i)) : $(".dealerx .mmhoRestore").hide()
        }
    })
}

function isn_notify_count() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "index.php/notifications/insNotificationCnt",
        success: function(i) {
            0 != i ? ($(".isnews .mmhoRestore").show(), $("#isn_notify_cnt").html(i)) : $(".isnews .mmhoRestore").hide()
        }
    })
}
$(document).ready(function() {
   
    var i = 2,
        n = 2,
        t = 2,
        o = 2,
        e = 2,
        c = 2,
        s = 2,
        _ = 2;
    setInterval(function() {
        if (1 == $("#os_notify_slider").is(":visible")) {
            var d = $("#os_notify_slider .mmcMainSlideWrapper > div").length;
            $("#os_notify_slider").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#os_notify_slider div[id^='notify_']").css("display", "none");
                var n = $(this).find(".mmcMainInnerWrapper:nth-child(" + i + ")").attr("id");
                $("#" + n).css("display", "block"), $(this).css({
                    margin: "0px"
                }), d > i ? i++ : i = 1
            })
        }
        if (1 == $("#buzz_notify_slider1").is(":visible")) {
            var dv = $("#buzz_notify_slider1 .mmcMainSlideWrapper > div").length;
            $("#buzz_notify_slider1").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#buzz_notify_slider1 div[id^='bznotify_']").css("display", "none");
                var n = $(this).find(".mmcMainInnerWrapper:nth-child(" + i + ")").attr("id");
                $("#" + n).css("display", "block"), $(this).css({
                    margin: "0px"
                }), dv > i ? i++ : i = 1
            })
        }
        if (1 == $("#tunnel_slider_notify").is(":visible")) {
            var f = $("#tunnel_slider_notify .mmcMainSlideWrapper > div").length;
            $("#tunnel_slider_notify").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#tunnel_slider_notify div[id^='tnotify_']").css("display", "none");
                var i = $(this).find(".mmcMainInnerWrapper:nth-child(" + n + ")").attr("id");
                $("#" + i).css("display", "block"), $(this).css({
                    margin: "0px"
                }), f > n ? n++ : n = 1
            })
        }
        if ($("#click_slider_view").is(":visible") === !0) {
            var a = $("#click_slider_view .mmcMainSlideWrapper > div").length;
            $("#click_slider_view").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#click_slider_view div[id^='cnotify_']").css("display", "none");
                var i = $(this).find(".mmcMainInnerWrapper:nth-child(" + t + ")").attr("id");
                $("#" + i).css("display", "block"), $(this).css({
                    margin: "0px"
                }), a > t ? t++ : t = 1
            })
        }
        if ($("#netpro_notify_slider").is(":visible") === !0) {
            var r = $("#netpro_notify_slider .mmcMainSlideWrapper > div").length;
            $("#netpro_notify_slider").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#netpro_notify_slider div[id^='nnotify_']").css("display", "none");
                var i = $(this).find(".mmcMainInnerWrapper:nth-child(" + o + ")").attr("id");
                $("#" + i).css("display", "block"), $(this).css({
                    margin: "0px"
                }), r > o ? o++ : o = 1
            })
        }
        if ($("#cvbank_notify_slider").is(":visible") === !0) {
            var l = $("#cvbank_notify_slider .mmcMainSlideWrapper > div").length;
            $("#cvbank_notify_slider").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#cvbank_notify_slider div[id^='cvnotify_']").css("display", "none");
                var i = $(this).find(".mmcMainInnerWrapper:nth-child(" + e + ")").attr("id");
                $("#" + i).css("display", "block"), $(this).css({
                    margin: "0px"
                }), l > e ? e++ : e = 1
            })
        }
        if ($("#isnews_notify_slider").is(":visible") === !0) {
            var p = $("#isnews_notify_slider .mmcMainSlideWrapper > div").length;
            $("#isnews_notify_slider").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#isnews_notify_slider div[id^='isnnotify_']").css("display", "none");
                var i = $(this).find(".mmcMainInnerWrapper:nth-child(" + c + ")").attr("id");
                $("#" + i).css("display", "block"), $(this).css({
                    margin: "0px"
                }), p > c ? c++ : c = 1
            })
        }
        if ($("#co_notify_slider").is(":visible") === !0) {
            var u = $("#co_notify_slider .mmcMainSlideWrapper > div").length;
            $("#co_notify_slider").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#co_notify_slider div[id^='conotify_']").css("display", "none");
                var i = $(this).find(".mmcMainInnerWrapper:nth-child(" + s + ")").attr("id");
                $("#" + i).css("display", "block"), $(this).css({
                    margin: "0px"
                }), u > s ? s++ : s = 1
            })
        }
        if ($("#dx_notify_slider").is(":visible") === !0) {
            var m = $("#dx_notify_slider .mmcMainSlideWrapper > div").length;
            $("#dx_notify_slider").find(".mmcMainSlideWrapper").animate({
                marginTop: "-50px"
            }, function() {
                $("#dx_notify_slider div[id^='dxnotify_']").css("display", "none");
                var i = $(this).find(".mmcMainInnerWrapper:nth-child(" + _ + ")").attr("id");
                $("#" + i).css("display", "block"), $(this).css({
                    margin: "0px"
                }), m > _ ? _++ : _ = 1
            })
        }
    }, 1e4)
});



		onenetwork_notification_total_count(),
		buz_notify_count(), 
        click_notification_total_count(), 
        find_notification_total_count(), 
        os_noti_cunt(), 
        netpro_notify_count(), 
        tunnel_notification_count(), 
        cvbank_notify_count(), 
        coffice_notify_count(), 
        dx_notify_count(), 
        isn_notify_count();




os_notify_slider(), 
        click_not_slider(), 
        buzz_notify_slider(), 
        tunnel_slide_view(), 
        netpronotificationdata_div(), 
        cvbank_notify_slider(), 
        isnews_notify_slider(), 
        coffice_slide_view(), 
        dx_slide_view();





function reloaction(val){
           location.href=oneidnet_url+"contacts?sval="+val;
    }
$("#oneidet_user_search").keyup(function (e) {
    if (e.keyCode == 13) {
         reloaction($.trim($(this).val()));
    }
    var leng = $.trim($(this).val()).length;
    if (leng == 3 || leng == 5 || leng == 8 || leng == 11) {
        callAJAX(oneidnet_url + "people/findpeople", {searchval: $.trim($(this).val())}, function (data) {
			$(".spinner-md").remove();
			if($.trim(data)!="EMPTY"){
				$("#searchsugbox").show();
			$("#systemSuggestion").html($.trim(data));	
			}else{
				$("#searchsugbox").hide();
			}
            
        }, function () {
           // $("#systemSuggestion").html('<li id="progress"><div class="spinner-md" style="margin-left: 40%;"></div></li>');
        }, "");

    } else {
//    $("#searchsugbox").hide();
    }
});

$(document).on("click","#search",function(){
         reloaction($.trim($("#oneidet_user_search").val()));
});

//november 23 2016 by venkatesh
$(document).on("click", ".usersug", function () { 
    location.href=oneidnet_url+"contacts?sid="+$(this).attr("id");
});

      var countdownTimer="";

 setInterval(function() {
      netconnection();
    }, 5000);
      
function netconnection(){
    online = navigator.onLine;
    if(online==false){
        if(document.getElementById("myModal")==null){
             $("body").prepend('<div id="myModal" class="modal fade in" role="dialog"><div class="modal-dialog">\n\
            <div class="modal-content"><div class="uil-ripple-css" style="transform:scale(1);">\n\
<div></div><div></div></div><div class="modal-header"><h4 class="modal-title">\n\
<img src="assets/Images/cross-flat.png" align="absmiddle" width="28" height="24" style="margin-right:10px;margin-top:-7px;"/>\n\
No Internet connection</h4></div><div class="modal-body"><p>Make sure your device is connected to internet.</p>\n\
<p>Retrying to connect in <strong  id="time">00</strong> seconds  <a id="rtry" style="cursor: pointer;"></a></p></div></div></div></div>');
             countdownTimer = setInterval('timer()', 1000);
             
        }
        
    }else if( document.getElementById("myModal")!=null ){
        
        $("#myModal").remove();
    }
}


var upgradeTime = 60;
var seconds = upgradeTime;
function timer() {
    var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('time').innerHTML = remainingSeconds;
    if (seconds == 0) {
        $("#rtry").html("Retry now");
        clearInterval(countdownTimer);
        document.getElementById('time').innerHTML = "00";
        
    } else {
        seconds--;
    }
}

$(document).on("click","#rtry",function(){
    $("#rtry").html("");
    upgradeTime = 60;
    seconds = upgradeTime;
   countdownTimer = setInterval('timer()', 1000);
});