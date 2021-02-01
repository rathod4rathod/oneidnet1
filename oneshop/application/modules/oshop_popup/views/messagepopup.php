<script type="text/javascript" src="<?php echo base_url().'assets/microjs/validation.js'?>"></script>
<div class="click_popUp" id="sendmessage" style="display: none;">
    <div class="click_createGroupPopUpWrapper">
        <a href="javascript: void(0)"  onClick="message_popUpVisibility('sendmessage');">
            <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>
<!--        <form  id="messagePopUp_form">-->
            <div class="np_newpopuup_bgcontainer">

                <div class="np_popupheadingnew_box"><h4> Compose message </h4></div>
                <?php // echo "<pre>"; print_r($oshop_connections); echo "</pre>";?>
                <?php
                if ($oshop_connections != 0) {
                  ?>
                  <div class="np_popupcontainer_middlebox">

                      <div class="fll wi100pstg mab5">
                          <p class="fs14"> To </p>

                          <select id="connectids" multiple="multiple" class="tokenize-sample block_user_id oneshop_compose_selectbox">
                              <?php foreach ($oshop_connections as $oshop_connections_data) {
                                ?>
                                <option value="<?php echo $oshop_connections_data["associated_id_fk"]; ?>"><?php echo $oshop_connections_data["profile_name"]; ?></option>
                              <?php }
                              ?>

                          </select>

                          <span id="connectids_error"></span>
                          <div id="to_field">
                              <ul id="removeConfirmationTags">
                              </ul></div>
                           <!--   <p> <input type="text"  name="report_problem_title" class="np_popupcontainer_inputfield_box"> </p>-->
                      </div>
                      <input type="hidden" name = 'msg_recipient' id ='msg_recipient'>
                      <div class="fll wi100pstg np_des_mat15 mab5">
                          <p class="fs14">  Subject </p>
                          <p> <input type="text"  name="report_problem_title" class="oneshop_compose_subject" id="subject"> </p>
                          <span id="subject_error"></span>
                      </div>

                      <div class="fll wi100pstg np_des_mat15">
                          <p class="fs14">  Message </p>
                          <p> <textarea class="oneshop_compose_textarea"  id="message"></textarea> </p>
                          <span id="message_error"></span>
                      </div>
                      <div class="fll wi100pstg np_des_mat15">
                          <strong style="color:green;display:none" id="m_s_r">Message successfully sent</strong>
                      </div>

                      <p class="flr np_des_mat10">
                          <button class="np_des_addaccess_btn_save" id="send_msg_btn">Send</button>
                      </p>

                  </div>
                  <?php
                } else {
                  echo "<div style='padding:30px;'><h3 style='color:green'>Connections not found</h3></div>";
                }
                ?>

            </div>


<!--        </form>-->
    </div>
</div>

<div class="click_popUp" id="sendmessage_profile" style="display: none;">
    <div class="click_createGroupPopUpWrapper">
        <a href="javascript: void(0)"  onClick="message_popUpVisibility_profile('sendmessage_profile');">
            <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>
<!--        <form  id="messagePopUp_form">-->
            <div class="np_newpopuup_bgcontainer">

                <div class="np_popupheadingnew_box"><h4> Compose message to <span id="profile_name"></span></h4></div>
                 <div class="np_popupcontainer_middlebox">

                      <input type="hidden" name = 'msg_recipient' id ='msg_recipient_profile' value="">
                      <div class="fll wi100pstg np_des_mat15 mab5">
                          <p class="fs14">  Subject </p>
                          <p> <input type="text"  name="report_problem_title" class="oneshop_compose_subject" id="subject_profile"> </p>
                          <span id="subject_error_profile"></span>
                      </div>

                      <div class="fll wi100pstg np_des_mat15">
                          <p class="fs14">  Message </p>
                          <p> <textarea class="oneshop_compose_textarea"  id="message_profile"></textarea> </p>
                          <span id="message_error_profile"></span>
                      </div>
                      <div class="fll wi100pstg np_des_mat15">
                          <strong style="color:green;display:none" id="m_s_r_profile">Message successfully sent</strong>
                      </div>

                      <p class="flr np_des_mat10">
                          <button class="np_des_addaccess_btn_save" id="send_msg_btn_profile">Send</button>
                      </p>

                  </div>
                  

            </div>


