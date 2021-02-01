function isEmpty(e) {
    return 0 === e.length ? !1 : !0
}

function passwordcheck() {
    var e = $("#regdes_password").val(),
        s = $("#regdes_conpassword").val();
    if (8 > s.length || e != s) passworderror();
    else if (e == s) {
        var r = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");
        0 == r.test(e) && passworderror()
    }
}

function passworderror() {
    $("#regdes_conpassword,#regdes_password").addClass("redfoucusclass"), $("#regdes_password,#regdes_conpassword").val(""), alert("Your password must contain at-least one special character, number, lowercase and uppercase alphabets with minimum password length as 8!!!")
}

function is_Valid_Email(e) {
    var s = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
        r = !1;
    return s.test(e) && (r = !0), r
}

function is_AplhabeticSeriesOnly(e) {
    var s = /^[A-Za-z.-]+(\s*[A-Za-z.-]+)*$/i,
        r = !1;
    return s.test(e) && (r = !0), r
}

function is_Alpha_Neumeric_Dot_Only(e) {
    var s = /^[a-z][a-z0-9\.]*$/i,
        r = !1;
    return s.test(e) && (r = !0), r
}

function is_Valid_Mobile_Number(e) {
    var s = /^[0-9-+]+$/,
        r = !1;
    return s.test(e) && (r = !0), r
}

function fun_Remove(e) {
    $(".forgot_error").html(""), $(".login_error").html("");
    var s = e;
    $("#" + s).removeClass("redfoucusclass")
}

function fun_Removeradio() {
    $("#regdes_female").removeClass("redfoucusclass"), $("#regdes_male").removeClass("redfoucusclass")
}

