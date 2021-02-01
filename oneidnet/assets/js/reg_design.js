var oneidnet_url = oneidnet_url,
    mainimg = oneidnet_url + "assets/Images/free-blue-hd-wallpaper-backgrounds-3D.jpg";
$(document).ready(function() {
    $(".reg_rightSectionOptions ul li i.img").hover(function() {
        $(this).next().animate({
            width: "75%",
            padding: "3px 7px",
        }, 150)
    }, function() {
        $(this).next().animate({
            width: "0",
            padding: "0"
        }, 150)
    }), $(".module").hover(function() {
		
        var e = $(this).attr("id");
		var anotherimage = oneidnet_url + "assets/Images/" + e + "BG.jpg" ;
        $("." + e).fadeOut(200), $("." + e + "h").fadeIn(200), 
		$('#bg_img').css("background-image", 'url(' + anotherimage + ')'),
		//$("#bg_img").attr("src", anotherimage), 
		
		$("#" + e + "head").css({
            display: "block"
        })
},
function() {
        var e = $(this).attr("id");
        $("." + e).fadeIn(200), $("." + e + "h").fadeOut(200),
		$('#bg_img').css("background-image", 'url(' + mainimg + ')'),
		//bg_img$("#bg_img").attr("src", mainimg), 
		
		$("#" + e + "head").css({
            display: "none"
        })
    })
}), 

$(document).ready(function() {
    $(".reg_signUpFormHeader").click(function() {
        $("#regdes_signUpForm").show(), "125px" == $(".reg_signUpForm").css("height") && ($(".reg_signUpForm").animate({
            height: "424px",
            top: "45%",
        }), $(".reg_background").animate({
            opacity: 0
        }), $(".reg_signInForm").animate({
            width: "230px",
            top: '10%',
            left: "104%",
        }), $(".reg_signUpText").hide(), setTimeout(function() {
			//$(".signUpFormWrapper").css('display','block');
            $(".signUpFormWrapper").animate({
                height: "424px",
            }), $(".regdes_firstName").show(), $(".regdes_lastName").show(), $(".regdes_middleName").show(), $(".regdes_userName").show(), $(".regdes_pwd").show(), $(".regdes_cPwd").show(), $(".regdes_date").show(), $(".regdes_nation").show(), $(".regdes_gender").show(), $(".regdes_altEmail").show(), $(".regdes_mobileNumberCuntryCode").show(), $(".regdes_mobileNumber").show(), $(".regdes_oneIdNet").show(), $("#regdes_cont_btn").show()
        }, 500))
    }), $(".reg_signUpFormHeader").click(function() {
        "424px" == $.trim($("#regdes_signup_form").css("height")) && ($(".reg_signUpForm").animate({
            height: "125px",
            top: "61%",
        }), $(".reg_background").animate({
            opacity: 1
        }), $(".reg_signInForm").animate({
            width: "300px",
            top: "34%",
            left: "50%",
        }, function() {
            $("#regdes_signUpForm").hide(), $(".reg_signUpText").show()
        }))
    })
}), setTimeout(function() {
    $("#mail").css({
        display: "block"
    }).animate({
        marginTop: "265px",
        marginLeft: "10px"
    })
}, 300), setTimeout(function() {
    $("#click").css({
        display: "block"
    }).animate({
        marginTop: "180px",
        marginLeft: "20px"
    })
}, 600), setTimeout(function() {
    $("#buzzin").css({
        display: "block"
    }).animate({
        marginTop: "90px",
        marginLeft: "70px"
    })
}, 900), setTimeout(function() {
    $("#tunnel").css({
        display: "block"
    }).animate({
        marginTop: "30px",
        marginLeft: "150px"
    })
}, 1200), setTimeout(function() {
    $("#vcom").css({
        display: "block"
    }).animate({
        marginTop: "0px",
        marginLeft: "240px"
    })
}, 1500), setTimeout(function() {
    $("#oneshop").css({
        display: "block"
    }).animate({
        marginTop: "0px",
        marginLeft: "340px"
    })
}, 1800), setTimeout(function() {
    $("#netpro").css({
        display: "block"
    }).animate({
        marginTop: "30px",
        marginLeft: "440px"
    })
}, 2100), setTimeout(function() {
    $("#cooffice").css({
        display: "block"
    }).animate({
        marginTop: "90px",
        marginLeft: "520px"
    })
}, 2400), setTimeout(function() {
    $("#cvbank").css({
        display: "block"
    }).animate({
        marginTop: "180px",
        marginLeft: "570px"
    })
}, 2700), setTimeout(function() {
    $("#traveltime").css({
        display: "block"
    }).animate({
        marginTop: "265px",
        marginLeft: "580px"
    })
}, 3100), setTimeout(function() {
    $("#oneidship").css({
        display: "block"
    }).animate({
        marginTop: "350px",
        marginLeft: "570px"
    })
}, 3400), setTimeout(function() {
    $("#findit").css({
        display: "block"
    }).animate({
        marginTop: "440px",
        marginLeft: "520px"
    })
}, 3700), setTimeout(function() {
    $("#isnews").css({
        display: "block"
    }).animate({
        marginTop: "500px",
        marginLeft: "440px"
    })
}, 4100), setTimeout(function() {
    $("#onevision").css({
        display: "block"
    }).animate({
        marginTop: "540px",
        marginLeft: "340px"
    })
}, 4400), setTimeout(function() {
    $("#dealerx").css({
        display: "block"
    }).animate({
        marginTop: "540px",
        marginLeft: "240px"
    })
}, 4700), setTimeout(function() {
    $("#onenetwork").css({
        display: "block"
    }).animate({
        marginTop: "500px",
        marginLeft: "150px"
    })
}, 5100), $(document).ready(function() {
    $(".reg_loaderWrapper").animate({
        transform: "rotate(360deg)"
    }), $(".recoveryPasswordBtn").click(function() {
        $(".reg_signInForm").fadeOut(), $(".reg_signUpForm").fadeOut(), $("#regdes_signup_form").fadeOut(), $("#reg_recoveryForm").fadeIn(), $(".reg_background").animate({
            opacity: 1
        })
    }), $(".recoveryusernameBtn").click(function() {
        $(".reg_signInForm").fadeOut(), $(".reg_signUpForm").fadeOut(), $("#regdes_signup_form").fadeOut(), $("#reg_usernamerecoveryForm").fadeIn(), $(".reg_background").animate({
            opacity: 1
        })
    }), $(".CancelBtn").click(function() {
        $(".reg_recoveryForm").fadeOut(), $(".reg_OTPForm").fadeOut(), $(".reg_signInForm").fadeIn(), $("#regdes_signup_form").fadeIn()
    })
});
