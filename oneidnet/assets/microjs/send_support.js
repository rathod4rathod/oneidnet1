    $("#user_submit").click(function () {
        if ($(this).attr('id') == "user_submit") {
            var inputChk = 'supp_module';
            var inputChk1 = 'supp_type';
            var inputChk2 = 'supp_subject';
            var inputChk3 = 'supp_message';
            var errtype = "user_err_";
        }
        var objClickID = $(this).attr('id');
        //Diasbled Submission 
        $("#"+objClickID).prop('disabled', true);
        // $("#"+proc_load).css("display","inline");

        var error = 0;
        var valid_sub = "";
        var valid_msg = "";
        var valid_module = "";
        var valid_type = "";
        var inps = document.getElementsByName(inputChk);
        var inps1 = document.getElementsByName(inputChk1);
        var inps2 = document.getElementsByName(inputChk2);
        var inps3 = document.getElementsByName(inputChk3);
        // alert(inps.length);

        for (var i = 0; i <inps.length; i++) {
            var inp=inps[i];
            if(is_Empty(inp.value) == true){
                // inp.className = "";
                if(valid_module == "")
                    valid_module = inp.value;
            }
        }

        for (var i = 0; i <inps1.length; i++) {
            var inp=inps1[i];
            if(is_Empty(inp.value) == true){
                inp.className = "";
                if(valid_type == "")
                    valid_type = inp.value;
            }
        }

        for (var i = 0; i <inps2.length; i++) {
            var inp=inps2[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+0).innerHTML = "Please Enter Subject";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      // $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_sub == "")
                       valid_sub = inp.value;
                }
        }

        for (var i = 0; i <inps3.length; i++) {
            var inp=inps3[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+1).innerHTML = "Please Enter Your Message";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      // $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_msg == "")
                       valid_msg = inp.value;
                }
        }
        

        if (error == 10) {
            $("#"+objClickID).removeAttr("disabled");
            return false;
        }

        $.ajax({
            type: 'POST',
            url: oneidnet_url+"home/user_support_insertion",
            data: { type: valid_type, module: valid_module, sub: valid_sub, msg: valid_msg} ,
            success: function (data) {

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