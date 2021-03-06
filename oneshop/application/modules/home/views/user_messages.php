<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("mystores");
?>
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">

    <div class="oneshop_container_middle_section mat10">


        <div class="left_oontainer">


            <div class="popupbox_new_wrapper">

                <div class="fll  mab30 pab5 mat10 wi100pstg">
                <div class="hd_heading">
            	<h1>Messages<span></span></h1>
            </div>
                    <?php if ($storedata != 0) { ?>
                        <div class="flr pab5">

                            <button class="btn_box flr" id="message_replay"> Replay </button>
                        </div>
                    <?php } ?>
                </div>


                <div class="popupbox_new_leftboxer"> 
                    <div class="chatconversation_users_wrapper">
                        <div class="cssmenu" style="width:100%; position:inherit;">
                            <ul>


                                <?php if ($storedata != 0) {
                                    foreach ($storedata as $sdata) { ?> 
                                        <li class="active has-sub">
                                            <div class="chat_usermaindiv-box " id="oneshop_storediv<?php echo $sdata['store_code'] ?>"> 
                                                <div class="click_createGroupPopUpCloseBtn_messages"><h2>X</h2></div> 

                                                <div class="chatconversation_users_singlemaindiv">
                                                    <p class="chatconversation_users_leftimage"> 
                                                        <?php if ($sdata['profile_image_path'] != '') { ?>
                                                            <img src="<?php echo base_url() . 'stores/' . $sdata['store_code'] . '/logo/si/' . $sdata['profile_image_path'] ?>" class="chatconversation_image">
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url() . 'assets/images/default_store_100.png' ?>"class="chatconversation_image">
                                                        <?php } ?>
                                                    </p>
                                                    <p class="chatconversation_user_name  os_message_storename" storecode="<?php echo $sdata['store_code'] ?>">  <?php echo ucfirst($sdata['store_name']); ?> 
                                                    <!--<p class="fs11 normal mal10 mat5 fll vc_des_mat5 gray"> 14 June 2016 </p>-->
                                                    </p>
                                                </div>
                                            </div>
                                        </li>


                                    <?php }
                                } else { ?>
                                    <li>

                                        <div class="fll bgcolor3 overflow black" style="  background: #f5f5f5 none repeat scroll 0 0;
                                             border: 1px solid #ccc;
                                             border-radius: 5px;
                                             color: #000;
                                             font-size: 14px;
                                             line-height: 36px;
                                             margin: 0 auto;
                                             overflow: hidden;
                                             padding: 0 10px;
                                             text-align: center;
                                             width: 90%;" >No stores</div>

                                    </li>   

                                <?php } ?>


                            </ul>
                        </div>
                    </div>



                </div>

                <div id="oneshop_nomessages"   >    
            <?php if ($storedata != 0) { ?>
                        Click on store to see messages

            <?php } else { ?>

                        No Messages to show 

            <?php } ?>
                </div>
                <input type="hidden" name="replied_storecode" id="replied_storecode" value="" >
                <div class="popupbox_new_rightboxer"  id="oneshop_messages"   style="display:none">
                    <div class="messagebox_withoutreplay_box fll" id="oneshop_messagediv" > 
                    </div>
                    <div class="osdes_rightbar_headingsbg_wrap mat20"  style="display:none;" id="oneshop_nomoremsg" >
                        <p> No More Messages </p>        
                    </div>
                    <div class="wi100pstg">
                        <div class="chat-conversation-box  fll" style="display:none;" id="replay_textdiv">
                            <p> <textarea class="oneshop_compose_textarea_oneshop" onfocus="removeerror(this.id)" id="replay_text" placeholder="Content Type Here"></textarea> </p>	 
                        </div>

                        <DIV class="wi100pstg mat20 fll overflow">
                            <p class="flr"> <button class="btn_box" id="message_send"> SEND </button>  </p>
                        </DIV>

                    </div>
              </div>
            </div>
        </div>
        <div class="right_container">
            <?php
            $this->load->module("suggestions");
            $this->suggestions->getStoreSuggestions();
            $this->suggestions->getProductSuggestions();
            ?>

        </div>
    </div>

</div>          
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->           
<?php
$this->templates->app_footer();
?>
<script>
    var starting_index = 8;

    function dataLoading() {
        var store_code = $('#replied_storecode').val();


        s_url = oneshop_url + "/home/get_messages"
        $.ajax({
            type: "POST",
            url: s_url,
            data: {start_id: starting_index, storecode: store_code, type: 'user'},
            success: function (data) {
                if ($.trim(data) != 0) {

                    $('#oneshop_messagediv').append(data);
                } else {
                    next_mesg_flag = false;
                    $('#oneshop_nomoremsg').css('display', "block");
                }
            }
        });
        starting_index = starting_index + 3;
    }
    var next_mesg_flag = true;
    $('#oneshop_messagediv').on('scroll', function () {

        if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            if (next_mesg_flag == true) {
                dataLoading();
            }
        }
    });
    $('.os_message_storename').on('click', function () {
        next_mesg_flag = true;
        starting_index = 8;
        $('#oneshop_nomoremsg').css('display', "none");
        $('#oneshop_messages').css('display', 'block');
        $('#oneshop_nomessages').css('display', 'none');
        $('#replay_textdiv').css('display', 'none');
        var storecode = $(this).attr('storecode');
        $('.chat_usermaindiv-box').removeClass('chat_usermaindiv-box-activebox');
        $('#oneshop_storediv' + storecode).addClass('chat_usermaindiv-box-activebox')
        $('#replied_storecode').val(storecode);
        $.ajax({
            type: "POST",
            url: oneshop_url + "/home/get_messages",
            data: {storecode: storecode, type: 'user'},
            success: function (data) {

                if ($.trim(data) != 0) {
                    $('#oneshop_messagediv').html(data);
                }
            }
        });
    });
    $('#message_replay').on('click', function () {
        var storecode = $('#replied_storecode').val();
        if ((storecode != '') && (storecode.length > 0)) {
            $('#replay_textdiv').css('display', 'block');

            $('html, body').animate({
                scrollTop: $("#replay_text").offset().top
            }, 500);
            $('#replay_text').focus();
        } else {
            alert("Click on  store to give replay");
        }
    })
    $('#message_send').on('click', function () {
        var storecode = $('#replied_storecode').val();
        var message = $.trim($('#replay_text').val()), error = 0;
        if (message == "") {
            $('#replay_text').addClass("redfoucusclass");
            error = 10;
        }
        if (error != 0) {
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: oneshop_url + "/oshop_popup/insert_store_message",
                data: {message: message, storecode: storecode},
                success: function (data) {
                    if ($.trim(data) == 1) {
                        $('#replay_text').val('');
                        var res = "<P class='mab30  bgcolor5 fs14 lh20'> <span class='fs25'>" + '"' + "</span>" + message + "<span class='fs11 mar10 mal10 yellow'> <?php echo date('d M Y') ?> </span> <span class=fs25'>" + '"' + "</span> </P>";
                        $('#oneshop_messagediv').append(res)
                    }

                }
            });
        }
    });
</script>