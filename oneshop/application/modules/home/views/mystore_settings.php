
<?php
$this->load->module('templates');
$this->templates->os_Store_Header();
$this->templates->mystore_Menu();
?>
<input type="hidden" value="<?php print_R($store_info[0]["store_id"]); ?>" id="stuid" >
<?php 
//echo "<pre>"; print_R($store_info[0]["store_id"]); echo "</pre>"; 
?>
<input type="hidden" value="<?php print_R($store_info[0]["store_aid"]); ?>" id="hstore_aid">

<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_contentSection">
    <div class="oneshop_leftSection">
        <span class="oneshop_settingsHead">
            <h3 id="My_Store_Setting">My Store Settings</h3>
        </span>
       
        <span class="oneshop_settingsHead">
            <h3 id="Manage_staff">Manage Staff</h3>
        </span>
       
        <span class="oneshop_settingsHead">
            <h3 id="os_notify">Notifications</h3>
        </span>
       
        <div class="oneshop_myStoreSettings">
            
            <form id="store_info_update">
            <?php foreach($store_info as $store_information){
              ?>
            
            <div class="oneshop_myStoreBasicInfo" id="Store_Basic_info_div">
                <h4>Store Basic Information</h4>
              
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Store Name :</h5></span>
                    <input type="text" class="oneshop_mystoreField" placeholder="Enter Store Name Here" value="<?php echo $store_information["name"];?>" readonly="readonly" name="Store_Name" id="Store_Name">
                </div>

                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                     <select class="oneshop_mystoreField selectType" name="country_id" id="country_id">
                         <?php foreach($country_info as $country_information){
                           ?>
                         <option value="<?php echo $country_information["country_id"];?>"><?php echo $country_information["country_name"];?></option>  
                             <?php
                         }?>
                         
                    </select>
                </div> 
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                     <select class="oneshop_mystoreField selectType" name="state_id" id="dev_os_state_list">
                         <?php foreach($state_info as $state_information){
                           ?>
                         <option value="<?php echo $state_information["state_id"];?>" <?php if($store_information["state"]==$state_information["state_id"]){ echo "selected"; }?> ><?php echo $state_information["state_name"];?></option>  
                             <?php
                         }?>
                    </select>
                </div> 
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                      <select class="oneshop_mystoreField selectType" name="city_id" id="dev_os_cities_list">
                         <?php foreach($city_info as $city_information){
                           ?>
                         <option value="<?php echo $city_information["city_id"];?>" <?php if($store_information["city"]==$city_information["city_id"]){ echo "selected"; }?> ><?php echo $city_information["city_name"];?></option>  
                             <?php
                         }?>
                    </select>

                </div> 
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Zip code :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" placeholder="Zip code"  maxlength="8" value="<?php echo $store_information["zip_code"];?>" name="Zip_ode" id="Zip_code">
                </div>  
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Helpline Number  :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" placeholder="+919848022338"  maxlength="17" value="<?php echo $store_information["helpline_number"];?>" name="Helpline Number" id="Helpline_Number">
                </div>  
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Enquiry mobile number :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" placeholder="+919848022338"  maxlength="17" value="<?php echo $store_information["enq_mobile_number"];?>" name="Enquiry mobile number" id="Enquiry_mobile_number">
                </div>  
                
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Service Email :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" placeholder="email@oneidnet.com" value="<?php echo $store_information["service_email"];?>" name="Service Email" id="Service_Email">
                </div>  
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Problem Reporting Email :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" placeholder="email@oneidnet.com" value="<?php echo $store_information["prob_reporting_email"];?>" name="Problem Reporting Email" id="Problem_Reporting_Email">
                </div>  
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Time Zone :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" placeholder="Asia/Calcutta" value="<?php echo $store_information["timezone"];?>" readonly="readonly" name="Time Zone" id="Time_Zone">
                </div>  
                 <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Is Official :</h5></span>
                     <select class="oneshop_mystoreField selectType" name="Is Official" id="Is_Official">
                         <option value="Yes" <?php if($store_information["is_official"]=="1"){ echo "selected";} ?> >Yes</option>  
                         <option value="No" <?php if($store_information["is_official"]=="0"){ echo "selected";} ?> >No</option>  
                    </select>
                </div> 
                    
                <input type="submit" value="Save" class="oneshop_basicInfoBtn" >
                <!--<button class="oneshop_basicInfoBtn">Save</button>-->
                <div class="oneshop_mystoreSettinsField" style="color:black;display:none;" id="store_update_success_message">store details updated</div>
            </div>
            
            <?php
            }?>
            <div style="float:left;">
                <input type="checkbox" name="check_admin" id="check_admin"/>
                <input type="text" name="user_email" id="user_email" style="display:none;"/>
                <button id="send_btn" style="padding:5px 10px;display:none;">Send</button>
            </div>
            </form>
