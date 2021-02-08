function is_Empty(s) {
    return s.length < 1 ? !1 : !0
}

function check(s) {
    if(s.checked){
        return 1
    } 
    else
    {
        return 0
    }
    
}

function isValid_Email(s) {
    var e = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z-]+(\.[a-z-]+)*(\.[a-z]{2,4})$/,
        o = !1;
    return s.match(e) && (o = !0), o
}

function isJson(s) {
    s = "string" != typeof s ? JSON.stringify(s) : s;
    try {
        s = JSON.parse(s)
    } catch (e) {
        return !1
    }
    return "object" == typeof s && null !== s ? !0 : !1
}

function error_data(s) {
    var e = jQuery.parseJSON(s);
    return $.each(e, function(s, e) {
        $("#" + s).addClass("redfoucusclass")
    }), !1
}
$("#store_reg_form").submit(function() {
    var s = 0,
    rn = $("#osdev_register_number").val(),
    ci = $("#osdev_Country_of_issue").val(),
    si = $("#osdev_State_of_issue").val(),
    cci = $("#osdev_City_of_issue").val(),
    red = $("#osdev_registration_expiration_date").val(),

        e = $("#osdev_store_name").val(),
        o = $("#osdev_Country").val(),
        y = $("#osdev_Category").val(),
        r = $("#osdev_State").val(),
        a = $("#osdev_City").val(),

        d = $("#osdev_Zipcode").val(),
        c = $("#osdev_store_address").val(),
        t = $("#osdev_PackageType").val(),
        l = $("#Currency").val(),
        m = document.getElementById("osdev_Terms"),

        _ = $("#osdev_PackagePeriod").val();
        // alert(/^(?=.*\d.*)[A-Za-z0-9]{3,10}$/.test(d) + " zipcode");
//edited by mitesh -> regex change for store name & zipcode;
    return $("#store_reg_form p[id$='_error']").css("display", "none"), $("#store_reg_form div[id$='_error']").css("display", "none"), 
    1 != is_Empty(e) ? ($("#osdev_store_name").addClass("redfoucusclass"), $("#osdev_store_name_error").css("display", "block"), s = 10) : 0 == /^[ A-Za-z0-9_@./#&+-]*/.test(e) ? ($("#osdev_store_name").addClass("redfoucusclass"), $("#osdev_store_name_error").css("display", "block").text("Store name should not contain special charaters"), s = 10) : ($("#osdev_store_name").removeClass("redfoucusclass"), $("#osdev_store_name_error").css("display", "none")), 0 == c.length ? ($("#osdev_store_address").addClass("redfoucusclass"), $("#osdev_store_address_error").css("display", "block"), s = 10) : ($("#osdev_store_address").removeClass("redfoucusclass"), $("#osdev_store_address_error").css("display", "none")), 
    1 != is_Empty(y) ? ($("#osdev_Category").addClass("redfoucusclass"), $("#osdev_Category_error").css("display", "block"), s = 10) : ($("#osdev_Category").removeClass("redfoucusclass"), $("#osdev_Category_error").css("display", "none")), 1 != check(m) ? ($("#osdev_Terms").addClass("redfoucusclass"), $("#osdev_term_error").css("display", "block"), s = 10) : ($("#osdev_Terms").removeClass("redfoucusclass"), $("#osdev_term_error").css("display", "none")), 
    1 != is_Empty(r) ? ($("#osdev_State").addClass("redfoucusclass"), $("#osdev_State_error").css("display", "block"), s = 10) : ($("#osdev_State").removeClass("redfoucusclass"), $("#osdev_State_error").css("display", "none")), 
    1 != is_Empty(a) ? ($("#osdev_City").addClass("redfoucusclass"), $("#osdev_City_error").css("display", "block"), s = 10) : ($("#osdev_City").removeClass("redfoucusclass"), $("#osdev_City_error").css("display", "none")), 
    1 != is_Empty(d) ? ($("#osdev_Zipcode").addClass("redfoucusclass"), $("#osdev_Zipcode_error").css("display", "block"), s = 10) : 0 == /^(?=.*\d.*)[A-Za-z0-9]{3,10}$/.test(d) ? ($("#osdev_Zipcode").addClass("redfoucusclass"), $("#osdev_Zipcode_error").css("display", "block").html("Please enter valid Zipcode"), s = 10) : d.length < 3 ? ($("#osdev_Zipcode").addClass("redfoucusclass"), $("#osdev_Zipcode_error").css("display", "block").html("Please enter the Zipcode which should not be less than 5 digits"), s = 10) : d.length > 10 ? ($("#osdev_Zipcode").addClass("redfoucusclass"), $("#osdev_Zipcode_error").css("display", "block").html("Please enter the Zipcode which should not exceed 5 digits"), s = 10) : ($("#osdev_Zipcode").removeClass("redfoucusclass"), $("#osdev_Zipcode_error").css("display", "none")), 
    1 != is_Empty(l) ? ($("#Currency").addClass("redfoucusclass"), $("#Curency_error").css("display", "block"), s = 10) : ($("#Currency").removeClass("redfoucusclass"), $("#Curency_error").css("display", "none")), 
    1 != is_Empty(t) ? ($("#osdev_PackageType").addClass("redfoucusclass"), s = 10) : $("#osdev_PackageType").removeClass("redfoucusclass"), 
    1 != is_Empty(rn) ? ($("#osdev_register_number").addClass("redfoucusclass"), $("#osdev_register_number_error").css("display", "block"), s = 10) : ($("#osdev_register_number").removeClass("redfoucusclass"), $("#osdev_register_number_error").css("display", "none")),
    1 != is_Empty(o) ? ($("#osdev_Country").addClass("redfoucusclass"), $("#osdev_Country_error").css("display", "block"), s = 10) : ($("#osdev_Country").removeClass("redfoucusclass"), $("#osdev_Country_error").css("display", "none")), 
    1 != is_Empty(ci) ? ($("#osdev_Country_of_issue").addClass("redfoucusclass"), $("#osdev_Country_of_issue_error").css("display", "block"), s = 10) : ($("#osdev_Country_of_issue").removeClass("redfoucusclass"), $("#osdev_Country_of_issue_error").css("display", "none")),
    1 != is_Empty(si) ? ($("#osdev_State_of_issue").addClass("redfoucusclass"), $("#osdev_State_of_issue_error").css("display", "block"), s = 10) : ($("#osdev_State_of_issue").removeClass("redfoucusclass"), $("#osdev_State_of_issue_error").css("display", "none")),
    1 != is_Empty(cci) ? ($("#osdev_City_of_issue").addClass("redfoucusclass"), $("#osdev_City_of_issue_error").css("display", "block"), s = 10) : ($("#osdev_City_of_issue").removeClass("redfoucusclass"), $("#osdev_City_of_issue_error").css("display", "none")),
    1 != is_Empty(red) ? ($("#osdev_registration_expiration_date").addClass("redfoucusclass"), $("#osdev_registration_expiration_date_error").css("display", "block"), s = 10) : ($("#osdev_registration_expiration_date").removeClass("redfoucusclass"), $("#osdev_registration_expiration_date_error").css("display", "none")),
    1 != is_Empty(_) ? ($("#osdev_PackagePeriod").addClass("redfoucusclass"), $("#osdev_PackagePeriod_error").css("display", "block"), s = 10) : ($("#osdev_PackagePeriod").removeClass("redfoucusclass"), $("#osdev_PackagePeriod_error").css("display", "none")), 10 == s ? !1 : (callFormAJAX(oneshop_url + "/stores/stores_creation", new FormData(this), function(s) {
        if ($("#store_reg_form .np_des_addaccess_btn").prop("disabled", !1), 1 == isJson(s)) error_data(s);
        else {
            if ($("#progress_div").css("display", "none"), "already_created" == $.trim(s)) return alert("Store Name is not available, Please choose some other name."), !1;
            var e = $.trim(s);
            location.replace(oneshop_url + "/store_home/" + e)
        }
    }, function() {
        $("#store_reg_form .np_des_addaccess_btn").prop("disabled", !0), $("#progress_div").css("display", "block")
    }), !1)
}), $("#edit_store_form").submit(function() {
    var s = $.trim($("#baseurl").val()),
        e = $.trim($("#store_code").val()),
        o = $.trim($("#enquiry_number").val()),
        r = $.trim($("#delivery_mode").val());
    if ("" != o) {
        if (1 != is_Empty(o) || o % 1 != 0 || o.length < 8) return $("#enquiry_number").addClass("redfoucusclass"), !1;
        $("#enquiry_number").removeClass("redfoucusclass")
    }
    return 
    1 != is_Empty(r) ? ($("#delivery_mode").addClass("redfoucusclass"), !1) : ($("#delivery_mode").removeClass("redfoucusclass"), $("#right_services option").prop("selected", !0), $.ajax({
        type: "POST",
        url: oneshop_url + "/stores/stores_updation",
        data: new FormData(this),
        processData: !1,
        contentType: !1,
        success: function(o) {
            "Updated Successfully" == $.trim(o) && location.replace(s + "edit_store/" + e + "/1")
        }
    }), !1)
}), $(document).ready(function() {
    $(document).on("change", "#osdev_PackageType", function() {
        var s = $(this).val();
        $("#package_type_selected").val(s)
    })
});
