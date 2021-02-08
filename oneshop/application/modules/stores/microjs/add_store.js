$("#store_reg_form").submit(function () {
    
        var error = 0;
        var osdev_store_name = $("#osdev_store_name").val();
        var osdev_store_address=$("#osdev_store_address").val();
        var osdev_Country = $("#osdev_Country").val();
        var osdev_State = $("#osdev_State").val();
        var osdev_City = $("#osdev_City").val();
        var osdev_Zipcode = $("#osdev_Zipcode").val();
//        var osdev_Enquirymobilenumber = $("#osdev_Enquirymobilenumber").val();
//        var osdev_ServiceEmail = $("#osdev_ServiceEmail").val();
        var osdev_PackageType = $("#osdev_PackageType").val();
//        var osdev_Time_Zone = $("#Time_Zone").val();
        var osdev_Curency = $("#Currency").val();
//        var osdev_Delivery_Mode = $("#osdev_Delivery_Mode").val();
        var osdev_PackagePeriod = $("#osdev_PackagePeriod").val();
        
        if (is_Empty(osdev_store_name) != true) {
            $("#osdev_store_name").addClass("redfoucusclass");
            error = 10;
        } else {
            if(/^[ A-Za-z0-9_@./#&+-]/.test(osdev_store_name) == false) {
                //alert('Your search string contains illegal characters.');
                $("#osdev_store_name").addClass("redfoucusclass");
                error = 10;
            }else{
                 $("#osdev_store_name").removeClass("redfoucusclass");
            }
           
        }
        
        if (is_Empty(osdev_Country) != true) {
            $("#osdev_Country").addClass("redfoucusclass");
            error = 10;
        } else {
            $("#osdev_Country").removeClass("redfoucusclass");
        }
        
        if(osdev_State != null){
            if (is_Empty(osdev_State) != true) {
                $("#osdev_State").addClass("redfoucusclass");
                error = 10;
            } else {
                $("#osdev_State").removeClass("redfoucusclass");
            }
        }
        
        if(osdev_State != null){
            if (is_Empty(osdev_City) != true) {
                $("#osdev_City").addClass("redfoucusclass");
                error = 10;
            } else {
                $("#osdev_City").removeClass("redfoucusclass");
            }
        }
        
        if (is_Empty(osdev_Zipcode) != true || osdev_Zipcode % 1 != 0 || osdev_Zipcode.length < 6) {
            $("#osdev_Zipcode").addClass("redfoucusclass");
            error = 10;
        } else {
            //$("#osdev_Zipcode").removeClass("redfoucusclass");
             if(/^[0-9]+$/.test(osdev_Zipcode) == false) {
                $("#osdev_Zipcode").addClass("redfoucusclass");
                error = 10;
            }else{
                 $("#osdev_Zipcode").removeClass("redfoucusclass");
            }
        }
                
    
        if (is_Empty(osdev_Curency) != true) {
            $("#Currency").addClass("redfoucusclass");
            error = 10;
        } else {
            $("#Currency").removeClass("redfoucusclass");
        }
       
        if (is_Empty(osdev_PackageType) != true) {
            $("#osdev_PackageType").addClass("redfoucusclass");
            error = 10;
        } else {
            $("#osdev_PackageType").removeClass("redfoucusclass");
        }
        
         if (is_Empty(osdev_PackagePeriod) != true) {
            $("#osdev_PackagePeriod").addClass("redfoucusclass");
            error = 10;
        } else {
            $("#osdev_PackagePeriod").removeClass("redfoucusclass");
        }
               
        if (error == 10) {
            return false;
        }
        
        //Getting base url
        var baseurl = $.trim($("#baseurl").val());
        $.ajax({
            type: 'POST',
            url: oneshop_url+"/stores/stores_creation",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                if($.trim(data) == "already_created"){
                    alert("Store Name is not available, Please choose some other name.");
                    return false;
                }else{
                    var storeCode = $.trim(data);
                    location.replace(baseurl+"store_home/"+storeCode);
                }
            }
        });
        return false;
    });
    
    function is_Empty(s_data) {
        if (s_data.length < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    function isValid_Email(s_data) {
        var regx_emails = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z-]+(\.[a-z-]+)*(\.[a-z]{2,4})$/;
        var flag = false;
        if (s_data.match(regx_emails)) {
            flag = true;
        }
        return flag;
    }
    //
    
    //Edit Store
    $("#edit_store_form").submit(function () {
//<!--Edited by mitesh - store_form editable -->
        //Getting base url
        var baseurl = $.trim($("#baseurl").val());
        //Getting Store Code
        var store_code = $.trim($("#store_code").val());
        var enquiry_number = $.trim($("#enquiry_number").val());
        var store_name = $.trim($("#store_name").val());
        var delivery_mode = $.trim($("#delivery_mode").val());
        var currency = $.trim($("#currency_store").val());
        var agreement = $.trim($("#store_agreement").val());
        if(enquiry_number != ""){
            if (is_Empty(enquiry_number) != true || enquiry_number % 1 != 0 || enquiry_number.length < 8) {
                $("#enquiry_number").addClass("redfoucusclass");
                return false;
            } else {
                $("#enquiry_number").removeClass("redfoucusclass");
            }
        }
        
        if (is_Empty(delivery_mode) != true) {
            $("#delivery_mode").addClass("redfoucusclass");
            return false;
        } else {
            $("#delivery_mode").removeClass("redfoucusclass");
        }
        if (is_Empty(agreement) != true) {
            edit_element_details("store_agreement");
            $("#store_agreement").addClass("redfoucusclass");
            return false;
        } else {
            $("#store_agreement").removeClass("redfoucusclass");
        }
        if (is_Empty(store_name) != true) {
            $("#store_name").addClass("redfoucusclass");
            return false;
        } else if(/^[ A-Za-z0-9_@./#&+-]/.test(store_name) == false) {
                //alert('Your search string contains illegal characters.');
            $("#store_name").addClass("redfoucusclass");
            return false;
        }
        else
        {
            $("#store_name").removeClass("redfoucusclass");
        }
       
       
        
        //Right side services drop down all selected
        $("#right_services option").prop("selected", true);
        //function callFormAJAX(url, parameters, successCallback, beforeSendCallback, completeCallback ) {
        callFormAJAX(oneshop_url+"/stores/stores_updation",new FormData(this),function(data){
            alert(data);
        });
        /*$.ajax({
            type: 'POST',
            url: oneshop_url+"/stores/stores_updation",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                if($.trim(data) == "Updated Successfully"){
                    location.replace(baseurl+"edit_store/"+store_code+"/1");
                }
            }
        });*/
        return false;
    });
//Edit store js functionalities    
function cancel_edit(){
  //Getting base url
  var baseurl = $.trim($("#baseurl").val());
  //Getting Store Code
  var store_code = $.trim($("#store_code").val());
  location.replace(baseurl+"edit_store/"+store_code);
 }

 function ChangeSubstore(val){
     $.ajax({
       type: 'POST',
       url: oneshop_url+"/home/json_store_category_check?cat_check="+val,
       success:function(data){
         $("#dyn_sec_category").html(data);
       }
     });
 }

 function tag_store(val){
     $("#add_tag_cat").css("display", val);
 }

 function moveService(val){
    if(val == "LtoR"){
      edit_element_details("services");
      $("#left_services option:selected").remove().appendTo("#right_services");
    }else{
      $("#right_services option:selected").remove().appendTo("#left_services");
    }
 }

function edit_element_details(obj){
//<!--Edited by mitesh - edit element for currency & store_name editable -->
    //   alert(obj);
     $("#save_span_top").css("display", "inline");
     $("#save_span").css("display", "inline");
     if(obj == "store_logo"){
        $("#edit_logo_span").css("display", "inline");
        $("#edit_logo_disp_span").css("display", "none");
     }else if(obj == "store_about"){
        $("#about_ta_span").css("display", "inline");
        $("#about_disp_span").css("display", "none");
     }else if(obj == "store_privacy_policy"){
        $("#policy_ta_span").css("display", "inline");
        $("#policy_disp_span").css("display", "none");
     }else if(obj == "store_cancellation_policy"){
        $("#canc_policy_ta_span").css("display", "inline");
        $("#canc_policy_disp_span").css("display", "none");
     }else if(obj == "enquiry_number"){
        $("#enquiry_ta_span").css("display", "inline");
        $("#enquiry_disp_span").css("display", "none");
     }else if(obj == "delivery_mode"){
        $("#delivery_ta_span").css("display", "inline");
        $("#delivery_disp_span").css("display", "none");
     }else if(obj=="service_email"){
        $("#email_ta_span").css("display", "inline");
        $("#email_disp_span").css("display", "none");
     }else if(obj=="timezone"){
       $("#tzone_ta_span").css("display", "inline");
       $("#tzone_disp_span").css("display", "none");
     }else if(obj=="store_name"){
        $("#name_ta_span").css("display", "inline");
        $("#name_disp_span").css("display", "none");
      }else if(obj=="register_number"){
       $("#register_number_name_ta_span").css("display", "inline");
       $("#register_number_name_disp_span").css("display", "none");
     }else if(obj=="registration_expiration_date"){
        $("#registration_expiration_date_name_ta_span").css("display", "inline");
        $("#registration_expiration_date_name_disp_span").css("display", "none");
      }else  if(obj=="currency"){
       $("#curr_ta_span").css("display", "inline");
       $("#curr_disp_span").css("display", "none");
     }else if(obj=="store_security_policy"){
       $("#sec_policy_ta_span").css("display", "inline");
       $("#sec_policy_disp_span").css("display", "none");
     }else if(obj=="store_secure_policy"){
       $("#secure_policy_ta_span").css("display", "inline");
       $("#secure_policy_disp_span").css("display", "none");
     }else if(obj=="store_return_policy"){
       $("#rtn_policy_ta_span").css("display", "inline");
       $("#rtn_policy_disp_span").css("display", "none");
     }else if(obj=="store_agreement"){
       $("#agre_policy_ta_span").css("display", "inline");
       $("#agre_policy_disp_span").css("display", "none");
     }else if(obj=="store_del_policy"){
       $("#del_policy_ta_span").css("display", "inline");
       $("#del_policy_disp_span").css("display", "none");
     }else if(obj=="crd_policy"){
       $("#crd_policy_ta_span").css("display", "inline");
       $("#crd_policy_disp_span").css("display", "none");
     }

  }