function checkFirstLetterAlphaOnly(e) {
    var s = /^([a-zA-Z])$/;
    return s.test(e) ? !0 : !1
}

function isAlphaNumWithHyphenUS(e) {
    var s = /^[a-zA-Z0-9 _-]*$/;
    return s.test(e) ? !0 : !1
}

function isJson(e) {
    e = "string" != typeof e ? JSON.stringify(e) : e;
    try {
        e = JSON.parse(e)
    } catch (s) {
        return !1
    }
    return "object" == typeof e && null !== e ? !0 : !1
}

function error_data(e) {
    var s = jQuery.parseJSON(e);
    return $.each(s, function(e, s) {
        $("#" + e).addClass("redfoucusclass")
    }), !1
}

function removeerror(e) {
    $("#" + e).removeClass("redfoucusclass")
}

function is_Empty(e) {
    return e.length < 1 ? !1 : !0
}
$(function() {
    function e(e) {
        return e.length < 1 ? !1 : !0
    }
    $("#osdev_Country").change(function() {
        var e = "country_id=" + $("#osdev_Country").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/state_info",
            data: e,
            beforesend: function() {
                $("#osdev_State").prop("disabled", "disabled"), $("#osdev_City").prop("disabled", "disabled")
            },
            success: function(e) {
                $("#osdev_State").html(e)
            }
        })
    }), $("#osdev_State").change(function() {
        var e = "state_id=" + $("#osdev_State").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/city_info",
            data: e,
            beforesend: function() {
                $("#osdev_City").prop("disabled", "disabled")
            },
            success: function(e) {
                $("#osdev_City").html(e)
            }
        })
    }), $("#dev_billing_os_country").change(function() {
        var e = $(this).val();
        $.ajax({
            type: "post",
            url: oneshop_url + "/home/state_info",
            data: {
                country_id: e
            },
            success: function(e) {
                $("#dev_billing_os_state_list").html(e)
            }
        })
    }), $("#filter_by_status").change(function() {
        var e = $(this).val();
        $.ajax({
            type: "post",
            url: oneshop_url + "/home/purchaseHistory/",
            data: {
                filter_val: e
            },
            success: function(e) {
                $("#purchase_history_div").html(e)
            }
        })
    }), $("#activity_filter_by").change(function() {
        var e = $(this).val();
        $.ajax({
            type: "post",
            data: {
                filter_val: e
            },
            url: oneshop_url + "/home/Useractivity",
            success: function(e) {
                $("#user_activity_div").html(e)
            }
        })
    }), $("#edit_product_info").submit(function(){
        var s = 0,
            a = $("#osdev_Product_Name").val(),
            o = $("#osdev_Group").val(),
            t = $("#osdev_Category").val(),
            c = $("#osdev_SubCategory").val(),
            p = $("#osdev_Shipping").val(),
            g = $("#osdev_Handling").val(),
            d = $("#osdev_warrenty").val(),
            wt = $("#warranty_type").val(),
            i = $("#osdev_Discount").val(),
            l = $("#osdev_CostPrice").val(),
            n = $("#osdev_Quantity").val(),
            _ = $("#osdev_Description").val();
        var ptags=$("#product_tags").val();
        var bulk_price=$("#bulk_price").val();
        var bulk_qty=$("#bulk_quantity").val();
        if (1 != e(a)) $("#osdev_Product_Name").addClass("redfoucusclass"), $("#osdev_Product_NameError").removeClass("jsError"), s = 10;
        else {
            var u = a.charAt(0);
            0 == checkFirstLetterAlphaOnly(u) ? ($("#osdev_Product_Name").addClass("redfoucusclass"), $("#osdev_Product_NameError").removeClass("jsError").text("First letter should not contain number"), s = 10) : 0 == isAlphaNumWithHyphenUS(a) ? ($("#osdev_Product_Name").addClass("redfoucusclass"), $("#osdev_Product_NameError").removeClass("jsError").text("Please enter valid product name"), s = 10) : ($("#osdev_Product_Name").removeClass("redfoucusclass"), $("#osdev_Product_NameError").addClass("jsError"))
        }
        //if (1 != e(o) ? ($("#osdev_Group").addClass("redfoucusclass"), $("#osdev_GroupError").removeClass("jsError"), s = 10) : ($("#osdev_Group").removeClass("redfoucusclass"), $("#osdev_GroupError").addClass("jsError")), 1 != e(t) ? ($("#osdev_Category").addClass("redfoucusclass"), $("#osdev_CategoryError").removeClass("jsError"), s = 10) : ($("#osdev_Category").removeClass("redfoucusclass"), $("#osdev_CategoryError").addClass("jsError")), 1 != e(c) ? ($("#osdev_SubCategory").addClass("redfoucusclass"), $("#osdev_SubCategoryError").removeClass("jsError"), s = 10) : ($("#osdev_SubCategory").removeClass("redfoucusclass"), $("#osdev_SubCategoryError").addClass("jsError")), 1 == e(d))
        if(o===""){
            $("#osdev_Group").addClass("redfoucusclass");
            $("#osdev_GroupError").removeClass("jsError");
            s=10;
        }
        else{
            // if(o!=="others"){
                if(t===""){
                    $("#osdev_Category").addClass("redfoucusclass");
                    $("#osdev_CategoryError").removeClass("jsError");
                    s=10;
                }
                else{
                    $("#osdev_Category").removeClass("redfoucusclass");
                    $("#osdev_CategoryError").addClass("jsError");
                }
                if(c===""){
                    $("#osdev_SubCategory").addClass("redfoucusclass");
                    $("#osdev_SubCategoryError").removeClass("jsError");
                    s=10;
                }
                else{
                    $("#osdev_SubCategory").removeClass("redfoucusclass");
                    $("#osdev_SubCategoryError").addClass("jsError")
                }
            // }
            // else{
            //     if($("#category_txt").val()===""){
            //         $("#category_txt").addClass("redfoucusclass");
            //         $("#osdev_CategoryError").removeClass("jsError");
            //         s=10;
            //     }
            //     else{
            //         $("#category_txt").removeClass("redfoucusclass");
            //         $("#osdev_CategoryError").addClass("jsError");
            //     }
            //     if($("#subcategory_txt").val()===""){
            //         $("#category_txt").addClass("redfoucusclass");
            //         $("#osdev_SubCategoryError").removeClass("jsError");
            //         s=10;
            //     }
            //     else{
            //         $("#category_txt").removeClass("redfoucusclass");
            //         $("#osdev_SubCategoryError").addClass("jsError");
            //     }
            // }
        }
        if(_===""){
            $("#osdev_Description").addClass("redfoucusclass");
            $("#osdev_DescriptionError").removeClass("jsError");
            s=10;
        }
        else{
            $("#osdev_Description").removeClass("redfoucusclass");
            $("#osdev_DescriptionError").addClass("jsError")
        }
            
        if(bulk_price.trim()!=="" && bulk_price.length!==0){
            if(!$.isNumeric(bulk_price)){
                $("#osdev_bulkpriceerror").removeClass("jsError");
                $("#bulk_price").addClass("redfoucusclass");
                s=10;
            }
            else{
                $("#osdev_bulkpriceerror").addClass("jsError");
                $("#bulk_price").removeClass("redfoucusclass");
            }
        }
        if(bulk_qty.trim()!=="" && bulk_qty.length!==0){
            if(!$.isNumeric(bulk_qty)){
                $("#osdev_bulkqtyerror").removeClass("jsError");
                $("#bulk_quantity").addClass("redfoucusclass");
                s=10;
            }
            else{
                $("#osdev_bulkqtyerror").addClass("jsError");
                $("#bulk_quantity").removeClass("redfoucusclass");
            }
        }
            if ($.isNumeric(d)) {
                $("#osdev_warrenty").removeClass("redfoucusclass"), $("#osdev_warrentyError").addClass("jsError");
                var v = parseInt(d);
                0 > v && ($("#osdev_warrenty").addClass("redfoucusclass"), $("#osdev_warrentyError").removeClass("jsError").text("Please enter non-negative value"), s = 10)
            } else $("#osdev_warrenty").addClass("redfoucusclass"), $("#osdev_warrentyError").removeClass("jsError"), s = 10;
            
            if ($.isNumeric(wt)) {
                $("#warranty_type").removeClass("redfoucusclass"), $("#warranty_typeError").addClass("jsError");
                var vwt = parseInt(wt);
                0 > vwt && ($("#warranty_type").addClass("redfoucusclass"), $("#warranty_typeError").removeClass("jsError").text("Please Select proper value"), s = 10)
            } else $("#warranty_type").addClass("redfoucusclass"), $("#warranty_typeError").removeClass("jsError"), s = 10;

        if ("" == i || $.isNumeric(i)) {
            if ($("#osdev_Discount").removeClass("redfoucusclass"), $("#osdev_DiscountError").addClass("jsError"), $.isNumeric(i)) {
                var f = parseInt(i);
                0 > f && ($("#osdev_Discount").addClass("redfoucusclass"), $("#osdev_DiscountError").removeClass("jsError").text("Please enter non-negative value"), s = 10)
            }
        } else $("#osdev_Discount").addClass("redfoucusclass"), $("#osdev_DiscountError").removeClass("jsError"), s = 10;
        if (1 != e(l)) $("#osdev_CostPrice").addClass("redfoucusclass"), $("#osdev_CostPriceError").removeClass("jsError"), s = 10;
        else if ($.isNumeric(l)) {
            var m = parseInt(l);
            0 > m ? ($("#osdev_CostPrice").addClass("redfoucusclass"), $("#osdev_validCostPriceError").removeClass("jsError").text("Please enter non-negative value"), s = 10) : ($("#osdev_CostPrice").removeClass("redfoucusclass"), $("#osdev_validCostPriceError").addClass("jsError"))
        } else $("#osdev_CostPrice").addClass("redfoucusclass"), $("#osdev_validCostPriceError").removeClass("jsError"), s = 10;
        if (1 != e(n)) $("#osdev_Quantity").addClass("redfoucusclass"), $("#osdev_QuantityError").removeClass("jsError"), s = 10;
        else if ($.isNumeric(n)) {
            var h = parseInt(n);
            0 > h ? ($("#osdev_Quantity").addClass("redfoucusclass"), $("#osdev_QuantityError").removeClass("jsError").text("Please enter non numeric value")) : ($("#osdev_Quantity").removeClass("redfoucusclass"), $("#osdev_QuantityError").addClass("jsError"))
        } else $("#osdev_Quantity").addClass("redfoucusclass"), $("#osdev_QuantityError").removeClass("jsError"), s = 10;
        return 1 != e(_) ? ($("#osdev_Description").addClass("redfoucusclass"), $("#osdev_DescriptionError").removeClass("jsError"), s = 10) : ($("#osdev_Description").removeClass("redfoucusclass"), $("#osdev_DescriptionError").addClass("jsError")), 10 == s ? !1 : (callFormAJAX(oneshop_url + "/products/product_updation", new FormData(this), function(e) {
            var s = e.trim(),
                a = s.replace(/#/g, "");
            if ($("#prod_save_btn").prop("disabled", !1), $("#product_add_loading").css("display", "none"), -1 !== a.indexOf("OSPRODINS1")) {
                var r = a.split("~");
                window.location.href = oneshop_url + "/product_detail_view/" + r[1] + "/" + r[2]
            }
            "OSPRODEXISTS" === a && ($("#product_add_suc").css("display", "block").html("Product name exists.Please try with different name..."), $("#product_add_suc").fadeOut(1500)), "OSPRODINS0" === a && $("#product_add_suc").css("display", "block").html("Some problem while adding the product.Please try again.")
        }, function() {
            $("#prod_save_btn").prop("disabled", !0), $("#product_add_loading").css("display", "block")
        }), !1)
    }), $("#add_product").submit(function() {
        var s = 0,
            a = $("#osdev_Product_Name").val(),
            r = $("#osdev_Product_Market_Price").val(),
            o = $("#osdev_Group").val(),
            t = $("#osdev_Category").val(),
            c = $("#osdev_SubCategory").val(),
            p = $("#osdev_Shipping").val(),
            g = $("#osdev_Handling").val(),
            d = $("#osdev_warrenty").val(),
            wt = $("#warranty_type").val(),
            i = $("#osdev_Discount").val(),
            l = $("#osdev_CostPrice").val(),
            n = $("#osdev_Quantity").val(),
            _ = $("#osdev_Description").val();
        var ptags=$("#product_tags").val();
		var bulk_price=$("#bulk_price").val();
        var bulk_qty=$("#bulk_quantity").val();
        if (1 != e(a)) $("#osdev_Product_Name").addClass("redfoucusclass"), $("#osdev_Product_NameError").removeClass("jsError"), s = 10;
        else {
            var u = a.charAt(0);
            0 == checkFirstLetterAlphaOnly(u) ? ($("#osdev_Product_Name").addClass("redfoucusclass"), $("#osdev_Product_NameError").removeClass("jsError").text("First letter should not contain number"), s = 10) : 0 == isAlphaNumWithHyphenUS(a) ? ($("#osdev_Product_Name").addClass("redfoucusclass"), $("#osdev_Product_NameError").removeClass("jsError").text("Please enter valid product name"), s = 10) : ($("#osdev_Product_Name").removeClass("redfoucusclass"), $("#osdev_Product_NameError").addClass("jsError"))
        }
        if (1 != e(r)) $("#osdev_Product_Market_Price").addClass("redfoucusclass"), $("#osdev_Product_Market_PriceError").removeClass("jsError"), s = 10;
        else if ($("#osdev_Product_Market_PriceError").addClass("jsError"), $.isNumeric(r)) {
            $("#osdev_Product_Market_Price").removeClass("redfoucusclass"), $("#osdev_Product_Market_ValidPrice").addClass("jsError");
            var p = parseInt(r);
            0 > p && ($("#osdev_Product_Market_Price").addClass("redfoucusclass"), $("#osdev_Product_Market_ValidPrice").removeClass("jsError").text("Please enter price without negative value"), s = 10)
        } else $("#osdev_Product_Market_Price").addClass("redfoucusclass"), $("#osdev_Product_Market_ValidPrice").removeClass("jsError"), s = 10;
        //if (1 != e(o) ? ($("#osdev_Group").addClass("redfoucusclass"), $("#osdev_GroupError").removeClass("jsError"), s = 10) : ($("#osdev_Group").removeClass("redfoucusclass"), $("#osdev_GroupError").addClass("jsError")), 1 != e(t) ? ($("#osdev_Category").addClass("redfoucusclass"), $("#osdev_CategoryError").removeClass("jsError"), s = 10) : ($("#osdev_Category").removeClass("redfoucusclass"), $("#osdev_CategoryError").addClass("jsError")), 1 != e(c) ? ($("#osdev_SubCategory").addClass("redfoucusclass"), $("#osdev_SubCategoryError").removeClass("jsError"), s = 10) : ($("#osdev_SubCategory").removeClass("redfoucusclass"), $("#osdev_SubCategoryError").addClass("jsError")), 1 == e(d))
        if(o===""){
            $("#osdev_Group").addClass("redfoucusclass");
            $("#osdev_GroupError").removeClass("jsError");
            s=10;
        }
        else{
            // if(o!=="others"){
                if(t===""){
                    $("#osdev_Category").addClass("redfoucusclass");
                    $("#osdev_CategoryError").removeClass("jsError");
                    s=10;
                }
                else{
                    $("#osdev_Category").removeClass("redfoucusclass");
                    $("#osdev_CategoryError").addClass("jsError");
                }
                if(c===""){
                    $("#osdev_SubCategory").addClass("redfoucusclass");
                    $("#osdev_SubCategoryError").removeClass("jsError");
                    s=10;
                }
                else{
                    $("#osdev_SubCategory").removeClass("redfoucusclass");
                    $("#osdev_SubCategoryError").addClass("jsError")
                }
            // }
            // else{
            //     if($("#category_txt").val()===""){
            //         $("#category_txt").addClass("redfoucusclass");
            //         $("#osdev_CategoryError").removeClass("jsError");
            //         s=10;
            //     }
            //     else{
            //         $("#category_txt").removeClass("redfoucusclass");
            //         $("#osdev_CategoryError").addClass("jsError");
            //     }
            //     if($("#subcategory_txt").val()===""){
            //         $("#category_txt").addClass("redfoucusclass");
            //         $("#osdev_SubCategoryError").removeClass("jsError");
            //         s=10;
            //     }
            //     else{
            //         $("#category_txt").removeClass("redfoucusclass");
            //         $("#osdev_SubCategoryError").addClass("jsError");
            //     }
            // }
        }
        if(_===""){
            $("#osdev_Description").addClass("redfoucusclass");
            $("#osdev_DescriptionError").removeClass("jsError");
            s=10;
        }
        else{
            $("#osdev_Description").removeClass("redfoucusclass");
            $("#osdev_DescriptionError").addClass("jsError")
        }
            
		if(bulk_price.trim()!=="" && bulk_price.length!==0){
            if(!$.isNumeric(bulk_price)){
                $("#osdev_bulkpriceerror").removeClass("jsError");
                $("#bulk_price").addClass("redfoucusclass");
                s=10;
            }
            else{
                $("#osdev_bulkpriceerror").addClass("jsError");
                $("#bulk_price").removeClass("redfoucusclass");
            }
        }
        if(bulk_qty.trim()!=="" && bulk_qty.length!==0){
            if(!$.isNumeric(bulk_qty)){
                $("#osdev_bulkqtyerror").removeClass("jsError");
                $("#bulk_quantity").addClass("redfoucusclass");
                s=10;
            }
            else{
                $("#osdev_bulkqtyerror").addClass("jsError");
                $("#bulk_quantity").removeClass("redfoucusclass");
            }
        }
            if ($.isNumeric(d)) {
                $("#osdev_warrenty").removeClass("redfoucusclass"), $("#osdev_warrentyError").addClass("jsError");
                var v = parseInt(d);
                0 > v && ($("#osdev_warrenty").addClass("redfoucusclass"), $("#osdev_warrentyError").removeClass("jsError").text("Please enter non-negative value"), s = 10)
            } else $("#osdev_warrenty").addClass("redfoucusclass"), $("#osdev_warrentyError").removeClass("jsError"), s = 10;
            if ($.isNumeric(wt)) {
                $("#warranty_type").removeClass("redfoucusclass"), $("#warranty_typeError").addClass("jsError");
                var vwt = parseInt(wt);
                0 > vwt && ($("#warranty_type").addClass("redfoucusclass"), $("#warranty_typeError").removeClass("jsError").text("Please Select proper value"), s = 10)
            } else $("#warranty_type").addClass("redfoucusclass"), $("#warranty_typeError").removeClass("jsError"), s = 10;
        if ("" == i || $.isNumeric(i)) {
            if ($("#osdev_Discount").removeClass("redfoucusclass"), $("#osdev_DiscountError").addClass("jsError"), $.isNumeric(i)) {
                var f = parseInt(i);
                0 > f && ($("#osdev_Discount").addClass("redfoucusclass"), $("#osdev_DiscountError").removeClass("jsError").text("Please enter non-negative value"), s = 10)
            }
        } else $("#osdev_Discount").addClass("redfoucusclass"), $("#osdev_DiscountError").removeClass("jsError"), s = 10;
        if (1 != e(l)) $("#osdev_CostPrice").addClass("redfoucusclass"), $("#osdev_CostPriceError").removeClass("jsError"), s = 10;
        else if ($.isNumeric(l)) {
            var m = parseInt(l);
            0 > m ? ($("#osdev_CostPrice").addClass("redfoucusclass"), $("#osdev_validCostPriceError").removeClass("jsError").text("Please enter non-negative value"), s = 10) : ($("#osdev_CostPrice").removeClass("redfoucusclass"), $("#osdev_validCostPriceError").addClass("jsError"))
        } else $("#osdev_CostPrice").addClass("redfoucusclass"), $("#osdev_validCostPriceError").removeClass("jsError"), s = 10;
        if (1 != e(n)) $("#osdev_Quantity").addClass("redfoucusclass"), $("#osdev_QuantityError").removeClass("jsError"), s = 10;
        else if ($.isNumeric(n)) {
            var h = parseInt(n);
            0 > h ? ($("#osdev_Quantity").addClass("redfoucusclass"), $("#osdev_QuantityError").removeClass("jsError").text("Please enter non numeric value")) : ($("#osdev_Quantity").removeClass("redfoucusclass"), $("#osdev_QuantityError").addClass("jsError"))
        } else $("#osdev_Quantity").addClass("redfoucusclass"), $("#osdev_QuantityError").removeClass("jsError"), s = 10;
        return 1 != e(_) ? ($("#osdev_Description").addClass("redfoucusclass"), $("#osdev_DescriptionError").removeClass("jsError"), s = 10) : ($("#osdev_Description").removeClass("redfoucusclass"), $("#osdev_DescriptionError").addClass("jsError")), $("#uploadFile1").val() ? ($("#uploadFile1").removeClass("redfoucusclass"), $("#osdev_imageError").addClass("jsError")) : ($("#uploadFile1").addClass("redfoucusclass"), $("#osdev_imageError").removeClass("jsError"), s = 10), 10 == s ? !1 : (callFormAJAX(oneshop_url + "/products/product_insertion", new FormData(this), function(e) {
            var s = e.trim(),
                a = s.replace(/#/g, "");
            if ($("#prod_save_btn").prop("disabled", !1), $("#product_add_loading").css("display", "none"), -1 !== a.indexOf("OSPRODINS1")) {
                var r = a.split("~");
                window.location.href = oneshop_url + "/product_detail_view/" + r[1] + "/" + r[2]
            }
            "OSPRODEXISTS" === a && ($("#product_add_suc").css("display", "block").html("Product name exists.Please try with different name..."), $("#product_add_suc").fadeOut(1500)), "OSPRODINS0" === a && $("#product_add_suc").css("display", "block").html("Some problem while adding the product.Please try again.")
        }, function() {
            $("#prod_save_btn").prop("disabled", !0), $("#product_add_loading").css("display", "block")
        }), !1)
    }), $('#osdev_Group').change(function() {
        var e = "Group_id=" + $("#osdev_Group").val();
        if($("#osdev_Group").val()==="others")
        {
            $("#category_div").css("display","none");
            $("#category_txt_div").css("display","block");
            $("#subcategory_div").css("display","none");
            $("#subcategory_txt_div").css("display","block");
        }
        else{
            $.ajax({
                type: "POST",
                url: oneshop_url + "/products/catagory_ids",
                data: e,
                success: function(e) {
                    $("#osdev_Category").html(e)
                }
            })
        }        
    }).triggerHandler('change'),
    // $("#osdev_Product_Market_Price").change(function() {
    //     var e = $("#osdev_Product_Market_Price").val();
    //     var a = formatNumber(parseInt(e));
    //     alert(a + "market price");
    //     $("#osdev_Product_Market_Price").val(a)
    // }), 
//Edited by Mitesh => calculate discount based on sale & sale based on discount;
     $("#osdev_CostPrice").change(function() {
        var e = $("#osdev_CostPrice").val();
        var op = $("#osdev_PaidtoYouPer").val();
        e = parseFloat(e);
        // var n = e - s;
        if (varsell = parseFloat(e), 0 != e) var py = e - e * op;
        $("#osdev_PaidtoYou").val(py)
        // $("#osdev_Discount").val(a)
    }),$("#osdev_SellPrice").change(function() {
        var e = $("#osdev_CostPrice").val();
        e = parseFloat(e);
        var op = $("#osdev_PaidtoYouPer").val();
        var s = $("#osdev_SellPrice").val();
        var n = e - s;
        if (varsell = parseFloat(s), 0 != s) var a = n / e * 100;
        if(varsell = parseFloat(s), 0 != s) var py = s - s * op;
        else var py = e - e * op;
        $("#osdev_PaidtoYou").val(py)
        $("#osdev_Discount").val(a)
    }), $("#osdev_Discount").change(function() {
        var e = $("#osdev_CostPrice").val();
        e = parseFloat(e);
        var op = $("#osdev_PaidtoYouPer").val();
        var s = $("#osdev_Discount").val();
        if (vardiscount = parseFloat(s), 0 != s) var a = e - e * s / 100;
        else var a = s;
        $("#osdev_SellPrice").val(a)
        if (varsale = parseFloat(a), 0 != a) var py = a - a * op;
        $("#osdev_PaidtoYou").val(py.toFixed(2))
    }), $(document).on("change", "#store_categ", function() {
        var e = $(this).val();
        if ("Country" == e) $("#city_div").css("display", "none"), $("#sub_filter").css("display", "block"), $.ajax({
            type: "post",
            url: oneshop_url + "/stores/getCountries/",
            success: function(e) {
                for (var s = e.trim(), a = "", r = s.split("~"), o = 0; o < r.length; o++) {
                    var t = r[o].split(":");
                    a += "<option value='" + t[0] + "'>" + t[1] + "</option>"
                }
                var c = "<option value=''>Select Country</option>" + a;
                $("#sub_filter").html("<select id='sub_select' class='oneshop_mystoreField oneshop_friendStoreFields'>" + c + "</select>")
            }
        });
        else if ("Category" == e) $("#city_div").css("display", "none"), $("#sub_filter").css("display", "block"), $.ajax({
            type: "post",
            url: oneshop_url + "/stores/getCategories/",
            success: function(e) {
                for (var s = e.trim(), a = "", r = s.split("~"), o = 0; o < r.length; o++) {
                    var t = r[o].split(":");
                    a += "<option value='" + t[1] + "'>" + t[1] + "</option>"
                }
                var c = "<option value=''>Select Category</option>" + a;
                $("#sub_filter").html("<select id='sub_select' class='oneshop_mystoreField oneshop_friendStoreFields'>" + c + "</select>")
            }
        });   
        else if ("City" == e) $("#sub_filter").css("display", "none"), $("#city_div").css("display", "");
        else {
            $("#city_div").css("display", "none");
            for (var s = ["NONE", "MOBILE REPAIRING", "LAPTOP REPAIRING", "CAMERA REPAIRING", "AUTOMOBILE REPAIRING", "BUILDING MATERIAL SUPPLIERS", "CONSTRUCTION CONTRACTS", "HOSTAL RENTALS", "PROPERTY DEALERSHIP", "IT PROJECTS", "MECHANICAL WORKS", "HEAVY MACHINE CONTRACTS"], a = "", r = 0; r < s.length; r++) a += "<option value='" + s[r] + "'>" + s[r] + "</option>";
            $("#sub_filter").html("<select id='sub_select' class='oneshop_mystoreField oneshop_friendStoreFields'>" + a + "</select>")
        }
    })
}), $(function() {
    $("#uploadFile1").on("change", function() {
        var e = this.files ? this.files : [];
        if (e.length && window.FileReader && /^image/.test(e[0].type)) {
            var s = new FileReader;
            s.readAsDataURL(e[0]), s.onloadend = function() {
                $("#imagePreview1").css("background-image", "url(" + this.result + ")")
            }
        }
    })
}), $(function() {
    $("#uploadFile2").on("change", function() {
        var e = this.files ? this.files : [];
        if (e.length && window.FileReader && /^image/.test(e[0].type)) {
            var s = new FileReader;
            s.readAsDataURL(e[0]), s.onloadend = function() {
                $("#imagePreview2").css("background-image", "url(" + this.result + ")")
            }
        }
    })
}), $(function() {
    $("#uploadFile3").on("change", function() {
        var e = this.files ? this.files : [];
        if (e.length && window.FileReader && /^image/.test(e[0].type)) {
            var s = new FileReader;
            s.readAsDataURL(e[0]), s.onloadend = function() {
                $("#imagePreview3").css("background-image", "url(" + this.result + ")")
            }
        }
    })
}), $(function() {
    function e(e) {
        return $.ajax({
            async: !1,
            type: "POST",
            data: {
                email: e
            },
            url: oneshop_url + "/stores/email_check",
            success: function(e) {
                i = e
            }
        }), i
    }

    function s() {
        var e = $("#dev_billing_os_country").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/state_info",
            data: {
                country_id: e
            },
            success: function(e) {
                $("#dev_billing_os_state_list").html(e)
            }
        })
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function a(e) {
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/detailsOfPackage",
            data: {
                "package": e
            },
            success: function(e) {
                var s = e.trim();
                alert(s);
                var a = s.split("~"),
                    r = a[0],
                    o = r + "~" + $("#hstore_aid").val();
                $("#pckg_id").val(r), $("input[name=custom]").val(o);
                for (var t = 1; 3 >= t; t++) {
                    var c = a[t],
                        d = "tblfield_" + t;
                    2 == t && (c += " GB"), $("#" + d).html(c)
                }
            }
        })
    }

    function r(e) {
        var s = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return s.test(e)
    }
    $("#uploadFile4").on("change", function() {
        var e = this.files ? this.files : [];
        if (e.length && window.FileReader && /^image/.test(e[0].type)) {
            var s = new FileReader;
            s.readAsDataURL(e[0]), s.onloadend = function() {
                $("#imagePreview4").css("background-image", "url(" + this.result + ")")
            }
        }
    }), $("#osdev_Category").change(function() {
        var e = "Group_id=" + $("#osdev_Group").val() + "&Category_id=" + $("#osdev_Category").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/products/subcatagory_ids",
            data: e,
            success: function(e) {
                e.indexOf("osv_brand") > -1 || e.indexOf("osv_features") > -1 ? ($("#osdev_Brands").html(e), $("#osdev_SubCategory").html("<option>--Select Category</option><option value='others'>Others</option>")) : $("#osdev_SubCategory").html(e + "<option value='others'>Others</option>")
            }
        })
    }), $("#osdev_SubCategory").change(function() {
        var e = "Group_id=" + $("#osdev_Group").val() + "&Category_id=" + $("#osdev_Category").val() + "&subCat_id=" + $("#osdev_SubCategory").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/products/getspecifications",
            data: e,
            success: function(e) {
                $("#osdev_Brands").html(e)
            }
        })
    });
    var o = "";
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var e = $("#os_store_aind").val(),
                s = $("#load_product_count").val();
            o != s && ($.ajax({
                type: "POST",
                url: oneshop_url + "/products/load_product_list",
                data: {
                    load_product_count: s,
                    os_store_aid: e
                },
                success: function(e) {
                    $("#load_product_count").val(parseInt(s) + 8), $("#product_append").append(e)
                }
            }), o = s)
        }
    }), $(document).on("click", ".product_view", function() {
        return location.replace(oneshop_url + "/home/product_Detail_View?product_id=" + $(this).attr("id")), !1
    }), $("#addcart").click(function() {
        var e = $("#dev_os_p_id").val(),
            s = $("#hstore_code").val(),
            a = $("#hstore_cnt").val();
        a >= 5 ? alert("You have exceeded the maximum cart list store.Please delete store from your cart items list") : $.ajax({
            type: "post",
            url: oneshop_url + "/products/addItemsToCart",
            data: {
                product_id: e,
                store_code: s
            },
            success: function(e) {
                var a = e.trim(),
                    r = "";
                if ("NO" == a) r = "Already added this product in your cart";
                else {
                    var o = parseInt($("#oneshop_mycartcount").html());
                    callAJAX(oneshop_url + "/mycart/myCartList", {
                        store_code: s
                    }, function(e) {
                        o += 1, $("#oneshop_mycartcount").html(o), $("#cartdata").html(e)
                    }, "", ""), r = "The selected product is added in your cart"
                }
                alert(r)
            },
            error: function(e, s, a) {
                alert("error function" + e.responseText)
            }
        })
    }), $(document).on("click", "img", function() {
        var e = $(this).attr("id"),
            s = $(this).attr("src"),
            a = s.split("/");
        a[a.length - 2] = "li";
        var r = a.join("/");
        $("#mainimg" + e).attr("src", r)
    });
    var t = "";
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() && null !== document.getElementById("category_productappend")) {
            var e = $("#product_limit_count").val(),
                s = $("#CATEGORY_NAME").val();
            t != e && ($.ajax({
                type: "POST",
                url: oneshop_url + "/products/load_category_product_list",
                data: {
                    product_limit_count: e,
                    CATEGORY_NAME: s
                },
                success: function(s) {
                    $("#product_limit_count").val(parseInt(e) + 8), $("#category_productappend").append(s)
                }
            }), t = e)
        }
    }), $(document).on("click", ".os_subcat_id", function() {
        var e = $(this).attr("id");
        return $("#product_subcategory_id").val(e), $("#product_subcategory_limit_count").val(8), $.ajax({
            type: "POST",
            url: oneshop_url + "/products/load_subcategory_product_list",
            data: {
                subcategory_id: e
            },
            success: function(e) {
                $("#category_productappend").attr("id", "subcategory_productappend"), $("#subcategory_productappend").html(e)
            }
        }), !1
    }), $(document).on("click", "#prd_name", function() {
        var e = $("#CATEGORY_NAME").val();
        return $("#product_limit_count").val(8), $.ajax({
            type: "POST",
            url: oneshop_url + "/products/product_view_tpl",
            data: {
                category_name: e
            },
            success: function(e) {
                $("#subcategory_productappend").attr("id", "category_productappend"), $("#category_productappend").html(e)
            }
        }), !1
    });
    var c = "";
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() && null !== document.getElementById("subcategory_productappend")) {
            var e = $("#product_subcategory_limit_count").val(),
                s = $("#product_subcategory_id").val();
            t != product_limit_count && ($.ajax({
                type: "POST",
                url: oneshop_url + "/products/load_subcategory_loadproduct_list",
                data: {
                    product_subcategory_limit_count: e,
                    product_subcategory_id: s
                },
                success: function(s) {
                    $("#product_subcategory_limit_count").val(parseInt(e) + 8), $("#subcategory_productappend").append(s)
                }
            }), c = e)
        }
    }), $('input[type="file"]#osdev_store_banner').bind("change", function(e) {
        var s = this.files[0].type;
        "image/gif" == s || "image/jpg" == s || "image/png" == s || "image/jpeg" == s ? $("#osdev_store_banner_update_form").submit() : alert("Allow file type should be jpg|png|gif|jpeg")
    }), $("#osdev_store_banner_update_form").submit(function() {
        var e = $("#STORE_ID").val();
        return $.ajax({
            type: "POST",
            url: oneshop_url + "/orders/update_store_banner",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(s) {
                var a = $.trim(s),
                    r = oneshop_url + "/stores/" + e + "/cover/li/" + a;
                $("#current_store_banner").val(a), $("#osdev_storecove_pic").attr("src", r)
            }
        }), !1
    }), $('input[type="file"]#store_logo_update').bind("change", function(e) {
        var s = this.files[0].type;
        "image/gif" == s || "image/jpg" == s || "image/png" == s || "image/jpeg" == s ? $("#store_logo_update_form").submit() : alert("Allow file type should be jpg|png|gif|jpeg")
    }), $("#store_logo_update_form").submit(function() {
        var e = $("#STORE_ID").val();
        return $.ajax({
            type: "POST",
            url: oneshop_url + "/orders/update_store_logo",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(s) {
                var a = $.trim(s),
                    r = oneshop_url + "/stores/" + e + "/logo/li/" + a;
                $("#current_store_logo").val(a), $("#osdev_store_logo_display").attr("src", r)
            }
        }), !1
    }), $("#osdev_mystore_settings").click(function() {
        $("#STORE_ID").val();
        location.replace(oneshop_url + "/home/mystore_settings/")
    }), $("#store_info_update").submit(function() {
        var e = "",
            s = $("#STORE_ID").val(),
            a = ($("#Store_Name").val(), $("#Time_Zone").val()),
            r = $("#country_id").val(),
            o = $("#dev_os_state_list").val(),
            t = $("#dev_os_cities_list").val(),
            c = $("#Is_Official").val(),
            d = $("#Zip_code").val(),
            i = $("#Helpline_Number").val(),
            l = $("#Enquiry_mobile_number").val(),
            n = $("#Service_Email").val(),
            _ = $("#Problem_Reporting_Email").val(),
            u = "STORE_ID=" + s + "&country_id=" + r + "&state_id=" + o + "&city_id=" + t + "&Time_Zone=" + a + "&Is_Official=" + c + "&Zip_code=" + d + "&Helpline_Number=" + i + "&Enquiry_mobile_number=" + l + "&Service_Email=" + n + "&Problem_Reporting_Email=" + _;
        return 1 != is_Empty(d) || d % 1 != 0 || d.length < 6 ? ($("#Zip_code").addClass("redfoucusclass"), e = 10) : $("#Zip_code").removeClass("redfoucusclass"), 1 != is_Empty(i) || i % 1 != 0 || i.length < 8 ? ($("#Helpline_Number").addClass("redfoucusclass"), e = 10) : $("#Helpline_Number").removeClass("redfoucusclass"), 1 != is_Empty(l) || l % 1 != 0 || l.length < 8 ? ($("#Enquiry_mobile_number").addClass("redfoucusclass"), e = 10) : $("#Enquiry_mobile_number").removeClass("redfoucusclass"), 1 != is_Empty(n) || 1 != isValid_Email(n) ? ($("#Service_Email").addClass("redfoucusclass"), e = 10) : $("#Service_Email").removeClass("redfoucusclass"), 1 != is_Empty(_) || 1 != isValid_Email(_) ? ($("#Problem_Reporting_Email").addClass("redfoucusclass"), e = 10) : $("#Problem_Reporting_Email").removeClass("redfoucusclass"), 10 == e ? !1 : ($.ajax({
            type: "POST",
            url: oneshop_url + "/stores/store_info_update",
            data: u,
            success: function(e) {
                1 == e && $("#store_update_success_message").fadeIn().delay(5e3).fadeOut()
            }
        }), !1)
    }), $("#Manage_staff").click(function() {
        $("#Store_Basic_info_div").slideUp(), $("#notification_div").slideUp(), $("#manage_staff_div").slideDown()
    }), $("#My_Store_Setting").click(function() {
        $("#Store_Basic_info_div").slideDown(), $("#notification_div").slideUp(), $("#manage_staff_div").slideUp()
    }), $("#os_notify").click(function() {
        $("#Store_Basic_info_div").slideUp(), $("#notification_div").slideDown(), $("#manage_staff_div").slideUp()
    });
    var d = 2;
    $("#add_staff").click(function() {
        if (3 > d) {
            var e = ' <div id="manage_staff_main' + d + '"><div class="oneshop_mystoreSettinsField"><span class="onshop_formsFieldLables"><h5>Order Manager :</h5></span><input type="text" class="oneshop_mystoreField" placeholder="Order Manager Email" name="order_manager" id="order_manager_id' + d + '"><span class="order_Manager" id="order_Manager_error' + d + '" style="">Email not Exist</span></div><div class="oneshop_mystoreSettinsField"><span class="onshop_formsFieldLables"><h5>Stock Manager :</h5></span><input type="text" class="oneshop_mystoreField" placeholder="Stock Manager Email" name="stock_manager"id="stock_manager_id' + d + '"> <span class="order_Manager" id="stock_Manager_error' + d + '" style="">Email not Exist</span></div></div>';
            $("#manage_staff_main_append").append(e), d++
        }(3 == d || 2 == d) && $("#manage_staff_remove").show()
    }), $("#manage_staff_remove").click(function() {
        d--, d >= 2 && $("#manage_staff_main" + d).remove(), 2 == d && $("#manage_staff_remove").hide()
    }), $("#mystaff_add_save").click(function() {
        var s = 0;
        for (o = 1; d > o; o++) {
            var a = e($("#order_manager_id" + o).val());
            2 == a ? ($("#order_manager_id" + o).addClass("redfoucusclass"), $("#order_Manager_error" + o).show(), s = 10) : ($("#order_manager_id" + o).removeClass("redfoucusclass"), $("#order_Manager_error" + o).hide())
        }
        for (o = 1; d > o; o++) {
            var a = e($("#stock_manager_id" + o).val());
            2 == a ? ($("#stock_manager_id" + o).addClass("redfoucusclass"), $("#stock_Manager_error" + o).show(), s = 10) : ($("#stock_manager_id" + o).removeClass("redfoucusclass"), $("#stock_Manager_error" + o).hide())
        }
        if (10 == s) return !1;
        for (var r = "", o = 1; d >= o; o++) {
            var t = o - 1;
            1 == o ? (r = "STORE_ID=" + $("#STORE_ID").val(), NaN + t + "=" + $("#order_manager_id" + t).val() + "&stock_manager_id" + t + "=" + $("#stock_manager_id" + t).val()) : r += "&order_manager_id" + t + "=" + $("#order_manager_id" + t).val() + "&stock_manager_id" + t + "=" + $("#stock_manager_id" + t).val()
        }
        $.ajax({
            async: !1,
            type: "POST",
            data: r,
            url: oneshop_url + "/stores/staff_insertion",
            success: function(e) {
                1 == e && location.reload()
            }
        })
    });
    var i;
    $("#osdev_notify_submit").click(function() {
        var e = "",
            s = "",
            a = "",
            r = "";
        e = 1 == $("#osdev_order_recived").prop("checked") ? "Y" : "N", s = 1 == $("#osdev_outof_stock").prop("checked") ? "Y" : "N", a = 1 == $("#osdev_reported_onstore").prop("checked") ? "Y" : "N", r = 1 == $("#osdev_cancle_order").prop("checked") ? "Y" : "N";
        var o = "STORE_ID=" + $("#STORE_ID").val() + "&osdev_order_recived=" + e + "&osdev_outof_stock=" + s + "&osdev_reported_onstore=" + a + "&osdev_cancle_order=" + r;
        $.ajax({
            async: !1,
            type: "POST",
            data: o,
            url: oneshop_url + "/stores/notification_update",
            success: function(e) {
                1 == e && $("#notification_success_msg").fadeIn().delay(5e3).fadeOut()
            }
        })
    }), $(document).on("submit", "#reportproblem", function(e) {
        e.preventDefault();
        var s = 0,
            a = $.trim($("#report_problem_name").val()),
            r = $.trim($("#report_problem_description").val()),
            o = $.trim($("#report_problem_screenshot").val());
        if (1 != is_Empty(a) ? ($("#report_problem_name").addClass("redfoucusclass"), s = 10) : $("#report_problem_name").removeClass("redfoucusclass"), 1 != is_Empty(r) ? ($("#report_problem_description").addClass("redfoucusclass"), s = 10) : $("#report_problem_description").removeClass("redfoucusclass"), 0 != o || "" != o) {
            var t = document.getElementById("report_problem_screenshot").files[0],
                c = ["jpeg", "png", "jpg", "gif"],
                d = !1;
            c.forEach(function(e) {
                t.type.match("image/" + e) && (d = !0)
            }), d || (alert("Snapshot should be an image type"), s = 10)
        }
        return 10 == s ? !1 : ($.ajax({
            type: "POST",
            url: oneshop_url + "/reportproblem/report_problem_insertion",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                e = e.split("###"), "ON9" === $.trim(e[0]) && (alert("Report token number " + e[1]), document.getElementById("reportproblem").reset(), $("#response").show().html("Thanks.Your report is submitted sucessfully...").fadeIn("slow"), setTimeout(function() {
                    $("#response").html(""), $("#oneshop_reportProblemPopupBg").hide(1)
                }, 3e3))
            }
        }), !1)
    }), $("#edit_product").submit(function() {
        var e = 0,
            s = $("#os_category").val(),
            a = $("#os_sub_category").val(),
            r = $("#os_product_mDate").val(),
            o = $("#os_product_costprice").val(),
            t = $("#os_product_sellprice").val(),
            c = $("#os_product_discount").val(),
            d = $("#os_product_quantity").val(),
            i = $("#os_product_specification").val(),
            l = $("#os_product_description").val();
        return 1 != is_Empty(s) ? ($("#os_category").addClass("redfoucusclass"), e = 10) : $("#os_category").removeClass("redfoucusclass"), 1 != is_Empty(a) ? ($("#os_sub_category").addClass("redfoucusclass"), e = 10) : $("#os_sub_category").removeClass("redfoucusclass"), 1 != is_Empty(r) ? ($("#os_product_mDate").addClass("redfoucusclass"), e = 10) : $("#os_product_mDate").removeClass("redfoucusclass"), 1 != is_Empty(o) || o % 1 != 0 ? ($("#os_product_costprice").addClass("redfoucusclass"), e = 10) : $("#os_product_costprice").removeClass("redfoucusclass"), 1 != is_Empty(t) || t % 1 != 0 ? ($("#os_product_sellprice").addClass("redfoucusclass"), e = 10) : $("#os_product_sellprice").removeClass("redfoucusclass"), 1 != is_Empty(c) || c % 1 != 0 ? ($("#os_product_discount").addClass("redfoucusclass"), e = 10) : $("#os_product_discount").removeClass("redfoucusclass"), 1 != is_Empty(d) || d % 1 != 0 || 0 == d ? ($("#os_product_quantity").addClass("redfoucusclass"), e = 10) : $("#os_product_quantity").removeClass("redfoucusclass"), 1 != is_Empty(i) ? ($("#os_product_specification").addClass("redfoucusclass"), e = 10) : $("#os_product_specification").removeClass("redfoucusclass"), 1 != is_Empty(l) ? ($("#os_product_description").addClass("redfoucusclass"), e = 10) : $("#os_product_description").removeClass("redfoucusclass"), 10 == e ? !1 : ($.ajax({
            type: "POST",
            url: oneshop_url + "/home/update_product_info",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                1 == e ? $("#product_update_suc").show().delay(5e3).fadeOut() : location.replace(oneshop_url)
            }
        }), !1)
    }), $("#orc_submit").click(function() {
        var e = 0,
            s = $("#orc_datepicker").val(),
            a = $("#orc_datepicker1").val();
        0 == s.length ? (e = 10, $("#orc_datepicker").addClass("redfoucusclass")) : $("#orc_datepicker").removeClass("redfoucusclass"), 0 == a.length ? (e = 10, $("#orc_datepicker1").addClass("redfoucusclass")) : $("#orc_datepicker1").removeClass("redfoucusclass");
        var r = new Date(s),
            o = new Date(a),
            t = Math.abs(o.getTime() - r.getTime()),
            c = Math.ceil(t / 864e5);
        if (c > 30 && (alert("Please Select the dates differance in between below 30 days "), e = 10), 10 == e) return !1;
        if (new Date(s) >= new Date(a)) $("#orc_datepicker").val(""), $("#orc_datepicker1").val(""), $("#orc_datepicker").addClass("redfoucusclass"), $("#orc_datepicker1").addClass("redfoucusclass");
        else {
            var d = $("#hstore_code").val();
            $("#orc_datepicker").removeClass("redfoucusclass"), $("#orc_datepicker1").removeClass("redfoucusclass"), $.ajax({
                type: "POST",
                url: oneshop_url + "/store_reports/order_recieved_chart1/" + d,
                data: {
                    fit_start_time: s,
                    fit_end_time: a
                },
                success: function(e) {
                    $("#osdev_orc_chart_append").html(e)
                },
                error: function() {}
            })
        }
    }), $("#orc_cancel_submit").click(function() {
        var e = 0,
            s = $("#orc_datepicker2").val(),
            a = $("#orc_datepicker3").val();
        0 == s.length ? (e = 10, $("#orc_datepicker2").addClass("redfoucusclass")) : $("#orc_datepicker2").removeClass("redfoucusclass"), 0 == a.length ? (e = 10, $("#orc_datepicker3").addClass("redfoucusclass")) : $("#orc_datepicker3").removeClass("redfoucusclass");
        var r = new Date(s),
            o = new Date(a),
            t = Math.abs(o.getTime() - r.getTime()),
            c = Math.ceil(t / 864e5);
        if (c > 30 && (alert("Please Select the dates differance in between below 30 days "), e = 10), 10 == e) return !1;
        if (new Date(s) >= new Date(a)) $("#orc_datepicker2").val(""), $("#orc_datepicker3").val(""), $("#orc_datepicker2").addClass("redfoucusclass"), $("#orc_datepicker3").addClass("redfoucusclass");
        else {
            $("#orc_datepicker2").removeClass("redfoucusclass"), $("#orc_datepicker3").removeClass("redfoucusclass");
            var d = $("#hstore_code").val();
            $.ajax({
                type: "POST",
                url: oneshop_url + "/store_reports/order_cancelation_chart1",
                data: {
                    fit_start_time: s,
                    fit_end_time: a,
                    store_code: d
                },
                success: function(e) {
                    $("#osdev_cancel_chart_append").html(e)
                },
                error: function() {}
            })
        }
    }), $("#osdev_Category_id_forsale").change(function() {
        $("#orc_datepicker4").val(""), $("#orc_datepicker5").val("");
        var e = $("#osdev_Category_id_forsale").val();
        $.ajax({
            type: "POST",
            data: {
                category_id: e
            },
            url: oneshop_url + "/store_reports/category_wise_sale",
            success: function(e) {
                $("#osdev_chart_append").html(e, function() {})
            }
        })
    }), $("#cat_wise_sub").click(function() {
        var e = 0,
            s = $("#orc_datepicker4").val(),
            a = $("#orc_datepicker5").val();
        0 == s.length ? (e = 10, $("#orc_datepicker4").addClass("redfoucusclass")) : $("#orc_datepicker4").removeClass("redfoucusclass"), 0 == a.length ? (e = 10, $("#orc_datepicker5").addClass("redfoucusclass")) : $("#orc_datepicker5").removeClass("redfoucusclass");
        var r = new Date(s),
            o = new Date(a),
            t = Math.abs(o.getTime() - r.getTime()),
            c = Math.ceil(t / 864e5);
        if (c > 30 && (alert("Please Select the dates differance in between below 30 days "), e = 10), 10 == e) return !1;
        if (new Date(s) >= new Date(a)) $("#orc_datepicker4").val(""), $("#orc_datepicker5").val(""), $("#orc_datepicker4").addClass("redfoucusclass"), $("#orc_datepicker5").addClass("redfoucusclass");
        else {
            $("#orc_datepicker4").removeClass("redfoucusclass"), $("#orc_datepicker5").removeClass("redfoucusclass");
            var d = $("#osdev_Category_id_forsale").val();
            $.ajax({
                type: "POST",
                url: oneshop_url + "/store_reports/category_wise_sale",
                data: {
                    fit_start_time: s,
                    fit_end_time: a,
                    category_id: d
                },
                success: function(e) {
                    $("#osdev_chart_append").html(e)
                },
                error: function() {}
            })
        }
    }), $("#report_cancel").click(function() {
        $("#oneshop_reportProblemPopupBg").css("display", "none")
    }), $("#product_w_s").click(function() {
        var e = 0,
            s = $("#orc_datepicker6").val(),
            a = $("#orc_datepicker7").val();
        0 == s.length ? (e = 10, $("#orc_datepicker6").addClass("redfoucusclass")) : $("#orc_datepicker6").removeClass("redfoucusclass"), 0 == a.length ? (e = 10, $("#orc_datepicker7").addClass("redfoucusclass")) : $("#orc_datepicker7").removeClass("redfoucusclass");
        var r = new Date(s),
            o = new Date(a),
            t = Math.abs(o.getTime() - r.getTime()),
            c = Math.ceil(t / 864e5),
            d = $("#hstore_code").val();
        if (c > 30 && (alert("Please Select the dates differance in between below 30 days "), e = 10), 10 == e) return !1;
        if (new Date(s) >= new Date(a)) $("#orc_datepicker6").val(""), $("#orc_datepicker7").val(""), $("#orc_datepicker6").addClass("redfoucusclass"), $("#orc_datepicker7").addClass("redfoucusclass");
        else {
            $("#orc_datepicker6").removeClass("redfoucusclass"), $("#orc_datepicker7").removeClass("redfoucusclass");
            var i = $("#osdev_product_id_forsale").val();
            $.ajax({
                type: "POST",
                url: oneshop_url + "/store_reports/product_wise_sale/" + d,
                data: {
                    fit_start_time: s,
                    fit_end_time: a,
                    product_id_forsale: i
                },
                success: function(e) {
                    $("#osdev_productsale_chart_append").html(e)
                },
                error: function() {}
            })
        }
    }), $("#orc_dwnld_excel").click(function() {
        var e = $("#orc_datepicker").val(),
            s = $("#orc_datepicker1").val(),
            a = $("#hstore_code").val(),
            r = 0;
        if (0 != e.length || 0 != s.length) {
            0 == e.length ? (r = 10, $("#orc_datepicker").addClass("redfoucusclass")) : $("#orc_datepicker").removeClass("redfoucusclass"), 0 == s.length ? (r = 10, $("#orc_datepicker1").addClass("redfoucusclass")) : $("#orc_datepicker1").removeClass("redfoucusclass");
            var o = new Date(e),
                t = new Date(s),
                c = Math.abs(t.getTime() - o.getTime()),
                d = Math.ceil(c / 864e5);
            d > 30 && (alert("Please Select the dates differance in between below 30 days "), r = 10)
        }
        return 10 == r ? !1 : void location.replace(oneshop_url + "/store_reports/order_recieved_report_download?fit_start_time=" + e + "&fit_end_time=" + s + "&store_code=" + a)
    }), $("#ocnl_dwnld_excel").click(function() {
        var e = $("#orc_datepicker2").val(),
            s = $("#orc_datepicker3").val(),
            a = $("#hstore_code").val(),
            r = 0;
        if (0 != e.length || 0 != s.length) {
            0 == e.length ? (r = 10, $("#orc_datepicker2").addClass("redfoucusclass")) : $("#orc_datepicker2").removeClass("redfoucusclass"), 0 == s.length ? (r = 10, $("#orc_datepicker3").addClass("redfoucusclass")) : $("#orc_datepicker3").removeClass("redfoucusclass");
            var o = new Date(e),
                t = new Date(s),
                c = Math.abs(t.getTime() - o.getTime()),
                d = Math.ceil(c / 864e5);
            d > 30 && (alert("Please Select the dates differance in between below 30 days "), r = 10)
        }
        return 10 == r ? !1 : void location.replace(oneshop_url + "/store_reports/order_cancel_report_download?fit_start_time=" + e + "&fit_end_time=" + s + "&store_code=" + a)
    }), $("#ctws_dwnld_excel").click(function() {
        var e = $("#orc_datepicker4").val(),
            s = $("#orc_datepicker5").val(),
            a = 0;
        if (0 != e.length || 0 != s.length) {
            0 == e.length ? (a = 10, $("#orc_datepicker4").addClass("redfoucusclass")) : $("#orc_datepicker4").removeClass("redfoucusclass"), 0 == s.length ? (a = 10, $("#orc_datepicker5").addClass("redfoucusclass")) : $("#orc_datepicker5").removeClass("redfoucusclass");
            var r = new Date(e),
                o = new Date(s),
                t = Math.abs(o.getTime() - r.getTime()),
                c = Math.ceil(t / 864e5);
            c > 30 && (alert("Please Select the dates differance in between below 30 days "), a = 10)
        }
        if (10 == a) return !1;
        var d = $("#osdev_Category_id_forsale").val();
        location.replace(oneshop_url + "/store_reports/categorywise_sales_report_download?fit_start_time=" + e + "&fit_end_time=" + s + "&category_id=" + d)
    }), $("#prtws_dwnld_excel").click(function() {
        var e = $("#orc_datepicker6").val(),
            s = $("#orc_datepicker7").val(),
            a = $("#hstore_code").val(),
            r = 0;
        if (0 != e.length || 0 != s.length) {
            0 == e.length ? (r = 10, $("#orc_datepicker6").addClass("redfoucusclass")) : $("#orc_datepicker6").removeClass("redfoucusclass"), 0 == s.length ? (r = 10, $("#orc_datepicker7").addClass("redfoucusclass")) : $("#orc_datepicker7").removeClass("redfoucusclass");
            var o = new Date(e),
                t = new Date(s),
                c = Math.abs(t.getTime() - o.getTime()),
                d = Math.ceil(c / 864e5);
            d > 30 && (alert("Please Select the dates differance in between below 30 days "), r = 10)
        }
        if (10 == r) return !1;
        var i = $("#osdev_product_id_forsale").val();
        location.replace(oneshop_url + "/store_reports/productwise_sales_report_download?fit_start_time=" + e + "&fit_end_time=" + s + "&product_id_forsale=" + i + "&store_code=" + a)
    }), $("#dev_os_country").change(function() {
        var e = "country_id=" + $("#dev_os_country").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/state_info",
            data: e,
            success: function(e) {
                $("#dev_os_state_list").html(e)
            }
        })
    }), $("#dev_os_state_list").change(function() {
        var e = "state_id=" + $("#dev_os_state_list").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/city_info",
            data: e,
            success: function(e) {
                $("#dev_os_cities_list").html(e)
            }
        })
    }), $("#os_user_settings").submit(function() {
        $("#dev_os_addr1").val(), $("#dev_os_addr2").val(), $("#dev_os_state_list").val(), $("#dev_os_cities_list").val(),
            $("#zip_code").val(), $("#dev_os_country").val();
        return $.ajax({
            type: "POST",
            url: oneshop_url + "/home/updateMySettings",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                1 == e ? (alert("Data updated sucessfully"), $("#response").show().html("Thanks.Your data  is updated sucessfully...").fadeIn("slow").delay(5e3).hide(1)) : alert(e)
            }
        }), !1
    }), $("#edit_settings").click(function() {
        $("#non_editable").hide(), $("#edit_div").show()
    }), $("#find_product_category").change(function() {
        var e = $("#find_product_category").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/products/subcatagory_ids",
            data: {
                Category_id: e
            },
            success: function(e) {
                $("#find_product_sub_category").show(), $("#find_product_sub_category").html(e)
            }
        })
    }), $("#find_product").click(function() {
        var e = $("#dev_os_find_order_date").val(),
            s = $("#dev_os_find_cancel_date").val(),
            a = $("#dev_os_find_order_number").val(),
            r = $("#dev_store_u_id").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/orderCancellationData/" + r,
            data: {
                order_number: a,
                order_date: e,
                cancel_date: s
            },
            success: function(e) {
                $("#total_data").html(e)
            }
        })
    }), $("#store_report_problem").click(function() {
        $("#store_report").fadeToggle()
    }), $("#store_report_cancel").click(function() {
        return $("#store_report").fadeToggle(), $("#strpt_problrm")[0].reset(), !1
    }), $('input[type="file"]#report_snapshot').bind("change", function(e) {
        e.preventDefault();
        var s = e.originalEvent.target.files,
            a = (s[0].name, s[0].size),
            r = s[0].type;
        512e3 >= a && ("image/gif" == r || "image/jpg" == r || "image/png" == r || "image/jpeg" == r) || (a > 512e3 ? (alert("Allow file size should be below 500kb"), $("#report_snapshot").val("")) : ($("#report_snapshot").val(""), alert("Allow file type should be jpg|png|gif|jpeg")))
    }), $("#strpt_problrm").submit(function() {
        var e = $("#report_title").val(),
            s = $("#report_description").val(),
            a = ($("#report_snapshot").val(), 0);
        return 1 != is_Empty(e) ? ($("#report_title").addClass("redfoucusclass"), a = 10) : $("#report_title").removeClass("redfoucusclass"), 1 != is_Empty(s) ? ($("#report_description").addClass("redfoucusclass"), a = 10) : $("#report_description").removeClass("redfoucusclass"), 10 == a ? !1 : ($.ajax({
            type: "POST",
            url: oneshop_url + "/stores/report_on_store",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                alert(e), 1 == e && ($("#strpt_problrm")[0].reset(), alert("Report sucessfully submitted"), $("#store_report").fadeToggle("slow").delay(5e3))
            }
        }), !1)
    }), $("#os_backword_btn").click(function() {
        window.history.go(-1)
    }), $("#os_forward_btn").click(function() {
        window.history.go(1)
    }), $("#dev_os_product_detail_view1").click(function() {
        var e = $("#dev_os_p_id").val(),
            s = $("#hstore_uid").val(),
            a = $("#hmode").val();
        "public" != a ? window.location = oneshop_url + "/home/shippingAddress/" + e + "/" + s : window.location = oneshop_url + "/home/shippingAddress/" + e + "/public"
    }), $("#another_address").click(function() {
        $("#saved_address_div").hide(), $("#new_address_div").show(), s()
    }), $("#saved_address").click(function() {
        $("#new_address_div").hide(), $("#saved_address_div").show()
    }), $("#dev_billing_os_state_list").change(function() {
        var e = $("#dev_billing_os_state_list").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/city_info",
            data: {
                state_id: e
            },
            success: function(e) {
                $("#dev_os_billing_citieslist").html(e)
            }
        })
    }), $("#newbilling_address").submit(function() {
        var e, s = $("#os_billing_address1").val(),
            a = $("#os_billing_address2").val(),
            r = ($("#dev_billing_os_country").val(), $("#dev_billing_os_state_list").val()),
            o = $("#dev_os_billing_citieslist").val(),
            t = $("#dev_os_billing_zipcode").val();
        $("input:radio[name=deliver_type]:checked").val();
        "" == s && ($("#os_billing_address1").addClass("redfoucusclass"), e = 10), "" == a && ($("#os_billing_address2").addClass("redfoucusclass"), e = 10), "" == r && ($("#dev_billing_os_state_list").addClass("redfoucusclass"), e = 10), "" == o && ($("#dev_os_billing_citieslist").addClass("redfoucusclass"), e = 10);
        var c = isNaN(t);
        return ("" == t || 1 == c) && ($("#dev_os_billing_zipcode").addClass("redfoucusclass"), e = 10), 10 == e ? !1 : $("#chkbox_address_user").prop("checked") ? (console.log($("#chkbox_address_user").prop("checked")), $.ajax({
            type: "POST",
            url: oneshop_url + "/home/updateUserAddress",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                1 == e && (alert("Address updated successfully"), $("#billing_address_save").hide(), $("#billing_address_Proceed").show())
            }
        }), !1) : (console.log($("#chkbox_address_user").prop("checked")), $.ajax({
            type: "POST",
            url: oneshop_url + "/home/insertShippingAddress",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                1 == e && (alert("Your Address updated successfully"), $("#billing_address_save").hide())
            }
        }), $("#billing_address_Proceed").show(), !1)
    }), $("#address_userdetails").submit(function() {
        var e, s = $("#user_details_addres1").val(),
            a = $("#user_details_addres2").val(),
            r = $("#dev_billing_os_country").val(),
            o = $("#dev_billing_os_state_list").val(),
            t = $("#dev_os_bdev_billing_os_countryilling_citieslist").val(),
            c = $("#user_details_zipcode").val();
        $("input:radio[name=deliver_type]:checked").val();
        "" == s && ($("#user_details_addres1").addClass("redfoucusclass"), e = 10), "" == a && ($("#user_details_addres2").addClass("redfoucusclass"), e = 10), "" == r && ($("#dev_billing_os_country").addClass("redfoucusclass"), e = 10), "" == o && ($("#dev_billing_os_state_list").addClass("redfoucusclass"), e = 10), "" == t && ($("#dev_os_billing_citieslist").addClass("redfoucusclass"), e = 10);
        var d = isNaN(c);
        return ("" == c || 1 == d) && ($("#user_details_zipcode").addClass("redfoucusclass"), e = 10), 10 == e ? !1 : $("#chkbx_confirmation_billingAddr").is(":checked") ? (console.log($("#chkbx_confirmation_billingAddr").prop("checked")), $.ajax({
            type: "POST",
            url: oneshop_url + "/home/updateUserAddress",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                1 == e && (alert("Address updated   successfully"), $("#dev_os_userAddressSave1").hide()), $("#dev_os_userAddressProceed1").show()
            }
        }), !1) : (console.log($("#chkbx_confirmation_billingAddr").prop("checked")), $.ajax({
            type: "POST",
            url: oneshop_url + "/home/insertShippingAddress",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                alert(e), 1 == e && (alert("Address updated successfully"), $("#dev_os_userAddressSave1").hide()), $("#dev_os_userAddressProceed1").show()
            }
        }), !1)
    }), $("input:radio[name=package_type]").click(function() {
        var e = $("input:radio[name=package_type]:checked").val();
        a(e)
    }), $("#osdev_PackageType").change(function() {
        var e = $(this).val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/detailsOfPackage",
            data: {
                "package": e
            },
            success: function(e) {
                var s = e.trim(),
                    a = s.split("~"),
                    r = a[0];
                $("#hpackage_id").val(r)
            }
        })
    }), $("#os_Wishlist").click(function() {
        var e = $("#dev_os_p_id").val();
        callAJAX(oneshop_url + "/wishlist/", {
            product_aid: e
        }, function(e) {
            var s = "";
            s = "yes" == e.trim() ? "Already added in wishlist" : "Added the product in your wishlist", alert(s)
        })
    }), $("#official_details1").submit(function() {
        var e, s = $("#official_storename").val(),
            a = $("#official_helpline").val(),
            o = $("#official_enquirynumber").val(),
            t = $("#official_addressline1").val(),
            c = $("#official_addressline2").val(),
            d = $("#official_zipcode").val(),
            i = $("#official_mobile_num").val(),
            l = $("#official_emailId").val(),
            n = $("#official_company").val(),
            _ = $("#official_website").val(),
            u = $("#official_turnover").val(),
            p = $("#official_landline_number_ext").val(),
            v = $("#official_landline_number").val(),
            f = ($("#official_storename").val(), $("#dev_os_state_list_official").val()),
            m = $("#dev_os_cities_list_official").val(),
            h = $("#official_description").val();
        "" == s && ($("#official_storename").addClass("redfoucusclass"), e = 10), "" == a && ($("#official_helpline").addClass("redfoucusclass"), e = 10), "" == o && ($("#official_enquirynumber").addClass("redfoucusclass"), e = 10), "" == t && ($("#official_addressline1").addClass("redfoucusclass"), e = 10), "" == c && ($("#official_addressline2").addClass("redfoucusclass"), e = 10), "" == d && ($("#official_zipcode").addClass("redfoucusclass"), e = 10), "" == i && i >= 1 && ($("#official_mobile_num").addClass("redfoucusclass"), e = 10), "" == l && (console.log(g), $("#official_emailId").addClass("redfoucusclass"), e = 10);
        var g = r(l);
        return g || (console.log(g), $("#official_emailId").addClass("redfoucusclass"), e = 10), "" == n && ($("#official_company").addClass("redfoucusclass"), e = 10), "" == _ && ($("#official_website").addClass("redfoucusclass"), e = 10), "" == u && ($("#official_turnover").addClass("redfoucusclass"), e = 10), "" == p && ($("#official_landline_number_ext").addClass("redfoucusclass"), e = 10), "" == v && ($("#official_landline_number").addClass("redfoucusclass"), e = 10), "" == f && ($("#dev_os_state_list_official").addClass("redfoucusclass"), e = 10), "" == m && ($("#dev_os_cities_list_official").addClass("redfoucusclass"), e = 10), "" == h && ($("#official_description").addClass("redfoucusclass"), e = 10), isNaN(d) && ($("#official_zipcode").addClass("redfoucusclass"), e = 10), isNaN(v) && ($("#official_landline_number").addClass("redfoucusclass"), e = 10), isNaN(p) && ($("#official_landline_number_ext").addClass("redfoucusclass"), e = 10), isNaN(i) && ($("#official_mobile_num").addClass("redfoucusclass"), e = 10), isNaN(o) && ($("#official_enquirynumber").addClass("redfoucusclass"), e = 10), isNaN(u) && ($("#official_turnover").addClass("redfoucusclass"), e = 10), 10 == e ? !1 : void $.ajax({
            type: "POST",
            url: oneshop_url + "/stores/officialStoreInfo",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                1 == e && (alert("Thank you for your response."), $("#click_officialSettings").html(""), $("#click_officialSettings").hide())
            }
        })
    }), $("#category_select").change(function() {
        var e = "Category_id=" + $(this).val();
        $.ajax({
            type: "post",
            url: oneshop_url + "/products/subcatagory_ids",
            data: e,
            success: function(e) {
                var s = e.trim();
                $("#subcategory_select").html(s)
            }
        })
    }), $("#quick_sell_form").submit(function() {
        for (var e = $("#product_name").val(), s = $("#category_select").val(), a = $("#subcategory_select").val(), r = $("#cost_price").val(), o = ($("#discount").val(), 0), t = document.getElementById("product_img"), c = [], d = 0; d < t.files.length; ++d) c.push(t.files[d].name);
        for (var i = 0; i < c.length; i++) {
            var l = c[i].split(".").pop();
            "gif" == l || "jpg" == l || "png" == l || "jpeg" == l ? $("#product_img").removeClass("redfoucusclass") : ($("#product_img").addClass("redfoucusclass"), $("#product_img").val(""), alert("Allow file type should be jpg|png|gif|jpeg"), o = 10)
        }
        return 1 != is_Empty(e) && ($("#product_name").addClass("redfoucusclass"), o = 10), 1 != is_Empty(s) && ($("#category_select").addClass("redfoucusclass"), o = 10), 1 != is_Empty(a) && ($("#subcategory_select").addClass("redfoucusclass"), o = 10), 1 != is_Empty(r) && ($("#cost_price").addClass("redfoucusclass"), o = 10), 10 == o ? !1 : ($.ajax({
            type: "post",
            url: oneshop_url + "/home/quick_sell/",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {
                var s = e.trim();
                1 == s && alert("product kept for quick sell successfully....")
            }
        }), !1)
    }), $(document).on("change", "#fcountries", function() {
        var e = $(this).val();
        $.ajax({
            type: "post",
            url: oneshop_url + "/stores/getStates/" + e,
            success: function(e) {
                var s = e.trim(),
                    a = "<option>select state</option>" + s;
                $("#states").html(a)
            }
        })
    }), $(".radioBtnClass").click(function() {
        console.log($("input:radio[name=deliver_type]:checked").val())
    }), $("#upgrade_btn").click(function() {
        window.location.href = oneshop_url + "/home/upgradePackage/"
    }), $(document).on("click", ".jStar", function() {
        var e = $(".datasSent").html(),
            s = $("#os_store_aind").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/stores/store_rating",
            data: {
                rating: e,
                os_store_aid: s
            },
            success: function(e) {}
        })
    }), $("#check_admin").change(function() {
        this.checked ? ($("#user_email").css("display", ""), $("#send_btn").css("display", "")) : ($("#user_email").css("display", "none"), $("#send_btn").css("display", ""))
    }), $("#send_btn").click(function() {
        var e = $("#stuid").val(),
            s = $("#user_email").val(),
            a = confirm("Are you sure? You want to give admin privileges..");
        a && $.ajax({
            type: "post",
            data: {
                useremail: s,
                storeuid: e
            },
            url: oneshop_url + "/home/adminMail/",
            success: function(e) {
                var s = e.trim();
                alert(s)
            }
        })
    }), $("#Is_Official").change(function() {
        var e = $("#hstore_aid").val(),
            s = $("#Is_Official").val();
        "Yes" == s && $.ajax({
            type: "post",
            url: oneshop_url + "/stores/getOfficialStatus/",
            data: {
                store_aid: e
            },
            success: function(e) {
                var s = e.trim();
                0 == s ? $("#click_officialSettings").fadeIn(300) : alert("already exists in our records")
            }
        })
    }), $("#dev_os_state_list_official").change(function() {
        var e = "state_id=" + $("#dev_os_state_list_official").val();
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/city_info",
            data: e,
            success: function(e) {
                $("#dev_os_cities_list_official").html(e)
            }
        })
    }), $("#os_product_share").click(function() {
        var e = $("#os_prd_shr_img").val(),
            s = $("#os_share_privacy").val(),
            a = $("input[name=os_product_share]:checked").val();
        return null == a ? !1 : void $.ajax({
            type: "POST",
            url: oneshop_url + "/products/product_share",
            data: {
                prd_img_src: e,
                share_module: a,
                os_share_privacy: s
            },
            success: function(e) {
                var e;
                1 == e && ($("#os_success_msg").html("This product successfully shared to " + a).delay(3e3), setTimeout(function() {
                    $("#os_success_msg").html(""), $("#os_sh_popup").trigger("click")
                }, 5e3))
            }
        })
    }), $("#add_image").submit(function() {
        return $.ajax({
            type: "POST",
            url: oneshop_url + "/products/add_image_update",
            data: new FormData(this),
            processData: !1,
            contentType: !1,
            success: function(e) {}
        }), !1
    }), $('input[type="file"].update_img').bind("change", function(e) {
        var s = e.originalEvent.target.files,
            a = (s[0].name, s[0].size, s[0].type);
        ("image/gif" == a || "image/jpg" == a || "image/png" == a || "image/jpeg" == a) && $("#cunnent_img" + $(this).attr("id")).submit()
    }), $('input[type="file"].add_img').bind("change", function(e) {
        var s = e.originalEvent.target.files,
            a = (s[0].name, s[0].size, s[0].type);
        ("image/gif" == a || "image/jpg" == a || "image/png" == a || "image/jpeg" == a) && $("#add_image").submit()
    }), $("#buyall_btn").click(function() {
        var e = $("#hproducts_str").val(),
            s = $("#hstoreid").val(),
            a = $("#custom").val(),
            r = oneshop_url + "/home/shippingAddress/" + e + "/" + s + "/" + a;
        window.location = r
    }), $("#find_order_btn").click(function() {
        var e = $("#order_num").val(),
            s = $("#hstoreid").val(),
            a = $("#order_date").val(),
            r = $("#cancel_date").val();
        $.ajax({
            type: "post",
            data: {
                order_no: e,
                order_dt: a,
                cancellation_date: r
            },
            url: oneshop_url + "/orders/getCancellationList/" + s,
            success: function(e) {
                var s = e.trim();
                $("#cancellation_div").html(s)
            }
        })
    }), $("#find_order_btn").click(function() {
        var e = $("#order_num").val(),
            s = $("#hstoreid").val(),
            a = $("#order_date").val();
        $.ajax({
            type: "post",
            data: {
                order_no: e,
                order_dt: a
            },
            url: oneshop_url + "/orders/mystore_Myorders_list/" + s,
            success: function(e) {
                var s = e.trim();
                $("#orders_div").html(s)
            }
        })
    })
});
