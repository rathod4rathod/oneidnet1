    $("#repre_submit").click(function () {
        if ($(this).attr('id') == "repre_submit") {
            var inputChk = 'repre_mail';
            var errtype = "repre_err_";
        }
        var objClickID = $(this).attr('id');
        //Diasbled Submission 
        $("#"+objClickID).prop('disabled', true);
        // $("#"+proc_load).css("display","inline");

        var error = 0;
        var valid_email = "";
        var inps = document.getElementsByName(inputChk);
        // alert(inps.length);

        for (var i = 0; i <inps.length; i++) {
            var inp=inps[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "redfoucusclass";
                    document.getElementById(errtype+0).innerHTML = "Please Enter Email";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      // $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "";
                   if(valid_email == "")
                       valid_email = inp.value;
                }
        }        

        if (error == 10) {
            $("#"+objClickID).removeAttr("disabled");
            return false;
        }
        $.ajax({
            type: 'POST',
            url: oneidnet_url+"home/valid_repre_checking",
            data: { emails: valid_email} ,
            success: function (data) {
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
                    $.ajax({
                        type: 'POST',
                        url: oneidnet_url+"home/add_repre_insertion",
                        data: { email: valid_email} ,
                        success: function (data) {
                            if($.trim(data) == "REPRESENTATVE_INSERTED"){
                                location.reload();
                            }
                        }
                            
                    });
                }

                if($.trim(data) == "EXISTING_USER"){
                    alert('E-Mail Already Exist.')
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