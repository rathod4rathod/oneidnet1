function message_popUpVisibility(o){var e = document.getElementById(o); "block" == e.style.display?e.style.display = "none":e.style.display = "block"}

$(document).ready(function() {
    $(".moduleSearchField").focus(function() {
        $(this).next(".searchSuggessions").fadeIn(50)
    }), $(".moduleSearchField").blur(function() {
        $(".searchSuggessions").fadeOut(50)
    })
}), $(document).ready(function() {
    $(".moduleOption").click(function() {
        $(".notificationWrapper").removeClass("showNotification");
        var e = $(this).attr("id");
        "netprosetting" == e && ($(this).children(".notificationWrapper").addClass("showNotification"), 
        $(".moduleOption").removeClass("moduleOptionHighlite"), $(this).addClass("moduleOptionHighlite"))
        "notification_span1" == e && ($(this).children(".notificationWrapper").addClass("showNotification"), 
        $(".moduleOption").removeClass("moduleOptionHighlite"), $(this).addClass("moduleOptionHighlite"))
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






//november 23 2016 by venkatesh
$(document).on("click","#cvbankfr",function(){
    var u;    
    if($.trim($("#cvfr_ntf_count").html())){
         u="YES";
    }else{
         u="NO";
    }    
    if($(this).hasClass("cvfrhit")==false){
        $("#cvbfr").html("<div class='spinner-sm' style='margin-left:45%'></div>");
         callAJAX(onenetwork_url + "home/friendrequest", {requestforupdate:u}, function (data) {
             $("#cvbfr").html(data);
         },"",function(){
             $("#cvfr_ntf_count").html("").hide();
         }); 
        $(this).addClass("cvfrhit")
    }
});

//october 27 2016 by venkatesh
        $(document).on("click", ".cvadd", function(){
callAJAX(onenetwork_url + "home/userAccept", {profileid:$.trim($(this).attr("uid"))}, function (data) {
if ($.trim(data) == 1){
$("#" + this.param.profileid).fadeOut("slow");
}
}, function(){
this.disabled = true;
}, function(){
this.disabled = false;
});
});
//october 27 2016 by venkatesh
$(document).on("click", ".cvignr", function(){
    
callAJAX(onenetwork_url + "home/ignoreconnection", {profileid:$.trim($(this).attr("uid"))}, function (data) {
if ($.trim(data) == 1){
$("#" + this.param.profileid).fadeOut("slow");
}
}, function(){
this.disabled = true;
}, function(){

this.disabled = false;
});
});

$(document).on("click", "#messages", function () {
if ($(this).hasClass("msgyes") == false) {
$("#onenetworkMsg").html("<div id='prgrs'>.<div class='spinner-sm' style='margin-left:45%'></div></div>");
        $.get(baseUrl + "profile/getAllRecievedMessages", {msgntf: $.trim($("#msgnotification").html())}, function (data) {
        $("#msgnotification").hide().html("");
                $("#cofficemsglist").html($.trim(data));
        });
        $(this).addClass("msgyes");
}
});

function friendcnt(){

callAJAX(onenetwork_url + "home/friendrequestcount","" , function (data) {
if($.trim(data)!=0){ 
$("#cvfr_ntf_count").html($.trim(data)).show();
    $("#cvbankfr").removeClass("cvfrhit");

}
},"",function(){

});    
}

friendcnt();
setInterval(function(){ friendcnt(); }, 3000);