<!--my staff start-->
<!--my staff start-->
<!--my staff start-->
            <div class="oneshop_myStoreManageStaff" id="manage_staff_div" style="display:none">
                <?php include("staff_detail_view.php"); ?>
                
            </div> 
<!--my staff END-->
<!--my staff END-->
            <div class="oneshop_myStoreNotifications" id="notification_div" style="display:none">
                <h4>Notifications</h4>
                  <?php // echo "<pre>";print_R($notification_settings); echo "</pre>";
                  ?>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Notify me when new order received</h5></span>    
                    <input <?php if($notification_settings[0]["notify_new_orders"]=='Y'){ echo "checked"; }?> type="checkbox" class="oneshop_mystoreField checkBoxType" id="osdev_order_recived">
                </div> 
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Notify me when any product is out of stock</h5></span>                
                    <input <?php if($notification_settings[0]["notify_out_of_stock"]=='Y'){ echo "checked"; }?> type="checkbox" class="oneshop_mystoreField checkBoxType" id="osdev_outof_stock">
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Notify me when user reported on Store</h5></span>                        
                    <input <?php if($notification_settings[0]["notify_report"]=='Y'){ echo "checked"; }?> type="checkbox" class="oneshop_mystoreField checkBoxType" id="osdev_reported_onstore">
                </div>
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Notify me when User cancel the order</h5></span>                        
                    <input <?php if($notification_settings[0]["notify_cancel"]=='Y'){ echo "checked"; }?> type="checkbox" class="oneshop_mystoreField checkBoxType" id="osdev_cancle_order">
                </div>                                                                                             
                <button class="oneshop_basicInfoBtn" id="osdev_notify_submit">Save</button>
                <div class="oneshop_mystoreSettinsField" style="color:green;display:none;" id="notification_success_msg"  >Notification settings Successfully updated</div>
                 
            </div>  

        </div>
    </div>
    <?php
    $this->load->module("ads");
    $this->ads->ads_view();
    ?>                 
</div>   
 <?php
$this->templates->app_footer();
?>


