    //Staff save based on selectors
    $("#save_staff_detail").click(function () {
        if ($(this).attr('id') == "save_staff_detail") {
            var inputChk = 'add_fname';
            var inputChk1 = 'add_lname';
            var inputChk2 = 'add_position';
            var inputChk3 = 'add_mail';
            var inputChk4 = 'add_sloc';
            var inputChk5 = 'add_sbio';
            var inputChk6 = 'staff_wy';
            var inputChk7 = 'staff_wm';
            var errtype = "staff_err_";
            var proc_load = "add_load";
        }
    
        var objClickID = $(this).attr('id');
        //Diasbled Submission 
        $("#"+objClickID).prop('disabled', true);
        $("#"+proc_load).css("display","inline");

        var error = 0;
        var valid_fname = "";
        var valid_lname = "";
        var valid_order_emails = "";
        var valid_position = "";
        var valid_sloc = "";
        var valid_sbio = "";
        var valid_syear = "";
        var valid_smonth = "";
        var inps = document.getElementsByName(inputChk);
        var inps1 = document.getElementsByName(inputChk1);
        var inps2 = document.getElementsByName(inputChk2);
        var inps3 = document.getElementsByName(inputChk3);
        var inps4 = document.getElementsByName(inputChk4);
        var inps5 = document.getElementsByName(inputChk5);
        var inps6 = document.getElementsByName(inputChk6);
        var inps7 = document.getElementsByName(inputChk7);
        // alert(inps.length);
        for (var i = 0; i <inps.length; i++) {
            var inp=inps[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "wi100pstg redfoucusclass";
                    document.getElementById(errtype+0).innerHTML = "Please Enter First Name";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "wi100pstg";
                   if(valid_fname == "")
                       valid_fname = inp.value;
                }
        }

        for (var i = 0; i <inps1.length; i++) {
            var inp=inps1[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "wi100pstg redfoucusclass";
                    document.getElementById(errtype+1).innerHTML = "Please Enter Last Name";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "wi100pstg";
                   if(valid_lname == "")
                       valid_lname = inp.value;
                }
        }

        for (var i = 0; i <inps2.length; i++) {
            var inp=inps2[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "wi100pstg redfoucusclass";
                    document.getElementById(errtype+2).innerHTML = "Please Select Staff Responsibility";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "wi100pstg";
                   if(valid_position == "")
                       valid_position = inp.value;
                }
        }

        for (var i = 0; i <inps3.length; i++) {
            var inp=inps3[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "wi100pstg redfoucusclass";
                    document.getElementById(errtype+3).innerHTML = "Please Enter Email";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "wi100pstg";
                   if(valid_order_emails == "")
                       valid_order_emails = inp.value;
                }
        }

        for (var i = 0; i <inps4.length; i++) {
            var inp=inps4[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "wi100pstg redfoucusclass";
                    document.getElementById(errtype+4).innerHTML = "Please Enter Store Location";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "wi100pstg";
                   if(valid_sloc == "")
                       valid_sloc = inp.value;
                }
        }

        for (var i = 0; i <inps5.length; i++) {
            var inp=inps5[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "wi100pstg redfoucusclass";
                    document.getElementById(errtype+5).innerHTML = "Please Enter About Staff";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "wi100pstg";
                   if(valid_sbio == "")
                       valid_sbio = inp.value;
                }
        }

        for (var i = 0; i <inps6.length; i++) {
            var inp=inps6[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+6).innerHTML = "Please Enter Number of Years Working in Store";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_syear == "")
                       valid_syear = inp.value;
                }
        }

        for (var i = 0; i <inps7.length; i++) {
            var inp=inps7[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+7).innerHTML = "Please Enter Number of Month Working in Store";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_smonth == "")
                       valid_smonth = inp.value;
                }
        }


        if (error == 10) {
           //Enabled Submission 
            $("#"+objClickID).removeAttr("disabled");
            $("#"+proc_load).css("display","none");
            return false;
        }

        //Getting base url
        var baseurl = $.trim($("#baseurl").val());
        var store_code = $.trim($("#store_code").val());
        var s_user_id = $.trim($("#suser_id").val());
        var invalidArr = new Array();
        var existArr = new Array();
        var validArr = new Array();
        var validupdateArr = new Array();
        $.ajax({
            type: 'POST',
            url: oneshop_url+"/stores/valid_staff_checking",
            data: { order_emails: valid_order_emails, store_code : store_code, profile_save_id : s_user_id} ,
            success: function (data) {
                var json_res = $.parseJSON(data);
                var k = 0;
                $.each(json_res, function(key, val) {
                    if(val == "VALID_UPDATE"){
                        validupdateArr[k] = key;
                        k++;
                    }

                    if(val == "INVALID_USER"){
                        invalidArr[k] = key;
                        k++;
                    }

                    if(val == "EXISTING_STAFF_USER"){
                        existArr[k] = key;
                        k++;
                    }
                     
                    if(val == "VALID"){
                        validArr[k] = key;
                        k++;
                    }
                });
                
               
                if(invalidArr.length > 0){
                     for (var i = 0; i <inps3.length; i++) {
                        var inp=inps3[i];
                        
                        if(jQuery.inArray( inp.value, invalidArr )  !== -1){
                            inp.className = "oneshop_productfield_textbox redfoucusclass";
                            document.getElementById(errtype+3).innerHTML = "Invalid Email";
                            //Enabled Submission 
                            $("#"+objClickID).removeAttr("disabled");
                            $("#"+proc_load).css("display","none");
                            inp.focus();
                        }
                     }
                }
                
                if(existArr.length > 0){
                     for (var i = 0; i <inps3.length; i++) {
                        var inp=inps3[i];
                        
                        if(jQuery.inArray( inp.value, existArr )  !== -1){
                            inp.className = "oneshop_productfield_textbox redfoucusclass";
                            document.getElementById(errtype+3).innerHTML = "Email Id already existing in the system";
                            //Enabled Submission 
                            $("#"+objClickID).removeAttr("disabled");
                            $("#"+proc_load).css("display","none");
                            inp.focus();
                        }
                     }
                }
                
                if(invalidArr.length == 0 && existArr.length == 0 && validArr.length > 0 && validupdateArr == 0){ 
                    $.ajax({
                        type: 'POST',
                        url: oneshop_url+"/stores/valid_staff_insertion",
                        data: { fname: valid_fname, lname: valid_lname, sloc: valid_sloc, sbio: valid_sbio, syear: valid_syear, smonth: valid_smonth, emails: valid_order_emails, store_code : store_code, role_type: valid_position} ,
                        success: function (data) {
                            if($.trim(data) == "STAFF_INSERTED"){
                                location.reload();
                            }
                        }
                    });
                }
                else
                {
                  $.ajax({
                        type: 'POST',
                        url: oneshop_url+"/stores/valid_staff_insertion",
                        data: { update: "update", fname: valid_fname, lname: valid_lname, sloc: valid_sloc, sbio: valid_sbio, syear: valid_syear, smonth: valid_smonth, emails: valid_order_emails, store_code : store_code, role_type: valid_position} ,
                        success: function (data) {
                            if($.trim(data) == "STAFF_UPDATED"){
                                location.reload();
                            }
                        }
                    });
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