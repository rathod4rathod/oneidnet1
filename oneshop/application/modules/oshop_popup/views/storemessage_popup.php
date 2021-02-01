<!-- <div class="click_popUp" id="sendstoremessage">
    <div class="click_createGroupPopUpWrapper">
        <a href="javascript: void(0)"  onClick="message_popUpVisibility('sendstoremessage');"> -->
<?php if($store_name != ""){?>
    <script>
        $("#s_msg").css("display","block");
    </script>
<?php }?>            
    <div class="np_newpopuup_bgcontainer" id="s_msg" style="display: none;">
        <p class="click_createGroup_newbtn"><a href="javascript:void(0);" id="sr_close"> <img alt="icon" src="<?php echo base_url().'assets/images/close3.png'?>"></a> </p>
        <form  id="messagestorePopUp_form" method="post">
            <div class="np_newpopuup_bgcontainer">
                
                <div class="np_popupheadingnew_box"><h4> Compose message </h4></div>
                    
                <div class="np_popupcontainer_middlebox">
                    
                    <div class="fll wi100pstg mab5">
                        <p class="fs14"> To </p>
                        <input type="text" name=""  readonly value="<?php echo $store_name  ?>" id="store_name" class="oneshop_compose_subject">
                        
                    </div>
                     
                     <div class="fll wi100pstg np_des_mat15">
                        <p class="fs14">  Message </p>
                        <p> <textarea class="oneshop_compose_textarea"  id="store_message"></textarea> </p>
                    </div>
                    <div class="fll wi100pstg np_des_mat15">
                        <strong style="color:green;display:none" id="m_store_r">Message successfully sent</strong>
                    </div>
                     <p class="flr np_des_mat10">
                        <button class="np_des_addaccess_btn_save" >Send</button>
                    </p>
                </div>
                
            </div>
        </form>
    </div>
<!-- </div> -->
<script>
    
 $("#messagestorePopUp_form").submit(function () {
      var str_code = '<?php echo $store_code ?>';
      var message = $.trim($('#store_message').val()), error=0;

if(message==""){
    $('#store_message').addClass("redfoucusclass");
    error=10;
}
if(error!=0){
    return false;
}else{
    
    $.ajax({
            type: "POST",
            url: oneshop_url+ "/oshop_popup/insert_store_message",
            data: { message: message, storecode:str_code},
            success: function (data) {
                document.getElementById("messagestorePopUp_form").reset();
                $("#m_store_r").fadeIn("300");
               setTimeout(function () {
                    $("#os_popup").css("display","none");
                }, 1500);
                
            }
        });
}
 return false;
 });
    $("#sr_close").click(function(){
        $("#os_popup").css("display","none");
    });
 </script>
 
