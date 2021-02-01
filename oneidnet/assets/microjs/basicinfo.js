function is_Valid_Email(e) {
    var t = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
        n = !1;
    return t.test(e) && (n = !0), n
}

function passwordcheck() {
    var e = $("#new_pw").val(),
        s = $("#cnf_pw").val();
    if (8 > s.length || e != s){
		 passworderror();
		 return false;
		}
    else if (e == s) {
        var r = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");
        if(0 == r.test(e)){
			passworderror();
			return false;
			} 
        
    }
}

function passworderror() {
    $("#cnf_pw,#new_pw").addClass("redfoucusclass"), $("#cnf_pw,#new_pw").val(""), alert("Your password must contain at-least one special character, number, lowercase and uppercase alphabets with minimum password length as 8!!!")
}



function pinfo_display() {
    $.get(oneidnet_url + "basicinfo/personal_info/", function(e) {
        url_redirection(e), $("#personal_info").html(e)
    })
}

function pw_chng_form() {
    $.get(oneidnet_url + "basicinfo/pw_chng_form/", function(e) {
        url_redirection(e), $("#pwchsec").html(e)
    })
}

function system_settings() {
    $.get(oneidnet_url + "basicinfo/system_settings/", function(e) {
        url_redirection(e), $("#system_settings").html(e)
    })
}

function udl() {
    $.get(oneidnet_url + "home/getUserDetails", function(e) {
        var t = jQuery.parseJSON(e);
        $("#bppic").attr("src", t[0])
    })
}

function imagepopup_reset() {
    document.getElementById("profile_image").reset(), $("#image_crop_pp").fadeOut(), $("#crp").html(""), udl(), binfo_udtls()
}