function comparePassword(e, s) {
    return e === s ? !0 : !1
}
var flag = !0;
$(function() {
    function e() {
        location.replace(oneidnet_url)
    }
    $("#logindev_submit").click(function() {
        flag = !0;
        var e = $("#logindev_username").val(),
            s = $("#logindev_password").val(),
            r = e.slice(0, 1);
        return 0 == e.length ? (flag = !1, $("#logindev_username").addClass("redfoucusclass")) : isNaN(r) ? is_Alpha_Neumeric_Dot_Only(e) || (flag = !1, $("#logindev_username").addClass("redfoucusclass")) : (flag = !1, $("#logindev_username").addClass("redfoucusclass")), 0 == s.length && (flag = !1, $("#logindev_password").addClass("redfoucusclass")), 0 == flag ? !1 : ($.ajax({
            type: "post",
            url: oneidnet_url + "index.php/login/doLogin/",
            data: {
                logindev_username: e,
                logindev_password: s
            },
            beforeSend: function() {
                //$(".login_error").html('<span class="loading_bar"><img src="' + oneidnet_url + 'assets/Images/loading_bar.gif" width="100px"></span>');
				$(".loginbutton").addClass('disabled in-progress');
				$(".loginbutton").attr('disabled','disabled');
            },
            success: function(e) {			
				
					if("OIN9" === $.trim(e)){
						location.reload()
						}else if($.trim(e)==="BLCK7"){
							location.href=oneidnet_url+"home/block";
							}else{
							$(".login_error").html(e)  ;
							$(".loginbutton").removeClass('disabled in-progress');
							$(".loginbutton").removeAttr('disabled',' ');
							}
                 
            },
            complete: function() {
                $(this).attr("id", "logindev_submit")
            },
            error: function() {
                alert("error");

            }
        }), !1)
    }), $(document).on("click", "#forgotdevuser_cancle", function() {
        $("#forgotdevuser_mobileno").val("")
    }), $("#forgotdevuser_submit").click(function() {
        var s = $.trim($("#forgotdevuser_mobileno").val());
        return 0 == s.length || 1 != is_Valid_Email(s) ? $("#forgotdevuser_mobileno").addClass("redfoucusclass") : $.ajax({
            type: "post",
            url: oneidnet_url + "index.php/login/forgotUsercheck/",
            data: {
                existingemail: s
            },
            beforeSend: function() {
                document.getElementById("forgotdevuser_submit").disabled = !0, 
				//$(".forgotuser_error").html('<img src="' + oneidnet_url + 'assets/Images/loading_bar.gif" width="100px">');
				$(".recoveryusername").addClass("diasbled in-progress");
				$(".recoveryusername").attr("disabled","diasbled");
            },
            success: function(s) {
                $(".forgotuser_error").html(""),$(".recoveryusername").removeClass("diasbled in-progress"),
				$(".recoveryusername").removeAttr("disabled"," "), "ON9" == $.trim(s) ? ($("#forgotdevuser_mobileno").val(""), alert("Your Username for the System is sent to your Alternate Email Address!"), setTimeout(e, 2500)) : (document.getElementById("forgotdevuser_submit").disabled = !1, $(".forgotuser_error").html(s))
            },
            error: function() {
                alert("Something Went Wrong! Please Try Again!!!"), $(".forgotuser_error").html("")
            }
        }), !1
    }), $(document).on("click", "#pwrsetcnl", function() {
        $("#forgotdev_mobileno").val("")
    }), $("#forgotdev_submit").click(function() {
        var s = $.trim($("#forgotdev_mobileno").val());
        return 0 == s.length ? $("#forgotdev_mobileno").addClass("redfoucusclass") : $.ajax({
            type: "post",
            url: oneidnet_url + "index.php/login/forgot_mobilecheck/",
            data: {
                existingemail: s
            },
            beforeSend: function() {
              //  $(".forgot_error").html('<img src="' + oneidnet_url + 'assets/Images/loading_bar.gif" width="100px">');
				$(".recoverypasswordbtn").addClass("diasbled in-progress");
				$(".recoverypasswordbtn").attr("disabled","diasbled");
            },
            success: function(s) {
                $(".forgot_error").html("");
				$(".recoverypasswordbtn").removeClass("diasbled in-progress");
				$(".recoverypasswordbtn").removeAttr("disabled"," ");
                var r = $.parseJSON(s);
                1 == r.status ? ($(".forgotWaiting").html(""), $("#forgotdev_phoneno").val(mobilenumber), alert(r.message)) : (alert(r.message), setTimeout(e, 2500))
            },
            error: function() {
                $(".forgot_error").html(""),$(".recoverypasswordbtn").removeClass("diasbled in-progress"),
				$(".recoverypasswordbtn").removeAttr("disabled"," "), alert("Something Went Wrong! Please Try Again!!!")
            }
        }), !1
    }), $("#forgotdev_otpsubmit").click(function() {
        var e = !0,
            s = $("#forgotdev_phoneno").val(),
            r = $("#forgotdev_otp").val(),
            o = $("#forgotdev_password").val(),
            a = $("#forgotdev_conpassword").val();
        return 0 == r.length && (e = !1, $("#forgotdev_otp").addClass("redfoucusclass")), 0 == o.length && (e = !1, $("#forgotdev_password").addClass("redfoucusclass")), 0 == a.length && (e = !1, $("#forgotdev_conpassword").addClass("redfoucusclass")), 1 != e ? !1 : (comparePassword(o, a) ? $.ajax({
            type: "post",
            url: oneidnet_url + "index.php/login/otp_check/",
            data: {
                forgotdev_phoneno: s,
                forgotdev_otp: r,
                forgotdev_password: o,
                forgotdev_conpassword: a
            },
            beforeSend: function() {
                $(".otp_error").html('<img src="' + oneidnet_url + 'assets/Images/loading_bar.gif" width="100px">')
            },
            success: function(e) {
                if (1 == e) {
                    $(".otp_error").html(""), $("#forgotdev_otp").val(""), $("#forgotdev_password").val(""), $("#forgotdev_conpassword").val("");
                    var s = '<a href="' + oneidnet_url + '">Click here to login</a>';
                    $(".otp_sucess").html("Your password updated " + s)
                } else $(".otp_error").html(e)
            }
        }) : $("#forgotdev_conpassword").addClass("redfoucusclass"), !1)
    }), $("#regdes_cont_btn").click(function() {
        $("*").removeClass("redfoucusclass"), passwordcheck();
        var e, s = $("#regdes_captcha").attr("placeholder").replace("=", "").split("+"),
            r = parseInt(s[0]),
            o = parseInt(s[1]),
            a =$.trim($("#regdes_firstname").val()),
            t =$.trim($("#regdes_lastname").val()),
            l =$.trim($("#regdes_username").val()),
            n = l.slice(0, 1),
            i = $.trim($("#regdes_password").val()),
            c = $.trim($("#regdes_conpassword").val()),
            country = $.trim($("#regdes_month").val()),
            h =$.trim($("#regdes_captcha").val()),
            b = $.trim($("#regdes_existemail").val());
    
     
    if(is_AplhabeticSeriesOnly(a)==false){
        e=false;
        $("#regdes_firstname").addClass("redfoucusclass");
    }
    
    
    if(is_AplhabeticSeriesOnly(t)==false){
        e=false;
        $("#regdes_lastname").addClass("redfoucusclass");
    }
    
    if(country==""){
        e=false;
        $("#regdes_month").addClass("redfoucusclass");
    }
        if (0 == is_Valid_Email(b) && ($("#regdes_existemail").addClass("redfoucusclass"),
        e = !1), 0 == h.length) e = !1, $("#regdes_captcha").addClass("redfoucusclass");
        else {
            var y = r + o;
            h != y && (e = !1, $("#regdes_captcha").addClass("redfoucusclass"))
        }
        if($("#regdes_termsconditions").is(":checked")==false){
            e=false;
            $("#regdes_termsconditions").addClass("redfoucusclass");
        }
        
            
        if (e == false) {
            return false;
        } else {
            C = "regdev_firstname=" + $("#regdes_firstname").val() +
                    "&regdev_lastname=" + $("#regdes_lastname").val() +
                    "&regdev_username=" + $("#regdes_username").val() +
                    "&regdev_password=" + $("#regdes_password").val() +
                    "&regdev_conpassword=" + $("#regdes_conpassword").val() + 
                    "&regdev_country=" +country + 
                    "&regdev_existemail=" + $("#regdes_existemail").val();
            $.ajax({
                type: "post",
                url: oneidnet_url + "index.php/registration/doRegistration/",
                data: C,
                success: function (e) {
                    data1 = e.replace(/1/g, ""), "ONR9" == $.trim(data1) ? location.reload() : alert(data1)
                },
                beforeSend: function () {
                    $("body").append('<div class="regprogrees" ><div class="loading_wrapper"><h1> Registration in progress...  </h1>  <p> <img src="' + oneidnet_url + 'assets/Images/oneidlogo.png" width="70" height="71" /> </p>            <h2 class="center"> Please do not refresh or close this page until your registration is finished... </h2></div></div>'), document.getElementById("regdes_cont_btn").disabled = !0
                },
                complete: function () {
                    $(".regprogrees").remove(), document.getElementById("regdes_cont_btn").disabled = !1
                }
            });
    return false;        
        }
    return false;
    
        
    })
}), $(document).on("click", "html", function() {
    $("#showdata").hide()
}), $(document).on("click", "#ouv", function() {
    document.getElementById("popup1").style.visibility = "hidden", document.getElementById("popup1").style.opacity = 0, $("#oneidnetvideo").attr("src", "")
}), $(document).on("click", "#ouvd", function() {
    document.getElementById("popup1").style.visibility = "visible", document.getElementById("popup1").style.opacity = 1, $("#oneidnetvideo").attr("src", "https://www.youtube.com/embed/X-wf3iyYhDc")
});