<!--        </form>-->
    </div>
</div>
<script>

  $('#connectids').tokenize();
  $("#send_msg_btn").click(function () {
      $('*').removeClass("redfoucusclass");
      $("span[id$='_error']").html("");
      var connectids = $.trim($('#connectids').val());
      var subject = $.trim($('#subject').val());
      var message = $.trim($('#message').val());
      var error = 0;

      if (connectids == "") {
          $('#connectids').addClass("redfoucusclass");
          error = 10;
      }
      if (subject == "") {
          $('#subject').addClass("redfoucusclass");
          $('#subject_error').html("Please enter Subject");
          error = 10;
      }
      else{
        if(alphaNumericWithHyphenDotSpace(subject)===false){
          $('#subject').addClass("redfoucusclass");
          $('#subject_error').html("Subject field allows alphanumeric with Hyphen(-),period(.) and space only");
          error = 10;
        }
      }
      if (message == "") {
          $('#message').addClass("redfoucusclass");
          $('#message_error').html("Please enter some value in Message field");
          error = 10;
      }
      else{
        if(alphaNumWithHyphenDotCommaSpace(message)===false){
          $('#message').addClass("redfoucusclass");
          $('#message_error').html("Message field allows alphanumeric with Hyphen(-),period(.),comma(,) and space only");
          error = 10;
        }
      }
      //alert(error);
      if (error != 0) {
          return false;
      }

      $.ajax({
          type: "POST",
          url: oneshop_url + "/oshop_popup/insert_new_message",
          data: {subject: subject, message: message, connectids: connectids},
          success: function (data) {
              $("#messages").removeClass("msgyes");
              $("#subject,#message").val("");
            
            if(data.trim()>0){
              $("#m_s_r").fadeIn("300");
              setTimeout(function () {
                  $("#sendmessage").fadeOut("slow");
              }, 1500);
            }
          }
      });

      return false;
  });
  $("#send_msg_btn_profile").click(function () {
      $('*').removeClass("redfoucusclass");
      $("span[id$='_error']").html("");
      var connectids = $.trim($('#msg_recipient_profile').val());
      var subject = $.trim($('#subject_profile').val());
      var message = $.trim($('#message_profile').val());
      var error = 0;
      if (subject == "") {
          $('#subject_profile').addClass("redfoucusclass");
          $('#message_error_profile').html("Please enter Subject");
          error = 10;
      }
      else{
        if(alphaNumericWithHyphenDotSpace(subject)===false){
          $('#subject_profile').addClass("redfoucusclass");
          $('#subject_error_profile').html("Subject field allows alphanumeric with Hyphen(-),period(.) and space only");
          error = 10;
        }
      }
      if (message == "") {
          $('#message_profile').addClass("redfoucusclass");
          $('#message_error_profile').html("Please enter some value in Message field");
          error = 10;
      }
      else{
        if(alphaNumWithHyphenDotCommaSpace(message)===false){
          $('#message_profile').addClass("redfoucusclass");
          $('#message_error_profile').html("Message field allows alphanumeric with Hyphen(-),period(.),comma(,) and space only");
          error = 10;
        }
      }
      //alert(error);
      if (error != 0) {
          return false;
      }

      $.ajax({
          type: "POST",
          url: oneshop_url + "/oshop_popup/insert_new_message",
          data: {subject: subject, message: message, connectids: connectids},
          success: function (data) {
            //document.getElementById("messagePopUp_form").reset();
            if(data.trim()>0){
              $("#m_s_r_profile").fadeIn("300");
              setTimeout(function () {
                  $("#sendmessage_profile").fadeOut("slow");
              }, 1500);
            }
          }
      });

      return false;
  });
</script>

