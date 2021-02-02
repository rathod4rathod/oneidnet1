$(document).ready(function() {}), $(document).ready(function() {
    var e = 0;
    $(".moduleOption").click(function() {
        "refresh_page" == $(this).attr("id") ? location.reload() : ($(".notificationWrapper").removeClass("showNotification"), $(this).children(".notificationWrapper").addClass("showNotification"), $(".moduleOption").removeClass("moduleOptionHighlite"), $(this).addClass("moduleOptionHighlite"))
    })
});
var mouseOverNotifyElement = !1;
$(document).ready(function() {
    $(".moduleOption").on("mouseenter", function() {
        mouseOverNotifyElement = !0
    }).on("mouseleave", function() {
        mouseOverNotifyElement = !1
    }), $("html").mouseup(function() {
        mouseOverNotifyElement || ($(".notificationWrapper").removeClass("showNotification"), $(".moduleOption").removeClass("moduleOptionHighlite"))
    })
}), $(document).ready(function() {
    $(".dropMenuHead").click(function() {
        $(".dropMenuHead").addClass("dropMenuHeadHighlite"), $(".menuTitle").addClass("dropMenuTitleHighlite"), $(".dropMenuIcon").addClass("dropMenuIconHighlite")
    })
}), $(document).ready(function() {
    $(".subHeaderMenu ul li").click(function() {
        $(".subHeaderMenu ul li").removeClass("subHeaderMenuHighlite"), $(this).addClass("subHeaderMenuHighlite")
    })
}), $(document).ready(function() {
    $(".moduleSearchIcon").click(function() {
        $(this).parent().children(".categories").addClass("showCategories")
    })
}), $(document).ready(function() {
    $(".categories").on("mouseenter", function() {
        mouseOverNotifyElement = !0
    }).on("mouseleave", function() {
        mouseOverNotifyElement = !1
    }), $("html").mouseup(function() {
        mouseOverNotifyElement || $(".categories").removeClass("showCategories")
    })
});
//november 21 2016 by venkatesh
        $(document).on("click", "#cvbankfr", function(){
var u;
        if ($.trim($("#cvfr_ntf_count").html())){
u = "YES";
} else{
u = "NO";
}
if ($(this).hasClass("cvfrhit") == false){
$("#cvbfr").html("<div class='spinner-sm' style='margin-left:45%'></div>");
        callAJAX(oneshop_url + "/pprofile/exploreFollowers", {requestforupdate:u}, function (data) {
        $("#cvbfr").html(data);
        }, "", function(){
        $("#cvfr_ntf_count").html("").hide();
        });
        $(this).addClass("cvfrhit")
}
});
    function friendcnt(){
        callAJAX(oneshop_url + "/pprofile/exploreFollowerscount", {folowercunt:"folowercunt"}, function (data) {
        if ($.trim(data) != 0){
        $("#cvfr_ntf_count").html($.trim(data)).show();
                $("#cvbankfr").removeClass("cvfrhit");
        }
        }, "", "");
    }
friendcnt();
        


        //november 21 2016 by venkatesh
        $(document).on("click", ".cvignr", function(){
            alert($.trim($(this).attr("uid")));
        callAJAX(oneshop_url + "/pprofile/exploreFollowerdelete", {profileid:$.trim($(this).attr("uid"))}, function (data) {
        if ($.trim(data) == 1){
        $("#" + this.param.profileid).fadeOut("slow");
                }
        }, function(){
        this.disabled = true;
                }, function(){

        this.disabled = false;
        });
        });


        
 // oct 17 2016 by venkatesh
                    $(document).on("click", "#messages", function () {
                        if ($(this).hasClass("msgyes") == false) {
                            $("#oshopmsglist").html("<div style='margin-left:45%;' class='spinner-md'></div>");
                            $.get(oneshop_url + "/oshop_popup/getAllRecievedMessages",{osntfupdate:$.trim($("#msgnotification").html())}, function (data) {
                                $("#msgnotification").hide().html("");
                                $("#oshopmsglist").html($.trim(data));
                            });
                            $(this).addClass("msgyes");
                            
                        }
                    });
                    // Dec 17 2016 by venkatesh
                    function oneshopmsgcount(){
                        $.get(oneshop_url + "/oshop_popup/oshopmsgcount", function (data) {
                        if ($.trim(data) != 0) {
                             $("#messages").removeClass("msgyes");
                            $("#msgnotification").show().html($.trim(data));
                        }
                    });
                    }
                    oneshopmsgcount();
                    
                    
                // Dec 17 2016 by venkatesh
                    function oneshopNotificationCount(){
                        $.get(oneshop_url + "/templates/oneshopNotificationCount", function (data) {
                        if ($.trim(data) != 0) {
                        $("#alerts").removeClass("oshpntfyes"),
                            $("#oneshopntfcount").show().html($.trim(data));
                        }
                    });
                    }
                    oneshopNotificationCount();
                         
                    
setInterval(function(){ oneshopmsgcount(); friendcnt(); oneshopNotificationCount();
    }, 3000);

$(document).on("click","#alerts",function(){
 $(".notificationWrapper").removeClass("showNotification"), 
        $(this).children(".notificationWrapper").addClass("showNotification"), 
        $(".moduleOption").removeClass("moduleOptionHighlite"), 
        $(this).addClass("moduleOptionHighlite")
   if($(this).hasClass("oshpntfyes")==false){
       $(this).addClass("oshpntfyes"),                
                $.ajax({
            async: !1,
            type: "POST",
            url: oneshop_url + "/notification/get_user_notification",
            data:{oneshopntfcount:$.trim($("#oneshopntfcount").html())},
            success: function(o) {
                    $("#oneshopntfcount").hide().html("");
                $("#os_notification").html(o);
            }
        })
   }
    
        
});

        
       