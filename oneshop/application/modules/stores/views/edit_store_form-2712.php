<?php

$primaryStoreCategory = array();
if(count($store_categories) > 0){
    foreach($store_categories as $catKey => $catArr){
        $primaryStoreCategory[] = $catKey;
    }
}

//All services Array
$servicesArr = $store_all_services;
ksort($servicesArr);

//Saved Services
if($store_details[0]["services"] != ""){
    $savedServArr = explode(",", $store_details[0]["services"]);
}
$store_id = $store_details[0]["store_aid"];
$store_code = $store_details[0]["store_code"];
//For store theme  selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
?>

    <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("edit-storess"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 




<div class="oneshop_container_middle_section">

    <div class="oneshop_left_newcontainer pab10">

        <div class="titlecontainer acenter">
            <div class="titledeco">
                    <h4 class="title-text fkinlineblock black"> EDIT STORE  </h4>
            </div>
        </div>
        <form id="edit_store_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url();?>">
        <input type="hidden" name="store_aid" id="store_aid" value="<?php echo $store_details[0]["store_aid"];?> ">
        <input type="hidden" name="store_code" id="store_code" value="<?php echo $store_details[0]["store_code"];?> ">


        <div class="wi100pstg overflow mat15">
        <div class="wi100pstg mab10 minheight600 fll">
            <!--<h4 class="mab10 bold black bgcolor mal10 pab5">  Edit Store  </h4>-->
            <div class="oisdes_adminstore_leftbox  mal10">
                <?php if($upd_status == 1){?>
                <span style="color:red;" id="status_disp_span"><strong>Updated Successfully</strong></span>
                <?php }?>
            <div class="mab10 overflow">
            <p class="fll wi100pstg"> Store Name </p>
            <p class="fs14 fll bold"> <?php echo $store_details[0]["store_name"];?> </p>
            </div>

            <div class="mab10 overflow">
                <div class="fll wi100pstg"> <p class="fll"> About </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_about');"> Edit </a> </span>  </div>
                <span id="about_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_about" id="store_about"><?php echo $store_details[0]["store_about"];?></textarea> </p>
                </span>
                <span id="about_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_about"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
            <div class="fll wi100pstg"> <p class="fll"> Store Policies </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_privacy_policy');"> Edit </a> </span>  </div>
                <span id="policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_privacy_policy" id="store_privacy_policy"><?php echo $store_details[0]["store_privacy_policy"];?></textarea> </p>
                </span>
                <span id="policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_privacy_policy"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
            <div class="fll wi100pstg"> <p class="fll"> Cancellation Policy </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_cancellation_policy');"> Edit </a> </span>  </div>
                <span id="canc_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_cancellation_policy" id="store_cancellation_policy"><?php echo $store_details[0]["store_cancellation_policy"];?></textarea> </p>
                </span>
                <span id="canc_policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_cancellation_policy"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
                <div class="fll wi100pstg">
                    <p class="fll wi100pstg"> Store Logo </p> <span class="flr blue"> <a id="ospicchange" style="cursor:pointer;"> Edit </a> </span>
                </div>
                <span id="edit_logo_span" style="display: none;">
                    <p> <input type="file" name="store_logo"> </p>
                </span>
                <span id="edit_logo_disp_span" style="display: inline;">
                    <?php if($store_details[0]["profile_image_path"] != ""){?>
                        <p class="fll cartlogos"><img id="storeeditpic" src="<?php echo STORE_PATH.$store_code."/logo/si/".$store_details[0]["profile_image_path"]; ?>" alt="<?php echo ucfirst($store_details[0]["store_name"])?>"></p>
                    <?php }else{?>
                        <p class="fl"><strong>No Logo Selected.</strong></p>
                    <?php }?>

                </span>
            </div>

            <div class="oisdes_adminstore_leftbox">

            <div class="borderbottom mab10 pab5 wi100pstg fll"> <h3 class="fll"> Services </h3> <p class="flr">
            <!--span class="flr blue"> <a href="#"> + Add </a> </span>
            <span class="flr blue"> <a href="#"> Edit </a> &nbsp;&nbsp;  </span>-->
            </p>
            </div>

            <div class="fll wi100pstg">
                <select multiple="multiple" class="oisdes_services_leftbox" name="left_services[]" id="left_services">
                    <?php
                    foreach($servicesArr as $serKey => $serVal){
                        if(in_array($serKey, $savedServArr)) continue;
                    ?>
                        <option value="<?php echo $serKey; ?>"><?php echo $serVal; ?></option>
                    <?php
                    }
                    ?>
                </select>
            <div class="fll overflow">
            <div style="width:50px; margin-top:40px; overflow:hidden;"> <p class="fll" style="font-size:12px; margin:0 0 0 12px; background:#F7F7F7; width:24px; text-align:center; border:1px #EEE solid;"><a href="javascript:moveService('LtoR');"> >> </a></p> </div>
            <div style="width:50px; margin-top:20px; overflow:hidden;"> <p class="fll" style="font-size:12px; margin:0 0 0 12px; background:#F7F7F7; width:24px; text-align:center; border:1px #EEE solid;"><a href="javascript:moveService('RtoL');"> << </a></p> </div>
            </div>

             <select multiple="multiple" class="oisdes_services_leftbox" name="right_services[]" id="right_services">
                <?php
                    foreach($servicesArr as $serKey => $serVal){
                        if(!in_array($serKey, $savedServArr)) continue;
                 ?>
                    <option value="<?php echo $serKey; ?>"><?php echo $serVal; ?></option>
                 <?php
                    }
                ?>
             </select>
                <span id="save_span" style="display:none;"><br/><br/>
                    <input type="submit" value="Save" class="np_des_addaccess_btn mat10" name="button">
                    <input type="button" value="Cancel" onclick="cancel_edit()" class="np_des_addaccess_btn mat10" name="button">
                </span>
            </div>
            </div>

            <div class="oisdes_adminstore_leftbox mat20">
            <div class="borderbottom mab10 pab5 wi100pstg fll"> <h3 class="fll"> Product Tags </h3> <p class="flr">
            <span class="flr pat7 blue"> <a href="javascript:tag_store('inline');"> Add </a>  </span>
            </p>
            </div>

            

            </div>

            </div>

            <div class="oisdes_adminsmall_fields_wrap">

                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Currency </p>
                    <p class="fs14 fll bold"><?php echo $store_details[0]["currency"];?></p>
                </div>

                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Timezone <span class="flr blue"> <a href="javascript:edit_element_details('timezone');"> Edit </a>  </p>
<!--                    <p class="fs14 fll bold"><?php echo $store_details[0]["timezone"];?></p>-->
                    <span id="tzone_ta_span" style="display: none;">
                        <p>
                            <select id="store_tzone" name="store_timezone">
                                <option value="">--Select Timezone--</option>
                          <?php
                    foreach($time_zone_list as $key=>$val){
                      echo "<option value='".$val."'>".$val."</option>";
                    }
                    ?>
                            </select>
                        </p>
                    </span>
                    <span id="tzone_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"><?php echo $store_details[0]["timezone"];?></p>
                    </span>
                </div>

                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Contact Number <span class="flr blue"> <a href="javascript:edit_element_details('enquiry_number');"> Edit </a> </span></p>
                    <span id="enquiry_ta_span" style="display: none;">
                        <p> <input type="text" name="enquiry_number" id="enquiry_number" value="<?php echo $store_details[0]["enquiry_number"];?>"></p>
                    </span>
                    <span id="enquiry_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["enquiry_number"];?></p>
                    </span>
                </div>

                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> E-mail <span class="flr blue"> <a href="javascript:edit_element_details('service_email');"> Edit </a> </span></p>
                    <span id="email_ta_span" style="display: none;">
                        <p> <input type="text" name="service_email" id="service_email" value=""></p>
                    </span>
                    <span id="email_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["enquiry_email"];?></p>
                    </span>
                </div>

                <div class="mab10 overflow">
                    <p class="fll wi100pstg">Package Type <span class="flr blue"> <a href="<?php echo ONENETWORKURL."os_package?type=ug&str=".bin2hex($store_details[0]["store_code"]);?>"> Upgrade </a> </span></p>
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["package_name"];?></p>
                </div>
                 <?php
                 if($store_details[0]["period_in_months"] < 12 )
                     $dispPackPeriod = $store_details[0]["period_in_months]"]." Month";
                 else if($store_details[0]["period_in_months"] == 12)
                     $dispPackPeriod = "1 Year";
                 ?>

                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Package Term </p>
                    <p class="fs14 fll bold"> <?php echo $dispPackPeriod;?></p>
                </div>

                <?php
                if( $store_details[0]["delivery_mode"] == "BOTH"){
                    $delivery_mode = "Pay Before Delivery & Cash on Delivery";
                }else if( $store_details[0]["delivery_mode"] == "PBD"){
                    $delivery_mode = "Pay Before Delivery";
                }else if( $store_details[0]["delivery_mode"] == "COD"){
                    $delivery_mode = "Cash on Delivery";
                }
                ?>
                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Delivery Type <span class="flr blue"> <a href="javascript:edit_element_details('delivery_mode');"> Edit </a> </span></p>
                    <span id="delivery_ta_span" style="display: none;">
                        <p>
                            <select class="selectType" name="delivery_mode" id="delivery_mode" >
                                <option value="">--Select Delivery Type--</option>
                                <option value="BOTH" <?php if($store_details[0]["delivery_mode"] == "BOTH")echo "selected";?>>BOTH</option>
                                <option value="PBD" <?php if($store_details[0]["delivery_mode"] == "PBD")echo "selected";?>>Pay Before Delivery</option>
                                <option value="COD" <?php if($store_details[0]["delivery_mode"] == "COD")echo "selected";?>>Cash on Delivery</option>
                             </select>
                        </p>
                    </span>
                    <span id="delivery_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $delivery_mode;?></p>
                    </span>
                </div>
               <?php
               //Formatted wise expired date display
               if($store_details[0]["expired_on"] != ""){
                   $expire_date_on = date("M d, Y H:i:s", strtotime($store_details[0]["expired_on"]));
               }
               ?>
                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Expiration Date </p>
                    <p class="fs14 fll bold"> <?php echo $expire_date_on;?> </p>
                </div>
            </div>
        </div>


    </div>
    </form>
    </div>

     <div class="oneshop_right_newcontainer mat15">
         <?php  $url = str_replace('/oneshop', '/onenetwork', base_url());?>
    <a href="<?php echo $url.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>
   <a href="<?php echo $url.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>
  </div>

    </div>


 <?php if($upd_status == 1){?>
    <script type="text/javascript">
        function display_status_hide(){
            $("#status_disp_span").hide('slow');
          }
             setTimeout(display_status_hide, 2000);
    </script>
 <?php }?>
<script type="text/javascript" src="<?php echo base_url() . "/application/modules/stores/microjs/"; ?>add_store.js"></script>
