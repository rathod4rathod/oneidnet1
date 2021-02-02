


<h4>Manage Staff</h4>
<?php
$a=1;
if ($store_info[0]["package"] != "Basic") {
    ?>

<?php  foreach ($staff_info as $staff_info_f) {
   // print_R($staff_info_f["order_manager_emails"][0]["first_name"]);
    // print_R($staff_info_f["store_manager_emails"][0]["first_name"]);
    //   echo "<pre>"; print_R($staff_info_f["order_manager_emails"]);echo "</pre>";
    //  echo "<pre>";print_R($staff_info_f["store_manager_emails"]);echo "</pre>";
    ?>

  <div id="manage_staff_main_append">
        <div id="manage_staff_main<?php echo $a; ?>">
            <div class="oneshop_mystoreSettinsField">
                <span class="onshop_formsFieldLables"><h5>Order Manager :</h5></span>                        
                <input type="text" class="oneshop_mystoreField" placeholder="Order Manager Email" name="order_manager" id="order_manager_id<?php echo $a; ?>" value="<?php echo $staff_info_f["order_manager_emails"][0]["email"] ?>">
                <span class="order_Manager" id="order_Manager_error1" style="">Invalid Email</span>   
            </div>     
            <div class="oneshop_mystoreSettinsField">
                <span class="onshop_formsFieldLables"><h5>Stock Manager :</h5></span>                        
                <input type="text" class="oneshop_mystoreField" placeholder="Stock Manager Email" name="stock_manager"id="stock_manager_id<?php echo $a; ?>" value="<?php echo $staff_info_f["store_manager_emails"][0]["email"] ?>">
                <span class="order_Manager" id="stock_Manager_error1" style="">Invalid Email</span>   
            </div>

        </div>
    </div>

             <?php
             $a=$a+1;
  }
  ?>
  
    <button class="oneshop_basicInfoBtn" id="mystaff_edit_save">Save</button>
    <button class="oneshop_basicInfoBtn" id="mystaff_edit_cancel">Cancel</button>
    <button class="oneshop_basicInfoBtn" id="manage_staffE_remove" style="<?php if(count($staff_info)==2){ echo "display:block"; } else{ echo "display:none"; }?>">Remove</button>
    <?php if ($store_info[0]["package"] != "Premium") {
      ?>
      <button class="oneshop_basicInfoBtn" id="add_edit_staff"> + Add Person</button>
      <?php
    }
    ?>

    <?php
  } else {
    echo "<br><br><br><h2>This service not available for Basic package Users </h2>";
  }
  ?>

      <script>
        $("#mystaff_edit_cancel").click(function (){
          
           $("#manage_staff_div").load(oneshop_url +"/home/staf_detail_view/"+$("#stuid").val());
        });
        
        
        
            //05-june-2015 by venkatesh: this function using for  clone the form fields in manage staff form
    var counter = "<?php echo count($staff_info)+1; ?>";
    $("#add_edit_staff").click(function () {
        if (counter < 3)
        {
            var data = ' <div id="manage_staff_main' + counter + '"><div class="oneshop_mystoreSettinsField">' +
                    '<span class="onshop_formsFieldLables"><h5>Order Manager :</h5></span>' +
                    '<input type="text" class="oneshop_mystoreField" placeholder="Order Manager Email" name="order_manager" id="order_manager_id' + counter + '">' +
                    '<span class="order_Manager" id="order_Manager_error' + counter + '" style="">Email not Exist</span>' +
                    '</div>' +
                    '<div class="oneshop_mystoreSettinsField">' +
                    '<span class="onshop_formsFieldLables"><h5>Stock Manager :</h5></span>' +
                    '<input type="text" class="oneshop_mystoreField" placeholder="Stock Manager Email" name="stock_manager"id="stock_manager_id' + counter + '">' +
                    ' <span class="order_Manager" id="stock_Manager_error' + counter + '" style="">Email not Exist</span>' +
                    '</div></div>';
            $("#manage_staff_main_append").append(data);
            counter++;
        }



        if (counter == 3 || counter == 2)
        {
            $("#manage_staffE_remove").show();
        }

    });
    //05-june-2015 by venkatesh
    $("#manage_staffE_remove").click(function () {
        counter--;
        //   alert(counter);
        if (counter >= 2)
        {
            $("#manage_staff_main" + counter + "").remove();
        }
        if (counter == 2)
        {
            $("#manage_staffE_remove").hide();
        }

    });
    
    
        //05-june-2015 by venkatesh : this function send mystaff form data to staff_insertion on store controller
    $("#mystaff_edit_save").click(function () {
        var error = 0;
        for (i = 1; i < counter; i++) {
            var email_val = ajaxcallback1($("#order_manager_id" + i + "").val());

            if (email_val == 2) {
                $("#order_manager_id" + i + "").addClass("redfoucusclass");
                $("#order_Manager_error" + i + "").show();
                error = 10;
            } else {
                $("#order_manager_id" + i + "").removeClass("redfoucusclass");
                $("#order_Manager_error" + i + "").hide();
            }
        }
        for (i = 1; i < counter; i++) {
            var email_val = ajaxcallback1($("#stock_manager_id" + i + "").val());

            if (email_val == 2) {
                $("#stock_manager_id" + i + "").addClass("redfoucusclass");
                $("#stock_Manager_error" + i + "").show();
                error = 10;
            } else {
                $("#stock_manager_id" + i + "").removeClass("redfoucusclass");
                $("#stock_Manager_error" + i + "").hide();
            }
        }
        if (error == 10) {
            return false;
        }
        var send_data = "";
        for (var i = 1; i <= counter; i++) {
            var j = i - 1;
            if (i == 1) {
                send_data = "STORE_ID=" + $("#STORE_ID").val();
                +"&order_manager_id" + j + "=" + $("#order_manager_id" + j + "").val() + "&stock_manager_id" + j + "=" + $("#stock_manager_id" + j + "").val();
            } else {
                send_data += "&order_manager_id" + j + "=" + $("#order_manager_id" + j + "").val() + "&stock_manager_id" + j + "=" + $("#stock_manager_id" + j + "").val();
            }
        }
        $.ajax({
            async: false,
            type: 'POST',
            data: send_data,
            url: oneshop_url + "/stores/staff_insertion",
            success: function (data) {
                if (data == 1)                {
                    location.reload();
                }
            }});
    });
    var value;

    function ajaxcallback1(val) {
        $.ajax({
            async: false,
            type: 'POST',
            data: {email: val},
            url: oneshop_url + "/stores/email_check",
            success: function (data) {
                value = data;
            }});
        return value;
    }
      </script>