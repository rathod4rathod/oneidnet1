    $("#call_submit").click(function () {
        if ($(this).attr('id') == "call_submit") {
            var inputChk = 'promo_type';
            var inputChk1 = 'promo_title';
            var inputChk2 = 'promo_msg';
            var inputChk3 = 'fromDate';
            var inputChk4 = 'endDate';
            var errtype = "staff_err_";
            var proc_load = "add_load";
        }

        var objClickID = $(this).attr('id');
        //Diasbled Submission 
        $("#"+objClickID).prop('disabled', true);
        $("#"+proc_load).css("display","inline");

        var error = 0;
        var valid_type = "";
        var valid_title = "";
        var valid_msg = "";
        var valid_fdate = "";
        var valid_edate = "";
        var inps = document.getElementsByName(inputChk);
        var inps1 = document.getElementsByName(inputChk1);
        var inps2 = document.getElementsByName(inputChk2);
        var inps3 = document.getElementsByName(inputChk3);
        var inps4 = document.getElementsByName(inputChk4);
        // alert(inps.length);
        for (var i = 0; i <inps.length; i++) {
            var inp=inps[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "oneshop_nosize input redfoucusclass";
                    document.getElementById(errtype+0).innerHTML = "Please Select Sale Type";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "oneshop_nosize input";
                   if(valid_type == "")
                       valid_type = inp.value;
                }
        }

        for (var i = 0; i <inps1.length; i++) {
            var inp=inps1[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "oneshop_nosize input redfoucusclass";
                    document.getElementById(errtype+1).innerHTML = "Please enter title of sale";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "oneshop_nosize input";
                   if(valid_title == "")
                       valid_title = inp.value;
                }
        }

        for (var i = 0; i <inps2.length; i++) {
            var inp=inps2[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "oneshop_setspecified_textareabox input redfoucusclass";
                    document.getElementById(errtype+2).innerHTML = "Please enter message for sale";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "oneshop_setspecified_textareabox input";
                   if(valid_msg == "")
                       valid_msg = inp.value;
                }
        }

        for (var i = 0; i <inps3.length; i++) {
            var inp=inps3[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "input redfoucusclass";
                    document.getElementById(errtype+3).innerHTML = "Please select sale start date";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "input";
                   if(valid_fdate == "")
                       valid_fdate = inp.value;
                }
        }

        for (var i = 0; i <inps4.length; i++) {
            var inp=inps4[i];
            if(is_Empty(inp.value) != true){
                    inp.className = "input redfoucusclass";
                    document.getElementById(errtype+4).innerHTML = "Please select sale end date";
                     //Enabled Submission 
                      $("#"+objClickID).removeAttr("disabled");
                      $("#"+proc_load).css("display","none");
                    inp.focus();
                    error = 10;
                } else {
                   inp.className = "input";
                   if(valid_edate == "")
                       valid_edate = inp.value;
                }
        }

        var store_code = $.trim($("#store_code").val());
        $.ajax({
            type: 'POST',
            url: oneshop_url+"/stores/sale_posting",
            data: { store_code : store_code, type: valid_type, title : valid_title, msg : valid_msg, fdate : valid_fdate, edate : valid_edate} ,
            success: function (data) {
                if($.trim(data) == "done"){
                    location.reload();
                }
            }
        });

    });