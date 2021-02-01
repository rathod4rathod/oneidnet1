/*author venkatesh*/
var mtnhit = "no",
    load_mtn_count = 0;

function resetvalues() {
    mtnhit = "no", load_mtn_count = 0;
    $("#pageusers").html("");
}
$("#oneidet_user_search").keyup(function(e) {
    if (e.keyCode == 13) {
        resetvalues();
        contactSuggestion(null, $.trim($(this).val()));
    }
    var leng = $.trim($(this).val()).length;

    if (leng == 3 || leng == 5 || leng == 8 || leng == 11) {
        callAJAX(oneidnet_url + "people/findpeople", { searchval: $.trim($(this).val()) }, function(data) {
            $(".spinner-md").remove();
            if ($.trim(data) != "EMPTY") {
                $("#searchsugbox").show();
                $("#systemSuggestion").html($.trim(data));
            } else {
                $("#searchsugbox").hide();
            }

        }, function() {
            // $("#systemSuggestion").html('<li id="progress"><div class="spinner-md" style="margin-left: 40%;"></div></li>');
        }, "");

    } else {
        //    $("#searchsugbox").hide();
    }
});

$(document).on("click", "html", function() {
    $("#searchsugbox").hide();
});

//november 23 2016 by venkatesh
$(document).on("click", ".usersug", function() {
    resetvalues();
    $("#oneidet_user_search").val($(this).find("h3").html());
    contactSuggestion($(this).attr("id"), null)
});

function contactSuggestion(id = null, val = null) {
    $(".notfound").hide();
    if (val == null && id == null) {
        var leng = $.trim($("#oneidet_user_search").val());
        if (leng.length >= 3) {
            val = leng;
        }
    }
    callAJAX(oneidnet_url + "people/connectionsuggtions", { load_mtn_count: load_mtn_count, uid: id, val: val }, function(data) {
        $(".spinner-lg").remove();
        if ($.trim(data) != "EMPTY") {
            mtnhit = "yes";
            load_mtn_count += 30;
            $("#pageusers").append($.trim(data));
        } else {
            $(".notfound").show();
            mtnhit = "no";
        }

    }, function() {
        $("#pageusers").append('<div class="spinner-lg" style="margin-left:45%;"></div>');
    }, "");

}

$(window).scroll(function() {
    if ("yes" == mtnhit && $(window).scrollTop() + $(window).height() >= $(document).height()) {
        contactSuggestion();
    }
});
$(document).on("click", ".new-submit", function() {
    contactSuggestion();
});
$(document).on("click", ".acnt", function() {
    var tobj = $(this);
    callAJAX(oneidnet_url + "people/connectionInsert", { assoc_id: $.trim($(this).attr("id")) }, function(data) {
        if ($.trim(data) == 1) {
            tobj.removeClass("acnt");
            tobj.html("Request pending");
            tobj.css("background-color", "#49b8fb");
        } else {
            tobj.disabled = false;
        }
    }, function() {
        tobj.css("background-color", "#afcada");
    }, "");
});

if ($.trim($("#qid").val()).length != 0) {
    contactSuggestion($.trim($("#qid").val()), null);
} else if ($.trim($("#qval").val()).length != 0) {
    contactSuggestion(null, $.trim($("#qval").val()));
} else {
    contactSuggestion();
}