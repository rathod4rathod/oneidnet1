    $("#support_submit").click(function () {
        if ($(this).attr('id') == "support_submit") {
            var inputChk = 'support_email';
            var inputChk1 = 'support_module';
            var inputChk4 = 'support_type';
            var inputChk5 = 'support_type1';
            var inputChk2 = 'support_usename';
            var inputChk3 = 'support_pass';
            var errtype = "support_err_";
        }
        var objClickID = $(this).attr('id');
        //Diasbled Submission 
        $("#"+objClickID).prop('disabled', true);
        // $("#"+proc_load).css("display","inline");

        var error = 0;
        var valid_mail = "";
        var valid_module = "";
        var valid_type = "";
        var valid_type1 = "";
        var valid_username = "";
        var valid_pass = "";
        var inps = document.getElementsByName(inputChk);
        var inps1 = document.getElementsByName(inputChk1);
        var inps2 = document.getElementsByName(inputChk2);
        var inps3 = document.getElementsByName(inputChk3);
        var inps4 = document.getElementsByName(inputChk4);
        var inps5 = document.getElementsByName(inputChk5);
        // alert(inps.length);

        for (var i = 0; i <inps4.length; i++) {
            var inp=inps4[i];
            if(is_Empty(inp.value) == true){
                // inp.className = "";
                if(valid_type == "")
                    valid_type = inp.value;
            }
        }

        for (var i = 0; i <inps5.length; i++) {
            var inp=inps5[i];
            if(is_Empty(inp.value) == true){
                inp.className = "";
                if(valid_type1 == "")
                    valid_type1 = inp.value;
            }
        }

        for (var i = 0; i <inps.length; i++) {
            var inp=inps[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+0).innerHTML = "Please Enter E-mail of user";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      // $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_mail == "")
                       valid_mail = inp.value;
                }
        }

        for (var i = 0; i <inps1.length; i++) {
            var inp=inps1[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+1).innerHTML = "Please Enter Module Name";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      // $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_module == "")
                       valid_module = inp.value;
                }
        }

        for (var i = 0; i <inps2.length; i++) {
            var inp=inps2[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+2).innerHTML = "Please Enter Support Username";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      // $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_username == "")
                       valid_username = inp.value;
                }
        }

        for (var i = 0; i <inps3.length; i++) {
            var inp=inps3[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+3).innerHTML = "Please Enter Support Password";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      // $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_pass == "")
                       valid_pass = inp.value;
                }
        }

        if (error == 10) {
            $("#"+objClickID).removeAttr("disabled");
            return false;
        }

        // var invalidArr = "";
        // var validArr = "";
        // var validupdateArr = "";
        $.ajax({
            type: 'POST',
            url: oneidnet_url+"home/valid_support_checking",
            data: { emails: valid_mail} ,
            success: function (data) {
                if($.trim(data) == "VALID_UPDATE"){
                }

                if($.trim(data) == "INVALID_USER"){
                    for (var i = 0; i <inps.length; i++) {
                        var inp=inps[i];
                        inp.className = "redfoucusclass";
                        document.getElementById(errtype+0).innerHTML = "Invalid Email";
                                //Enabled Submission 
                        $("#"+objClickID).removeAttr("disabled");
                        inp.focus();
                    }
                }
                         
                if($.trim(data) == "VALID"){
                    if(inps4 != ""){
                        $.ajax({
                            type: 'POST',
                            url: oneidnet_url+"home/valid_support_insertion",
                            data: { email: valid_mail, module: valid_module, type: valid_type, username: valid_username, pass: valid_pass} ,
                            success: function (data) {
                                if($.trim(data) == "SUPPORT_INSERTED"){
                                    location.reload();
                                }
                            }
                        });
                    }else if(inps5 != ""){
                        $.ajax({
                            type: 'POST',
                            url: oneidnet_url+"home/valid_support_insertion",
                            data: { email: valid_mail, module: valid_module, type: valid_type1, username: valid_username, pass: valid_pass} ,
                            success: function (data) {
                                if($.trim(data) == "SUPPORT_INSERTED"){
                                    location.reload();
                                }
                            }
                        });
                    }else {
                        $.ajax({
                            type: 'POST',
                            url: oneidnet_url+"home/valid_support_insertion",
                            data: { email: valid_mail, module: valid_module, username: valid_username, pass: valid_pass} ,
                            success: function (data) {
                                if($.trim(data) == "SUPPORT_INSERTED"){
                                    location.reload();
                                }
                            }
                        });
                    }
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