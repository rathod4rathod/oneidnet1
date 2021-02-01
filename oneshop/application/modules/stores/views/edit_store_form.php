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
<style type="text/css">


#grad {
  height: 25px;
  background-image: linear-gradient(90deg, black, white);
  color: #fff;
  padding-left: 10px;
  padding-top: 5px;
  font-size: 13px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
    width: 45%;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
}
</style>

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

        <span id="save_span_top" style="display:none;">
            <input type="submit" value="Save" class="np_des_addaccess_btn mat10" name="button">
            <input type="button" value="Cancel" onclick="cancel_edit()" class="np_des_addaccess_btn mat10" name="button">
        </span>
        <div class="wi100pstg overflow mat15">
        <div class="wi100pstg mab10 minheight600 fll">
        <!-- <br /> -->

        <div id="grad"><strong><u>STORE INFORMATION</u></strong></div>
        <br />
        <table>
            <tr>
                <td>Store Logo</td>
              <td>
                   <span id="edit_logo_span" style="display: none;">
                    <p> <input type="file" name="store_logo"> </p>
                </span>
                <span id="edit_logo_disp_span" style="display: inline;">
                    <?php if($store_details[0]["profile_image_path"] != ""){?>
                        <p class="fll cartlogos">
                        <img id="storeeditpic" style="transform: scaleY(1.5);" src="<?php echo STORE_PATH.$store_code."/logo/si/".$store_details[0]["profile_image_path"]; ?>" alt="<?php echo ucfirst($store_details[0]["store_name"])?>"></p>
                    <?php }else{?>
                        <p class="fl"><strong>No Logo Selected.</strong></p>
                    <?php }?>

                </span>
              </td>
              <td><a id="ospicchange" style="cursor:pointer;"> Edit </a></td>
            </tr>
            <tr>
              <td>Store Name</td>
              <td><span id="name_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_name"];?> </p>
                </span>
            <span id="name_ta_span" style="display: none;">
                    <p><input type="text" name="store_name" id="store_name" value="<?php echo $store_details[0]["store_name"];?>"></p>
                </span></td>
              <td><a href="javascript:edit_element_details('store_name');"> Edit </a></td>
            </tr>
            <tr>
              <td>Store Category Type</td>
              <td><span id="cat_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_category"];?></p>
                </span></td>
              <!-- <td></td> -->
            </tr>
            <tr>
              <td>About</td>
              <td><span id="about_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_about" id="store_about"><?php echo $store_details[0]["store_about"];?></textarea> </p>
                </span>
                <span id="about_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_about"];?></p>
                </span></td>
              <td><a href="javascript:edit_element_details('store_about');"> Edit </a></td>
            </tr>
            <tr>
              <td>Store Currency</td>
              <td><span id="curr_ta_span" style="display: none;">
                        <p>
                    <select class="oneshop_selectbox_field selectType" style="width: 200px;" name="currency" id="currency">
                            <option value="">--Select Currency--</option>
                            <?php
                            foreach ($currency_list as $curKey => $curVal) {
                              ?>
                              <option value="<?php echo $curKey; ?>"><?php echo $curVal; ?></option>
                              <?php }
                            ?>
                        </select>
                    </p>
                </span>
                <input type="hidden" name="currency_store" id="currency_store" value="<?php echo $store_details[0]["currency"];?>">
                <span id="curr_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"><?php echo $store_details[0]["currency"];?></p>
                </span></td>
              <td><a href="javascript:edit_element_details('currency');"> Edit </a></td>
            </tr>
        </table>

        <br />
        <br />

        <div id="grad"><strong><u>CONTACT INFORMATION</u></strong></div>
        <br />
        <table>
            <tr>
                <td>Contact Number</td>
              <td>
                   <span id="enquiry_ta_span" style="display: none;">
                        <p> <input type="text" name="enquiry_number" id="enquiry_number" value="<?php echo $store_details[0]["enquiry_number"];?>"></p>
                    </span>
                    <span id="enquiry_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["enquiry_number"];?></p>
                    </span>
              </td>
              <td><a href="javascript:edit_element_details('enquiry_number');"> Edit </a></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td>
                <span id="email_ta_span" style="display: none;">
                        <p> <input type="text" name="service_email" id="service_email" value=""></p>
                    </span>
                    <span id="email_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["enquiry_email"];?></p>
                    </span>
                </td>
                <td><a href="javascript:edit_element_details('service_email');"> Edit </a></td>
            </tr>
        </table>
        <br />
        <br />

        <div id="grad"><strong><u>POLICIES</u></strong></div>
        <br />
        <table>
            <tr>
                <td>Privacy Policy</td>
              <td>
                <span id="policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_privacy_policy" id="store_privacy_policy"><?php echo $store_details[0]["store_privacy_policy"];?></textarea> </p>
                </span>
                <span id="policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["store_privacy_policy"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["store_privacy_policy"];?></p></div>
                    <?php }else {?>
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["store_privacy_policy"];?></p>
                    <?php }?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('store_privacy_policy');"> Edit </a></td>
            </tr>
            <tr>
              <td>Cancellation Policy</td>
              <td>
                <span id="canc_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_cancellation_policy" id="store_cancellation_policy"><?php echo $store_details[0]["store_cancellation_policy"];?></textarea> </p>
                </span>
                <span id="canc_policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["store_cancellation_policy"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["store_cancellation_policy"];?></p></div>
                    <?php }else {?>
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["store_cancellation_policy"];?></p>
                    <?php } ?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('store_cancellation_policy');"> Edit </a></td>
            </tr>
            <tr>
              <td>Damages Policy</td>
              <td>
                <span id="sec_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_security_policy" id="store_security_policy"><?php echo $store_details[0]["store_damage_policy"];?></textarea> </p>
                </span>
                <span id="sec_policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["store_damage_policy"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["store_damage_policy"];?></p></div>
                    <?php }else {?>
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["store_damage_policy"];?></p>
                    <?php }?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('store_security_policy');"> Edit </a></td>
            </tr>
            <tr>
              <td>Security Policy</td>
              <td>
                <span id="secure_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_secure_policy" id="store_secure_policy"><?php echo $store_details[0]["store_security_policy"];?></textarea> </p>
                </span>
                <span id="secure_policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["store_security_policy"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["store_security_policy"];?></p></div>
                    <?php}else{?>
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["store_security_policy"];?></p>
                    <?php } ?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('store_secure_policy');"> Edit </a></td>
            </tr>
            <tr>
              <td>Return & Refund Policy</td>
              <td>
                <span id="rtn_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_return_policy" id="store_return_policy"><?php echo $store_details[0]["store_return_policy"];?></textarea> </p>
                </span>
                <span id="rtn_policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["store_return_policy"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["store_return_policy"];?></p></div>
                    <?php}else{?>
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["store_return_policy"];?></p>
                    <?php }?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('store_return_policy');"> Edit </a></td>
            </tr>
            <tr>
              <td>Purchasing Agreenment</td>
              <td>
                <span id="agre_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_agreement" id="store_agreement"><?php echo $store_details[0]["store_agreement"];?></textarea> </p>
                </span>
                <span id="agre_policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["store_agreement"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["store_agreement"];?></p></div>
                    <?php }else{?>
                        <p class="fs14 fll bold"> <?php echo $store_details[0]["store_agreement"];?></p>
                    <?php }?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('store_agreement');"> Edit </a></td>
            </tr>
            <tr>
              <td>Delivery Policy</td>
              <td>
                <span id="del_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_del_policy" id="store_del_policy"><?php echo $store_details[0]["store_del_policy"];?></textarea> </p>
                </span>
                <span id="del_policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["store_del_policy"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["store_del_policy"];?></p></div>
                    <?php }else{?>
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_del_policy"];?></p>
                    <?php }?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('store_del_policy');"> Edit </a></td>
            </tr>
            <tr>
              <td>Customer's Rights Declaration</td>
              <td>
                <span id="crd_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="crd_policy" id="crd_policy"><?php echo $store_details[0]["crd_policy"];?></textarea> </p>
                </span>
                <span id="crd_policy_disp_span" style="display: inline;">
                    <?php if($store_details[0]["crd_policy"] != "") {?>
                    <div style="overflow-y: scroll;height: 100px; "><p class="fs14 fll bold"> <?php echo $store_details[0]["crd_policy"];?></p></div>
                <?php }else {?>
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["crd_policy"];?></p>
                <?php }?>
                </span>
              </td>
              <td><a href="javascript:edit_element_details('crd_policy');"> Edit </a></td>
            </tr>
        </table>
        <br />
        <br />

        <div id="grad"><strong><u>SERVICES</u></strong></div>
        <br />
        <table>
            <tr>
                <td>Services</td>
                <td style="width: 20%">
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
                </td>
                <td style="width: 12%">
                    <div style="width:50px; margin-top:40px; overflow:hidden;"> <p class="fll" style="font-size:12px; margin:0 0 0 12px; background:#F7F7F7; width:24px; text-align:center; border:1px #EEE solid;"><a href="javascript:moveService('LtoR');"> >> </a></p> </div>
                    <div style="width:50px; margin-top:20px; overflow:hidden;"> <p class="fll" style="font-size:12px; margin:0 0 0 12px; background:#F7F7F7; width:24px; text-align:center; border:1px #EEE solid;"><a href="javascript:moveService('RtoL');"> << </a></p> </div>  
                </td>
                <td style="width: 20%">
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
                </td>
            </tr>
        </table>
        <br />
        <br />

        <div id="grad"><strong><u>OTHER STORE DETAILS</u></strong></div>
        <br />
        <table>
            <tr>
                <td>Timezone</td>
                <td>
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
                </td>
                <td><a href="javascript:edit_element_details('timezone');"> Edit </a></td>
            </tr>
            <tr>
                <td>Package Type</td>
                <td>
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["package_name"];?></p>
                    
                     <?php
                     if($store_details[0]["period_in_months"] < 12 )
                         $dispPackPeriod = $store_details[0]["period_in_months]"]." Month";
                     else if($store_details[0]["period_in_months"] == 12)
                         $dispPackPeriod = "1 Year";
                     ?>
                </td>
                <td><a href="<?php echo ONENETWORKURL."os_package?type=ug&str=".bin2hex($store_details[0]["store_code"]);?>"> Upgrade </a></td>
            </tr>
            <tr>
                <td>Package Term</td>
                <td>
                    <p class="fs14 fll bold"> <?php echo $dispPackPeriod;?></p>
                    <?php
                    if( $store_details[0]["delivery_mode"] == "Both"){
                        $delivery_mode = "Delivery & Pickup";
                    }else if( $store_details[0]["delivery_mode"] == "Delivery"){
                        $delivery_mode = "Delivery";
                    }else if( $store_details[0]["delivery_mode"] == "Pickup"){
                        $delivery_mode = "Pickup";
                    }
                    if($store_details[0]["payment_mode"]==="PBD"){
                      $pay_mode="Pay Before Delivery";
                    }
                    ?>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Delivery Type</td>
                <td>
                    <span id="delivery_ta_span" style="display: none;">
                        <p>
                            <select class="selectType" name="delivery_mode" id="delivery_mode" >
                                <option value="">--Select Delivery Type--</option>
                                <option value="Both" <?php if($store_details[0]["delivery_mode"] == "Both")echo "selected";?>>Both</option>
                                <option value="Delivery" <?php if($store_details[0]["delivery_mode"] == "Delivery")echo "selected";?>>Delivery</option>
                                <option value="Pickup" <?php if($store_details[0]["delivery_mode"] == "Pickup")echo "selected";?>>Pickup</option>
                             </select>
                        </p>
                    </span>
                    <span id="delivery_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $delivery_mode;?></p>
                    </span>
                </td>
                <td><a href="javascript:edit_element_details('delivery_mode');"> Edit </a></td>
            </tr>
            <tr>
                <td>Payment Type</td>
                <td>
                    <span id="delivery_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $pay_mode;?></p>
                    </span>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Expiration Date</td>
                <td>
                   <?php
                   //Formatted wise expired date display
                   if($store_details[0]["expired_on"] != ""){
                       $expire_date_on = date("M d, Y H:i:s", strtotime($store_details[0]["expired_on"]));
                   }
                   ?>
                    <p class="fs14 fll bold"> <?php echo $expire_date_on;?> </p>
                </td>
                <td></td>
            </tr>
        </table>
        <br />
        <br />

        <span id="save_span" style="display:none;">
            <input type="submit" value="Save" class="np_des_addaccess_btn mat10" name="button">
            <input type="button" value="Cancel" onclick="cancel_edit()" class="np_des_addaccess_btn mat10" name="button">
        </span>


 <!--            <div class="oisdes_adminstore_leftbox  mal10">
                <?php if($upd_status == 1){?>
                <span style="color:red;" id="status_disp_span"><strong>Updated Successfully</strong></span>
                <?php }?>
            <div class="mab10 overflow">
                <p class="fll wi100pstg"> Store Name <span class="flr blue"> <a href="javascript:edit_element_details('store_name');"> Edit </a> </span> </p>
                <span id="name_ta_span" style="display: none;">
                    <p><input type="text" name="store_name" id="store_name" value="<?php echo $store_details[0]["store_name"];?>"></p>
                </span>
                <span id="name_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_name"];?> </p>
                </span>
            </div>

            <div class="mab10 overflow">
                <div class="fll wi100pstg"> <p class="fll"> Store Category Type </p> <span class="flr blue"></span>  </div>
                <span id="about_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_category"];?></p>
                </span>
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
            <div class="fll wi100pstg"> <p class="fll"> Privacy Policy </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_privacy_policy');"> Edit </a> </span>  </div>
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
            <div class="fll wi100pstg"> <p class="fll"> Damages Policy </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_security_policy');"> Edit </a> </span>  </div>
                <span id="sec_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_security_policy" id="store_security_policy"><?php echo $store_details[0]["store_damage_policy"];?></textarea> </p>
                </span>
                <span id="sec_policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_damage_policy"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
            <div class="fll wi100pstg"> <p class="fll"> Security Policy </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_secure_policy');"> Edit </a> </span>  </div>
                <span id="secure_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_secure_policy" id="store_secure_policy"><?php echo $store_details[0]["store_security_policy"];?></textarea> </p>
                </span>
                <span id="secure_policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_security_policy"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
            <div class="fll wi100pstg"> <p class="fll"> Return & Refund Policy </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_return_policy');"> Edit </a> </span>  </div>
                <span id="rtn_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_return_policy" id="store_return_policy"><?php echo $store_details[0]["store_return_policy"];?></textarea> </p>
                </span>
                <span id="rtn_policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_return_policy"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
            <div class="fll wi100pstg"> <p class="fll"> Purchasing Agreenment </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_agreement');"> Edit </a> </span>  </div>
                <span id="agre_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_agreement" id="store_agreement"><?php echo $store_details[0]["store_agreement"];?></textarea> </p>
                </span>
                <span id="agre_policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_agreement"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
            <div class="fll wi100pstg"> <p class="fll"> Delivery Poliy </p> <span class="flr blue"> <a href="javascript:edit_element_details('store_del_policy');"> Edit </a> </span>  </div>
                <span id="del_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="store_del_policy" id="store_del_policy"><?php echo $store_details[0]["store_del_policy"];?></textarea> </p>
                </span>
                <span id="del_policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["store_del_policy"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
            <div class="fll wi100pstg"> <p class="fll"> Customer's Rights Declaration </p> <span class="flr blue"> <a href="javascript:edit_element_details('crd_policy');"> Edit </a> </span>  </div>
                <span id="crd_policy_ta_span" style="display: none;">
                    <p> <textarea class="oneshop_about_textareabox wi100pstg" name="crd_policy" id="crd_policy"><?php echo $store_details[0]["crd_policy"];?></textarea> </p>
                </span>
                <span id="crd_policy_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"> <?php echo $store_details[0]["crd_policy"];?></p>
                </span>
            </div>

            <div class="mab10 overflow">
                <div class="fll wi100pstg">
                    <p class="fll wi100pstg"> Store Logo </p> <span class="flr blue"> 
                        <a id="ospicchange" style="cursor:pointer;"> Edit </a> </span>
                </div>
                <span id="edit_logo_span" style="display: none;">
                    <p> <input type="file" name="store_logo"> </p>
                </span>
                <span id="edit_logo_disp_span" style="display: inline;">
                    <?php if($store_details[0]["profile_image_path"] != ""){?>
                        <p class="fll cartlogos">
                        <img id="storeeditpic" style="transform: scaleY(1.5);" src="<?php echo STORE_PATH.$store_code."/logo/si/".$store_details[0]["profile_image_path"]; ?>" alt="<?php echo ucfirst($store_details[0]["store_name"])?>"></p>
                    <?php }else{?>
                        <p class="fl"><strong>No Logo Selected.</strong></p>
                    <?php }?>

                </span>
            </div>

            <div class="oisdes_adminstore_leftbox">

            <div class="borderbottom mab10 pab5 wi100pstg fll"> <h3 class="fll"> Services </h3> <p class="flr">
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

            </div> -->

 <!--            <div class="oisdes_adminsmall_fields_wrap">
                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Currency <span class="flr blue"> <a href="javascript:edit_element_details('currency');"> Edit </a> </p>
                        <span id="curr_ta_span" style="display: none;">
                        <p>
                    <select class="oneshop_selectbox_field selectType" name="currency" id="currency">
                            <option value="">--Select Currency--</option>
                            <?php
                            foreach ($currency_list as $curKey => $curVal) {
                              ?>
                              <option value="<?php echo $curKey; ?>"><?php echo $curVal; ?></option>
                              <?php }
                            ?>
                        </select>
                    </p>
                </span>
                <input type="hidden" name="currency_store" id="currency_store" value="<?php echo $store_details[0]["currency"];?>">
                <span id="curr_disp_span" style="display: inline;">
                    <p class="fs14 fll bold"><?php echo $store_details[0]["currency"];?></p>
                </span>
                </div>

                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Timezone <span class="flr blue"> <a href="javascript:edit_element_details('timezone');"> Edit </a>  </p>
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
                if( $store_details[0]["delivery_mode"] == "Both"){
                    $delivery_mode = "Delivery & Pickup";
                }else if( $store_details[0]["delivery_mode"] == "Delivery"){
                    $delivery_mode = "Delivery";
                }else if( $store_details[0]["delivery_mode"] == "Pickup"){
                    $delivery_mode = "Pickup";
                }
                if($store_details[0]["payment_mode"]==="PBD"){
                  $pay_mode="Pay Before Delivery";
                }
                ?>
                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Delivery Type <span class="flr blue"> <a href="javascript:edit_element_details('delivery_mode');"> Edit </a> </span></p>
                    <span id="delivery_ta_span" style="display: none;">
                        <p>
                            <select class="selectType" name="delivery_mode" id="delivery_mode" >
                                <option value="">--Select Delivery Type--</option>
                                <option value="Both" <?php if($store_details[0]["delivery_mode"] == "Both")echo "selected";?>>Both</option>
                                <option value="Delivery" <?php if($store_details[0]["delivery_mode"] == "Delivery")echo "selected";?>>Delivery</option>
                                <option value="Pickup" <?php if($store_details[0]["delivery_mode"] == "Pickup")echo "selected";?>>Pickup</option>
                             </select>
                        </p>
                    </span>
                    <span id="delivery_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $delivery_mode;?></p>
                    </span>
                </div>
                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Payment Type</p>
                    <span id="delivery_disp_span" style="display: inline;">
                        <p class="fs14 fll bold"> <?php echo $pay_mode;?></p>
                    </span>
                </div>
               <?php
               if($store_details[0]["expired_on"] != ""){
                   $expire_date_on = date("M d, Y H:i:s", strtotime($store_details[0]["expired_on"]));
               }
               ?>
                <div class="mab10 overflow">
                    <p class="fll wi100pstg"> Expiration Date </p>
                    <p class="fs14 fll bold"> <?php echo $expire_date_on;?> </p>
                </div>
            </div> -->
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