<div class="click_popUp" id="click_officialSettings" >
              <div class="click_createGroupPopUpWrapper">
                <a href="javascript: void(0)" onClick="toggle_popUpVisibility('click_officialSettings');">
                  <span class="click_createGroupPopUpCloseBtn" style="margin: 5px 0 0 670px;"><h2>X</h2></span></a> 
                <div class="click_popUpSection"> 
                  <div class="click_officialSettingsHeader">OfficialDetails</div>  
                  
                    <div class="click_officialSettingsForm">
                         <form id="official_details1"  name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
          <input type="hidden" name="cmd" value="_xclick">
          <input type="hidden" name="business" value="sravya.n526-facilitator@gmail.com"><!--  sravya.n526@gmail.com  /  sravya.n526-facilitator@gmail.com merchant account details-->
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="amount" value="100">
          <input type="hidden" name="quantity" value="1">
          <input type="hidden" name="custom" value="<?php echo $store_info[0]["store_aid"]; ?>">
          <input type="hidden" name="return" value="<?php echo base_url().'home/upgradePkg'?>">
          <input type="hidden" name="notify_url" value="paypal/ipn.php">
          <input type="hidden" name="cancel_return" value="<?php echo base_url().'home/cancel'?>">
  <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Store Name :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"  maxlength="8" value="<?php echo $store_information["name"];?>" readonly="readonly" name="official_storename" id="official_storename">
                </div>  
    <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Reference Name  :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" maxlength="17" value="" name="official_helpline" id="official_helpline">
                </div>  
   <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Reference number :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"   maxlength="17" value="" name="official_enquirynumber" id="official_enquirynumber">
                </div> 
  <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Address line1 :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"  value=""  id="official_addressline1" name="official_addressline1">
    </div> 
   <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Address line2 :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"  value="" name="official_addressline2" id="official_addressline2">
    </div> 
  <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Zip code</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"   maxlength="7" value="" name="official_zipcode"  id="official_zipcode">
     </div>
  <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Mobile number :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" placeholder="+919848022338"  maxlength="17" value="" name="official_mobile_num" id="official_mobile_num">
                </div> 
   <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Email Id :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"  value=""name="official_emailId"  id="official_emailId">
    </div> 
   <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Company name :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"  value="" name="official_company" id="official_company">
    </div> 
   <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>web site :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"  value="" name="official_website" id="official_website">
    </div> 
   <div class="oneshop_mystoreSettinsField"  >
                    <span class="onshop_formsFieldLables" ><h5>company turnover :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" maxlenth="4"value="" name="official_turnover"  id="official_turnover">
    </div> 
  <div class="oneshop_mystoreSettinsField"  >
                    <span class="onshop_formsFieldLables"  ><h5>Landline number  extention:</h5></span>                        
                    <input type="text" class="oneshop_mystoreField" value="" name="official_landline_number_ext" id="official_landline_number_ext">
    </div> 
   <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Landline number :</h5></span>                        
                    <input type="text" class="oneshop_mystoreField"  value=""  name="official_landline_number" id="official_landline_number">
    </div> 
   <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                     <select class="oneshop_mystoreField selectType" name="official_country_id" id="country_id">
                         <?php foreach($country_info as $country_information){
                           ?>
                         <option value="<?php echo $country_information["country_id"];?>"><?php echo $country_information["country_name"];?></option>  
                             <?php
                         }?>
                         
                    </select>
                </div> 
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                     <select class="oneshop_mystoreField selectType" name="dev_os_state_list_official" id="dev_os_state_list_official">
                         <?php foreach($state_info as $state_information){
                           ?>
                         <option value="<?php echo $state_information["state_id"];?>"><?php echo $state_information["state_name"];?></option>  
                             <?php
                         }?>
                    </select>
                </div> 
                <div class="oneshop_mystoreSettinsField">
                    <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                      <select class="oneshop_mystoreField selectType" name="dev_os_cities_list_official" id="dev_os_cities_list_official">
                         <?php foreach($city_info as $city_information){
                           ?>
                         <option value="<?php echo $city_information["city_id"];?>"><?php echo $city_information["city_name"];?></option>  
                             <?php
                         }?>
                  
                      </select>
                    </div>
    <div class="oneshop_mystoreSettinsField"  >
          <span class="onshop_formsFieldLables" ><h5>Description :</h5></span>                        
          <textarea class="oneshop_mystoreField" value="" maxlength="600"name="official_description"  id="official_description"></textarea>
    </div> 
            <div class="oneshop_mystoreSettinsField">               
 <button class="oneshop_basicInfoBtn" id="isofficial_settings_submit">Submit</button>
  </div>
  </form> 
                      </div>
                </div>
              </div>
              </div>

  
  <style type="text/css">
.click_popUp{
	display: none;
	position: fixed;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.6);
	z-index: 1015;}
.click_popUpWrapper, .click_createGroupPopUpWrapper{

	margin: 50px 0 0 250px;
	box-shadow: 0 0 5px #000;
	width: 850px;
	height: 500px;
	background-color: #f5f5f5;
	border-radius: 5px;}
.click_createGroupPopUpWrapper{
	width: 500px;
	height: 300px;
	margin: 100px auto;}


.click_popUpCloseBtn, .click_createGroupPopUpCloseBtn{
	cursor: pointer;
	position: absolute;
	z-index: 10;
	width: 25px;
	height: 25px;
	margin: -10px 0 0 830px;
	box-shadow: 0 0 3px #333;
	border-radius: 15px;
	background-color: #555;
	border: solid 1px white;}
.click_createGroupPopUpCloseBtn{
	margin: -10px 0 0 485px;}	
.click_popUpCloseBtn h2, .click_createGroupPopUpCloseBtn h2{
	float: left;
	margin: 3px 0 0 8px;
	font: 15px Arial;
	color: white;}
.click_officialSettingsHeader{
  float: left;
  padding: 10px 10px 0 10px;
  height: 30px;
  width: 680px;
  font: 16px Arial;
  border-bottom: solid 1px #aaa;
  background-color: #eee;
  color: #555;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
}
.click_officialSettingsForm{
  float: left;
  background-color: #ccc;
  overflow-y: auto;
  overflow-x: hidden;
  height: 360px;
  width: 700px;
}


        </style>