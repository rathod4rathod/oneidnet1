<?php
$this->load->module('templates');
$this->templates->app_header();
?>
<body bgcolor="#006699" onLoad="change()">
    <div id="reg_mainWrapper">
        <div id="popup1" class="overlay">
            <div class="popup">

                <a class="close" id="ouv" href="#">&times;</a>
                <div class="content">
                    <div style=" text-align: center" class="main_content_video_two">
                        <iframe id="oneidnetvideo" width="100%" height="100%" frameborder="0" allowfullscreen="" src="">
                        </iframe>                        
                    </div>
                </div>
            </div>
        </div>



        <div class="oneid_popup_icon_right"> 
            <a  id="ouvd"><i class="sprite sprite-066watch3"></i> </a>
        </div>       


        <div class="w3-animate-top"> 

            <div class="flr disclaimer"> <input type="button" name="button" class="case-btn aleft" id="hide" value="Okay, Got It!"> <a href="<?php echo base_url() . 'home/donations' ?>"><input type="button" name="button" class="case-btn aleft" value="Invest in ONEIDNET"></a> </div>
            <div class="content-disclaimer"><strong> Disclaimer</strong> Please be informed that we are testing the ONEIDNET Internet Operating System during

                this period. We will inform you when the test stops and robust launching of the system

                starts...

                Meanwhile, enjoy the system content and your activities!


            </div>
        </div>



		
        <!-- hover background images -->
        <div class="reg_bgImages">
        	<div id="bg_img" style="background-image:url('<?php echo base_url() . 'assets/Images/free-blue-hd-wallpaper-backgrounds-3D.jpg' ?>')"></div>
           <!-- <img src="<?php echo base_url() . 'assets/Images/free-blue-hd-wallpaper-backgrounds-3D.jpg' ?>" id="bg_img" style="display: block;">-->
            <div id="mailhead" class="reg_moduleCap" >
                <i class="title sprite sprite-041mail360"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText"> Email for all ONEIDNET users
                </span>
            </div>

            <div id="clickhead" class="reg_moduleCap" >
                <i class="title sprite sprite-042click_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText"> Socialize with your network click here to connect with others
                </span>
            </div>


            <div id="oneshophead" class="reg_moduleCap">
                <i class="title sprite sprite-046oneshop_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Start your new business, <br> open your new store and live your dream  </span>
            </div>

            <div id="coofficehead" class="reg_moduleCap">
                <i class="title sprite sprite-048cooffice_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Establish your company’s world-wide virtual office;  <br> hire people directly in the system</span>
            </div>        

            <div id="isnewshead" class="reg_moduleCap">
                <i class="title sprite sprite-053isnews_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText"> For your local,  <br> national and international honest news</span>
            </div>        



            <div id="vcomhead" class="reg_moduleCap">
                <i class="title sprite sprite-045vcom_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText"> Make your videos and voice calls  <br> from One id net</span>
            </div>        

            <div id="netprohead" class="reg_moduleCap">
                <i class="title sprite sprite-047netpro_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Your professional and career network;  <br> maintain all your history here</span>
            </div>        

            <div id="traveltimehead" class="reg_moduleCap">
                <i class="title sprite sprite-050traveltime_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Go here to make your travel arrangements</span>
            </div>        

            <div id="tunnelhead" class="reg_moduleCap">
                <i class="title sprite sprite-044tunnel_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText"> Upload and download your videos and music </span>
            </div>        

            <div id="onevisionhead" class="reg_moduleCap">
                <i class="title sprite sprite-054onevision_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Your entertainment module for  <br>internet channels, movies and more </span>
            </div>        

            <div id="oneidshiphead" class="reg_moduleCap">
                <i class="title sprite sprite-051oneidship_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Ship your packages using the same system</span>
            </div>        

            <div id="dealerxhead" class="reg_moduleCap">
                <i class="title sprite sprite-055dealerx_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Your elite company marketing and advertising</span>
            </div>        

            <div id="findithead" class="reg_moduleCap">
                <i class="title sprite sprite-052findit_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">If you need something from the internet,<br> you can find it here</span>
            </div>        

            <div id="cvbankhead" class="reg_moduleCap">
                <i class="title sprite sprite-049cvbank_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Create your Curriculum Vitea,  <br>be seen by companies world-wide, your opportunity to get that dream job</span>
            </div>        

            <div id="buzzinhead" class="reg_moduleCap">
                <i class="title sprite sprite-043buzzin_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText">Famous people, make some noise,  <br> buzz your status & take snaps</span>
            </div>        

            <div id="onenetworkhead" class="reg_moduleCap">
                <i class="title sprite sprite-056onenetwork_txt"></i>
                <i class="oneidnet sprite sprite-060oneidlogo123"></i>
                <span class="reg_moduleCapText"> ONEIDNET marketing and advertising   <br> Network and corporate operations administration system</span>
            </div> 




        </div>
		<!-- hover background images -->

        <div class="reg_frontWrapper">
            <!-- logo with slogan -->
            <div class="reg_leftSectionWrapper">
                <div class="slogans" id="od_slogons">
                    <span id="slogan"></span>
                </div>        
            </div>
			
             <!-- logo with slogan -->

            <div class="reg_circleAnimationWrapper">
                <div id="wis_modules_circle">
                  	<!-- module-circles -->
                  
                    <div id="header">
                        <i class="sprite sprite-059oneidlogo"></i>


                    </div> 
                    <div id="header1">
                        <i class="sprite sprite-057oneidtext"></i>


                    </div> 
                    <div class="module" id="mail">
                        <i class="mailh sprite sprite-025mail_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-009mail"></i>
                    </div> 
                    <div class="module" id="click">
                        <i class="clickh sprite sprite-026click_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-010click"></i>
                    </div>
                    <div class="module" id="oneshop">
                        <i class="oneshoph sprite sprite-030oneshop_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-014oneshop"></i>
                    </div>  
                    <div class="module" id="cooffice">
                        <i class="coofficeh sprite sprite-032coffice" style="display:none!important;"></i>
                        <i class="sprite sprite-016cooffice"></i>
                    </div>     
                    <div class="module" id="isnews">
                        <i class="isnewsh sprite sprite-037isnews_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-021isnews"></i>
                    </div>  

                    <div class="module" id="vcom">
                        <i class="vcomh sprite sprite-029vcom_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-013vcom"></i>
                    </div>      
                    <div class="module" id="netpro">
                        <i class="netproh sprite sprite-031netpro_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-015netpro"></i>
                    </div>    
                    <div class="module" id="traveltime">
                        <i class="traveltimeh sprite sprite-034traveltime_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-018traveltime"></i>
                    </div>                    
                    <div class="module" id="tunnel">
                        <i class="tunnelh sprite sprite-028tunnel_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-012tunnel"></i>
                    </div>
                    <div class="module" id="onevision">
                        <i class="onevisionh sprite sprite-038onevision_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-022onevision"></i>
                    </div>    
                    <div class="module" id="oneidship">
                        <i class="oneidshiph sprite sprite-035oneidship_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-019oneidship"></i>
                    </div>  
                    <div class="module" id="dealerx">
                        <i class="dealerxh sprite sprite-039dealerx_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-023dealerx"></i>
                    </div>   
                    <div class="module" id="findit">
                        <i class="findith sprite sprite-036findit_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-020findit"></i>
                    </div>    
                    <div class="module" id="cvbank">
                        <i class="cvbankh sprite sprite-033cvbank_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-017cvbank"></i>
                    </div>   
                    <div class="module" id="buzzin">
                        <i class="buzzinh sprite sprite-027buzzin_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-011buzzin"></i>
                    </div>  
                    <div class="module" id="onenetwork">
                        <i class="onenetworkh sprite sprite-040onenetwork_hover" style="display:none!important;"></i>
                        <i class="sprite sprite-024onenetwork"></i>
                    </div>
                    <!-- module-circles -->


                    <!-- login -->
                    <div class="reg_signInForm" id="regdes_signin_form" style="display: block;">
                        <img src="<?php echo base_url() . 'assets/Images/blue.png' ?>" id="regdes_signin_bg" class="reg_background">
                        <div class="reg_signInFormHeader">
                            <i class="issystem sprite sprite-061oneidnetinternetsystem"></i>
                        </div>
                        <form id="regdes_signInForm" method="post"  >
                            <div class="reg_signInFormWrapper">
                                <span class="reg_signInFormField">
                                    <input  type="text" placeholder="User Name" onFocus="fun_Remove(this.id)"  id="logindev_username" name="logindev_username" class="signInField regdes_signin_ui" autocomplete="off">
                                </span>
                                <span class="reg_signInFormField">
                                    <input type="password" placeholder="*********" onFocus="fun_Remove(this.id)" id="logindev_password"  name="logindev_password"  class="signInField regdes_signin_pwd">
                                </span>
                                <span class="reg_signInFormField">
                                    <span class="loginWaiting"><p style="color:red;" class="login_error"></p></span>
                                    <div class="reg_signInText">
                                        <a href="#"><p class="recoveryPasswordBtn">Forgot Password</p></a>
                                        <a href="#"><p class="recoveryusernameBtn">Forgot Username</p></a>

                                    </div>
                                    <input type="submit" value="Login" id="logindev_submit"  class="LoginBtn loginbutton">
                                </span>       
                            </div>
                        </form>

                    </div>
					<!-- login -->

					<!-- recovery password -->
                    <div class="reg_recoveryForm"  id="reg_recoveryForm" style="display: none;">
                        <img src="<?php echo base_url() . 'assets/Images/blue.png' ?>" class="reg_background">
                        <div class="reg_signInFormHeader"><i class="issystemrecover sprite sprite-063recoveryPassword"></i></div>

                        <div class="reg_signInFormWrapper">
                            <span class="reg_signInFormField">
                                <input style="margin-top: 10px" type="text" placeholder="Enter your Alternate E-Mail Address" onFocus="fun_Remove(this.id)" id="forgotdev_mobileno" class="signInField"></span>
                            <span class="reg_signInFormField">
                            </span>
                            <span class="forgotWaiting"><p style="color:red;" class="forgot_error"></p> </span>
                            <span class="reg_signInFormField">
                                <span class="recoveryBtnWrapper">
                                    <button class="CancelBtn" id="pwrsetcnl">Cancel</button>
                                    <input type="button" value="Ok" id="forgotdev_submit" class="LoginBtn otpShowBtn recoverypasswordbtn"> </span>
                            </span>
                        </div>

                    </div>
                    <!-- recovery password -->

					<!-- recovery username -->
                    <div class="reg_recoveryForm" id="reg_usernamerecoveryForm" style="display: none;">
                        <img src="<?php echo base_url() . 'assets/Images/blue.png' ?>" class="reg_background">
                        <div class="reg_signInFormHeader"><i class="issystemrecover sprite sprite-064recoveryUsername"></i></div>

                        <div class="reg_signInFormWrapper">
                            <span class="reg_signInFormField">
                                <input style="margin-top: 10px;"  type="text" placeholder="Enter Your Alternate E-Mail Address" onFocus="fun_Remove(this.id)" id="forgotdevuser_mobileno" class="signInField"></span>
                            <span class="reg_signInFormField">
                            </span>
                            <span class="forgotWaiting"><p style="color:red;" class="forgotuser_error"></p> </span>

                            <span class="reg_signInFormField">
                                <span class="recoveryBtnWrapper">
                                    <button class="CancelBtn" id="forgotdevuser_cancle">Cancel</button>
                                    <input type="button" value="Ok" id="forgotdevuser_submit" class="LoginBtn otpShowBtn recoveryusername"> </span>
                            </span>
                        </div>

                    </div>
					<!-- recovery username -->

					<!-- reg_OTPForm -->
                    <div class="reg_OTPForm" style="display: none;">
                        <img src="<?php echo base_url() . 'assets/Images/blue.png' ?>" class="reg_background">
                        <form method="post" >
                            <div class="reg_recoveryFormWrapper">
                                <span  ><p  class="otp_sucess" style="color:white;"></p></span>
                                <span class="reg_signInFormField">
                                    <input type="hidden" id="forgotdev_phoneno" name="forgotdev_phoneno" >
                                    <input type="text" placeholder="Enter Your Otp" id="forgotdev_otp" onFocus="fun_Remove(this.id)" class="signInField"></span>
                                <span class="reg_signInFormField">
                                    <input type="password" placeholder="Enter new password" id="forgotdev_password" onFocus="fun_Remove(this.id)"  class="signInField"></span>
                                <span class="reg_signInFormField">
                                    <input type="password" placeholder="Enter confirm  password" id="forgotdev_conpassword" onFocus="fun_Remove(this.id)"  class="signInField">
                                </span>
                                <span class="otpWaiting"><p class="otp_error"></p></span>

                                <span class="reg_signInFormField">

                                    <span class="recoveryBtnWrapper">
                                        <button class="LoginBtn CancelBtn">Cancel</button>
                                        <input type="submit" id="forgotdev_otpsubmit" value="ok" class="LoginBtn recoverypassword"></span>
                                </span>       
                            </div>
                        </form>
                    </div>
					<!-- reg_OTPForm -->
					
					<!-- signup -->
                    <div id="regdes_wis_reg_page"> 

                        <!--Sign in Form-->
                        <div id="regdes_signin_form" class="reg_signUpForm" style="display: none;">
                            <img src="<?php echo base_url() . 'assets/Images/blue.png' ?>" class="reg_background">
                            <div id="regdes_icon"><i class="sprite sprite-061oneidnetinternetsystem"></i></div>
                            <form id="regdes_signInForm" method="post"  >
                                <input type="text" placeholder="User Name" onFocus="fun_Remove(this.id)"  id="logindev_username" name="logindev_username" class="regdes_signin_ui " autocomplete="off">
                                <input type="password" placeholder="*********" onFocus="fun_Remove(this.id)" id="logindev_password"  name="logindev_password"  class="regdes_signin_pwd ">
                                <p style="color:red;" class="login_error"> </p>
                                <h3 id="regdes_fp">Forgot Password</h3>
                                <h3 id="regdes_fp">Forgot User Id</h3>


                                <input type="submit" value="Login" id="logindev_submit" class="regdes_loginBtn">
                            </form>
                        </div>
                        <!--Sign in Form-->
                        <!--SignUp form--> 
                        <div id="regdes_signup_form" class="reg_signUpForm">
                            <img src="<?php echo base_url() . 'assets/Images/blue.png' ?>" class="reg_background">
                            <div class="reg_signUpFormHeader">
                                <i class="sprite sprite-058signup"></i>
                            </div>
                            <div class="signUpFormWrapper">            
                                <form id="regdes_signUpForm" method="post" action="<?php // echo base_url().'index.php/registration/doRegistration'   ?>" onfocusout="OnFocusOutForm (event)">

                                    <div id="regdes_form_su">
                                        <span class="reg_signUpFormField">
                                            <input type="text" placeholder="First Name" name="regdev_firstname" onFocus="fun_Remove(this.id)" id="regdes_firstname" class="regdes_firstName regdes_fn"></span>

                                        <span class="reg_signUpFormField">
                                            <input type="text" placeholder="Last Name" name="regdev_lastname" id="regdes_lastname" onFocus="fun_Remove(this.id)" class="regdes_lastName regdes_fn"></span>
                                        <span class="reg_signUpFormField">
                                            <input type="text" placeholder="Existing e-mail" name="regdev_existemail" id="regdes_existemail" onFocus="fun_Remove(this.id)" class="regdes_lastName regdes_fn"></span>
                                        <span class="reg_signUpFormField">
                                            <input type="text" placeholder="User Name" name="regdev_username" id="regdes_username" onFocus="fun_Remove(this.id)"  class="regdes_userName regdes_fn ">

                                            <p class="mainidbox"> @oneidnet.com </p>
                                            <div id="res" class="suggestionForUserID" style=''></div>
                                             <!--<input type="text" name="regdev_altemail" id="regdes_altemail" placeholder="Alternate Email" onfocus="fun_Remove(this.id)"  class="regdes_altEmail regdes_fn" > -->
                                        </span>
                                        <span class="reg_signUpFormField">
                                            <input type="password" placeholder="Password" name="regdev_password" id="regdes_password" onFocus="fun_Remove(this.id)" class="regdes_pwd regdes_fn"></span>
                                        <span class="reg_signUpFormField">
                                            <input type="password" placeholder="Confirm Password" name="regdev_conpassword" id="regdes_conpassword"   onFocus="fun_Remove(this.id)" class="regdes_cPwd regdes_fn"></span>
                                        <span class="reg_signUpFormField"> 
                                        <div id="regdes_fn7" class="regdes_date" style="display: block;">
                                                <select id="regdes_month" name="regdev_month" onChange="fun_Remove(this.id)">
                                                    <option value="">--Select Country--</option>
                                                    <?php foreach($country_name as $country_info){
                                                        ?>
                                                    <option value="<?php echo $country_info["country_id"]; ?>"><?php echo $country_info["country_name"]; ?></option>
                                                            <?php
                                                    }?>
												</select>   
                                            </div> 
                                            </span>
                                        <span class="reg_signUpFormField">
                                            <input type="text" placeholder="<?php echo rand(1, 99) . " + " . rand(1, 99) . " ="; ?>" name="regdev_captcha" onFocus="fun_Remove(this.id)" id="regdes_captcha" class="regdes_firstName regdes_fn"></span>

                                        <span class="reg_signUpFormField reg_terms">
                                            <input type="checkbox"  value="true" id="regdes_termsconditions"> <a href="<?php echo base_url() . 'home/terms_conditions' ?>" target="_blank">You agree with our terms of service</a>
                                        </span>

                                        <span class="reg_signUpFormField continueBtnWrapper">

                                            <a href="javascript:void(0);"><button type="submit" class="regbtn" id="regdes_cont_btn">Sign Up</button></a></span>

                                    </div>
                                </form>

                            </div>

                            <div class="reg_signUpText">
                                <span class="reg_signUpTextPType">Sign Up and Get Your Oneidnet</span>
                                <span class="reg_signUpTextHType">All In One</span>
                            </div>
                            
                        </div>
                        <!--SignUp form--> 

                    </div>     
                    <!-- signup -->          

                </div>
            </div>
			<!--right menu section -->
            <div class="reg_rightSectionWrapper">
                <div class="reg_rightSectionOptions">
                    <ul>
                        <a href="<?php echo base_url() . 'home/aboutus' ?>" target="_blank"><li><i class="img sprite sprite-001aboutus"></i><span>About Us</span></li></a>
                        <a href="<?php echo base_url() . 'home/policies' ?>" target="_blank"><li><i class="img sprite sprite-002policy"></i><span>Policies</span></li></a>
                        <a href="<?php echo base_url() . 'home/foundation' ?>" target="_blank"><li><i class="img sprite sprite-003foundation"></i><span>Foundation</span></li></a>
                        <a href="<?php echo base_url() . 'home/privacy' ?>" target="_blank"><li><i class="img sprite sprite-004privacy"></i><span>Privacy</span></li></a>
                        <a href="<?php echo base_url() . 'home/termsconditions' ?>" target="_blank"><li><i class="img sprite sprite-005tc"></i><span>Terms & Conditions</span></li></a>
                        <a href="<?php echo base_url() . 'home/customersupport' ?>" target="_blank"><li><i class="img sprite sprite-006cs"></i><span>Customer Support</span></li></a>
                        <a href="<?php echo base_url() . 'home/contactus' ?>" target="_blank"><li><i class="img sprite sprite-007contactus"></i><span>Contact Us</span></li></a>
                        <a href="<?php echo base_url() . 'home/allinone' ?>" target="_blank"><li><i class="img sprite sprite-008allinone"></i><span>All in one</span></li></a>
                    </ul>
                </div>
            </div>        
			<!--right menu section -->

        </div> 

    </div>
    <?php $this->templates->app_footer(); ?>
    <script>
        function is_Alpha_Neumeric_Dot_Only(s_data) {
            var uname_pattern = /^[a-z][a-z0-9\.]*$/i;
            var flag = false;
            if (uname_pattern.test(s_data)) {
                flag = true;
            }
            return flag;
        }

        /****** User Name Suggestions *****/
        $(document).ready(function () {
            $(".regdes_userName").blur(function (e) {
                e.preventDefault(  );
                var uname = $(this).val();
                var flag = true;
                if (uname.length != 0) {
                    var firstchar = uname.slice(0, 1);
                    if (isNaN(firstchar)) {
                        if (!is_Alpha_Neumeric_Dot_Only(uname)) {
                            flag = false;
                            $('#regdes_username').addClass("redfoucusclass");
                        }
                    } else {
                        flag = false;
                        $('#regdes_username').addClass("redfoucusclass");
                    }
                } else {
                    flag = false;
                }

                if (flag == false) {
                    return false;
                }

                var data = "username=" + uname;

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php/home/getUser_name' ?>",
                    data: data,
                    dataType: 'html',
                    beforeSend: function (  ) {
                    },
                    complete: function (  ) {
                    },
                    success: function (data) {
                        var obj = $.parseJSON(data);
                        var result = '';
                        if (obj.length > 0) {
                            $("#res").show();
                            result += "<span id='errormsg'>The username alreday exist. Try another?</span><br>";
                            result += "<table id='tbl'>";
                            result += "<tr><td>Available: </td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[0] + "' >" + obj[0] + "</a></td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[1] + "' >" + obj[1] + "</a></td></tr>";
                            result += "<tr><td></td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[2] + "' >" + obj[2] + "</a></td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[3] + "' >" + obj[3] + "</a></td></tr>";
                            result += "</table>";
                            $("#res").html(result);

                            $("#errormsg").css('color', '#f00');
                            $("#successmsg").css('color', '#009');

                            /** Add suggest name to the input box **/
                            $('.suggest1').click(function (e) {
                                e.preventDefault();
                                var suggestname = $(this).attr('id');
                                $(".regdes_userName").addClass("search");
                                $(".regdes_userName").val(suggestname);
                                $("#res").hide();
                            });
                        } else {
                            $("#res").hide();
                            $(".regdes_userName").addClass("search");
                            $(".regdes_userName").val(uname);
                        }
                    }//end of success
                });
            });

            $(".regdes_userName").focus(function () {
                $("#res").hide();
                $(".regdes_userName").removeClass("search");
            });

        });



    </script>

