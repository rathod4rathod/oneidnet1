<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>One Network</title>
        <link href="<?php echo base_url() . 'assets/css/style.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/on_custom.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/clickmenu.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.11.2.min.js' ?>"></script>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/script.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/js/validation.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/generic.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.textrotator.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/js/moduleHeaderScript.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/js/iconChange.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/js/custom.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/microjs/buzzinPromotion.js'; ?>"></script>

        <script type="text/javascript">
            $(function () {
                $(".menu").hover(
                        function () {
                            $(".sub").slideToggle(300);
                        },
                        function () {
                            $(".sub").hide();
                        }
                );
            });
        </script>


<!--         <script>
            function message_popUpVisibility(id) {
                var e = document.getElementById(id);
                if (e.style.display == 'block') {
                    e.style.display = 'none';
                }
                else {
                    e.style.display = 'block';
                }
            }
        </script>   -->        



    </head>


    <div style="display: none;" id="sendmessage" class="click_popUp">
        <div class="click_createGroupPopUpWrapper">
            <a onClick="message_popUpVisibility('sendmessage');" href="javascript: void(0)">
                <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>
            <form id="messagePopUp_form">
                <div class="np_newpopuup_bgcontainer">

                    <div class="np_popupheadingnew_box"><h4> Compose message </h4></div>
                    <div class="np_popupcontainer_middlebox">

                        <div class="fll wi100pstg mab5">
                            <p class="fs14"> To </p>

                            <select class="tokenize-sample block_user_id oneshop_compose_selectbox" multiple="multiple" id="connectids">
                                <?php
                                foreach ($friends_list as $flist) {
                                  echo "<option value='" . $flist["user_id_fk"] . "'>" . $flist["profile_name"] . "</option>";
                                }
                                ?>
                            </select>
                            <div id="to_field">
                                <ul id="removeConfirmationTags">
                                </ul></div>
                             <!--   <p> <input type="text"  name="report_problem_title" class="np_popupcontainer_inputfield_box"> </p>-->
                        </div>
                        <input type="hidden" id="msg_recipient" name="msg_recipient">
                        <div class="fll wi100pstg np_des_mat15 mab5">
                            <p class="fs14">  Subject </p>
                            <p> <input type="text" id="subject" class="oneshop_compose_subject" name="report_problem_title"> </p>
                        </div>

                        <div class="fll wi100pstg np_des_mat15">
                            <p class="fs14">  Message </p>
                            <p> <textarea id="message" class="oneshop_compose_textarea"></textarea> </p>
                        </div>
                        <div class="fll wi100pstg np_des_mat15">
                            <strong id="m_s_r" style="color:green;display:none">Message successfully sent</strong>
                        </div>

                        <p class="flr np_des_mat10">
                            <button class="np_des_addaccess_btn_save">Send</button>
                        </p>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <body>
        <input type="hidden" id="cid" value="<?php echo $cid; ?>" >
        <input type="hidden" id="user_id" value="<?php echo $user_id; ?>">
        