function url_redirection(e) {
    return "CLOGOUT" == $.trim(e) ? (window.location = oneidnet_url, !1) : void 0
}
var oneidnet_url = oneidnet_url;
$(document).on("click", "#pdupdate", function() {
    $.get(oneidnet_url + "basicinfo/personal_info_update/", {
        pdlts: $("#pdlts").val()
    }, function(e) {
        url_redirection(e), $("#personal_info").html(e)
    })
}), $(document).on("click", "#pd_upd_cnl", function() {
    pinfo_display()
}), $(document).on("click", "#pd_upd_db", function() {
document.getElementById("pd_upd_db").disabled=true;
    var e = $.trim($("#firstname").val()),
        t = $.trim($("#middlename").val()),
        n = $.trim($("#lastname").val()),
        i = $.trim($("#mbno").val()),
        date=$.trim($("#date").val()),
        month=$.trim($("#month").val()),
        year=$.trim($("#year").val()),
        o = $.trim($("#existingemail").val()),
        s = $("input[name=gender]:checked").val(),
        l = "firstname=" + e + "&middlename=" + t + "&lastname=" + n + "&mbno=" + i + "&gender=" + s + "&existingemail=" + o+"&dob="+year+"-"+month+"-"+date,
        r = !0;

if(date=="" || date.length==0){
    $("#dbe").html("Select Date"), r = !1;
}else{
        $("#dbe").html("");
}
if(month=="" || month.length==0){
    $("#dbe").html("Select Month"), r = !1;
}else{
        $("#dbe").html("");
}
if(year=="" || year.length==0){
    $("#dbe").html("Select year"), r = !1;
}else{
        $("#dbe").html("");
}
 
    if (0 == is_Valid_Email(o))
    {
        $("#emailer").html("Invalid Email"), r = !1;
    } else {
        $("#emailer").html("");
    }

    if (1 != /^[a-zA-Z()]+$/.test(e) || 0 == e.length) {
        $("#fne").html("Alfabets Only"), r = !1;
    } else {
        $("#fne").html("")
    }

    if (0 != t.length && (1 != /^[a-zA-Z()]+$/.test(t))) {
        $("#mne").html("Alfabets Only"), r = !1;
    } else {
        $("#mne").html("");
    }

    if (1 != /^[a-zA-Z()]+$/.test(n) || 0 == n.length) {
        $("#lne").html("Alfabets Only"), r = !1
    } else {
        $("#lne").html("")
    }
        
if(i.length < 9 || i%1!=0){
    $("#mobne").html("Invalid phone number"), r = !1;
}else{
    $("#mobne").html("")
}
if(r!=false){
$.ajax({
        type: "post",
        url: oneidnet_url + "basicinfo/personal_db_update/",
        data: l,
        success: function(e) {
            document.getElementById("pd_upd_db").disabled=false;
            url_redirection(e), 1 == e ? pinfo_display() : alert(e)
        }
    });    
}else{
    document.getElementById("pd_upd_db").disabled=false;

}


}), pinfo_display(), pw_chng_form(), $(document).on("click", "#pw_cng_sbt", function() {
    var e = $.trim($("#crnt_pw").val()),
        t = $.trim($("#new_pw").val()),
        n = $.trim($("#cnf_pw").val()),
        i = !0;
    if (0 == e.length ? ($("#cpe").html("Current password should not be empty"), i = !1) : $("#cpe").html(""), 0 == t.length ? ($("#npe").html("New password password should not be empty"), i = !1) : $("#npe").html(""), 0 == n.length ? ($("#cnfpe").html("Confirm password should not be empty"), i = !1) : $("#cnfpe").html(""), 0 != t.length && 0 != n.length && n != t && ($("#npe").html("New password password and Confirm password should be match"), $("#cnfpe").html("New password password and Confirm password should be match"), i = !1), 0 == i) return !1;
    var a = "crnt_pw=" + e + "&new_pw=" + t + "&cnf_pw=" + n;
    if(passwordcheck()==false){ return false; }
    
    
    $.ajax({
        type: "post",
        url: oneidnet_url + "basicinfo/password_change/",
        data: a,
        success: function(e) {
            url_redirection(e), 1 == $.trim(e) ? (document.getElementById("cng_pw_form").reset(), alert("Password successfully Updated")) : (document.getElementById("cng_pw_form").reset(), $("#cpe").html(e), $("#npe").html(""), $("#cnfpe").html(""))
        },
        beforeSend: function() {
            document.getElementById("pw_cng_sbt").disabled = !0, $("#pwcngsbtprgrss").append('<img src="' + oneidnet_url + 'assets/Images/upLoader.gif">')
        },
        complete: function() {
            document.getElementById("pw_cng_sbt").disabled = !1, $("#pwcngsbtprgrss").find("img").remove()
        },
        error: function() {
            $("#pwcngsbtprgrss").find("img").remove(), alert("try after sometime")
        }
    })
}), system_settings(), $(document).on("click", "#sys_stg_sub_cnl", function() {
    system_settings()
}), $(document).on("click", "#sys_stg_sub", function() {
    var e = $.trim($("#system_language").val()),
        t = $.trim($("#tz").val()),
        n = $.trim($("#country").val()),
        i = $.trim($("#state").val()),
        a = $.trim($("#city").val()),
        o = "system_language=" + e + "&tz=" + t + "&country=" + n + "&state=" + i + "&city=" + a;
    $.ajax({
        type: "post",
        url: oneidnet_url + "basicinfo/system_settings_update_data/",
        data: o,
        success: function(e) {
            url_redirection(e), 1 == e && system_settings()
        }
    })
}), $(document).on("click", "#sys_set_update", function() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "basicinfo/system_settings_update/",
        success: function(e) {
            url_redirection(e), $("#system_settings").html(e)
        }
    })
}), $(document).on("click", "#theam_appy", function() {
    if (document.getElementById("theam_appy").disabled = !0, 1 == $("*").hasClass("activetheme")) {
        var e = $.trim($(".activetheme").attr("tname"));
        $("#tprogress").append('<img src="' + oneidnet_url + 'assets/Images/upLoader.gif">'), $.get(oneidnet_url + "basicinfo/change_theme/", {
            tm: e
        }, function(e) {
            url_redirection(e), 1 == e && setTimeout(function() {
                $("#tprogress").find("img").remove(), document.getElementById("theam_appy").disabled = !1
            }, 2e3)
        })
    }
}), $(document).on("click", ".theme_one", function() {
    $("*").removeClass("activetheme");
    var e = $(this).find("img");
    e.addClass("activetheme")
}), udl(), $(document).on("submit", "#cropimage_sub", function() {

    var e = $(".left_imagediv").find("img").attr("src"),
        t = $("#acpt_ratio").val();
    if (t) var n = "temp_name=" + $("#temp_name").val() + "&x=" + $("#x").val() + "&y=" + $("#y").val() + "&w=" + $("#w").val() + "&h=" + $("#h").val() + "&acpt_ratio=" + t + "&currentpp=" + e;
    else var n = "temp_name=" + $("#temp_name").val() + "&x=" + $("#x").val() + "&y=" + $("#y").val() + "&w=" + $("#w").val() + "&h=" + $("#h").val() + "&currentpp=" + e;

    return $.ajax({
        type: "post",
        url: oneidnet_url + "basicinfo/cropimg/",
        data: n,
        success: function(e) {
            url_redirection(e), imagepopup_reset()
        }
    }), !1
}), $(document).on("click", "#crp_pop_cnl", function() {
    imagepopup_reset()
}), $('input[type="file"]#profile_image_path').bind("change", function(e) {
    e.preventDefault();
    var t = e.originalEvent.target.files,
        n = (t[0].name, t[0].size),
        i = t[0].type;
    512e3 >= n && ("image/gif" == i || "image/jpg" == i || "image/png" == i || "image/jpeg" == i) ? $("#profile_image").submit() : n > 512e3 ? alert("Allow file size should be below 500kb") : alert("Allow file type should be jpg|png|gif|jpeg")
}), $("#profile_image").submit(function() {
    return $.ajax({
        type: "POST",
        url: oneidnet_url + "home/basic_profile_image_update",
        data: new FormData(this),
        processData: !1,
        contentType: !1,
        success: function(e) {
            url_redirection(e), $.get(oneidnet_url + "basicinfo/crop_here/" + $.trim(e), function(e) {
                $("#crp").html(e)
            })
        }
    }), !1
}), $(document).on("click", ".left_imagediv", function() {
    $("#image_crop_pp").fadeIn()
}), $(document).on("change", "#country", function() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "basicinfo/state_details/",
        data: {
            country_id: $(this).val()
        },
        success: function(e) {
            $("#state").html(e), $("#city").html("<option value=''>--Select--</option>")
        }
    })
}), $(document).on("change", "#state", function() {
    $.ajax({
        type: "post",
        url: oneidnet_url + "basicinfo/city_details/",
        data: {
            state_id: $(this).val()
        },
        success: function(e) {
            $("#city").html(e)
        }
    })
});

