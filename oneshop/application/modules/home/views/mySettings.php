<?php
$this->load->module('templates');
$this->templates->app_header(  ); 
$this->templates->os_mainmenu(  ); 
?>     
          
<body>
<div class="oneshop_wrapper">
	<div class="oneshop_innerWrapper">
   
    	<?php
    // print_r($user_information);
     $address=$user_information[0]['addressline1'];
 //echo  $sizeofarray=count($user_information);
     //print_r($states_info);
   // print_r($countries_states_info);die;
      ?>
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
        	<div class="oneshop_ProfilePage">
           
       <div class="oneshop_profileDetails">
                
         
         <span class="oneshop_coverPicWrapper">
                	<img src="<?php echo base_url()."data/cover/orig/".$user_information[0]['profile_cover_img']?>"  class="oneshop_coverPic" id="osdev_storecove_pic">
         </span>
                 
                    <div class="oneshop_profilePicandName">
                           
	                    <img src="<?php echo base_url()."data/profile/mi/".$user_information[0]['profile_img']?>" class="oneshop_ppProfilePic" id="osdev_store_logo_display">
                     
                      <span class="oneshop_profileName"><h2><?php echo $user_information[0]['profile_name'];?></h2></span>
                    </div>
                </div>
                </div>
        
        	<div class="oneshop_leftSection">
            	 
                <div class="oneshop_myStoreSettings">
                  <?php if($address!=''){?>
                	<div class="oneshop_myStoreBasicInfo" style="display:block" id="non_editable">
                    	<h4>Address Details</h4>
                        <div class="oneshop_mystoreSettinsField">
                            <span class="onshop_formsFieldLables"><h5>Address Line 1 :</h5></span>                        
                            <textarea class="oneshop_mystoreField textAreaType"id="dev_os_addr1" name="dev_os_addr1" readonly><?php echo $user_information[0]['addressline1'];?></textarea>
                        </div>
                        <div class="oneshop_mystoreSettinsField">
                        	<span class="onshop_formsFieldLables"><h5>Address Line 2 :</h5></span>
                          <textarea class="oneshop_mystoreField textAreaType" id="dev_os_addr2" name="dev_os_addr2" readonly><?php echo $user_information[0]['addressline2'];?></textarea>
                        </div>                                                
                        <div class="oneshop_mystoreSettinsField">
                        	<span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                            <select  id="dev_os_country"  name="dev_os_country" class="oneshop_mystoreField selectType" disabled="disabled">
                            		<option value="<?php echo$country_info[0][country_id];?>"><?php echo$country_info[0][country_name];?></option>
                
                            </select>
                        </div>
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                        <select name="state" class="oneshop_mystoreField selectType" disabled="disabled">
                                <option value="<?php echo $states_info[0][state_id];?>"><?php echo$states_info[0][state_name];?></option>
                                </select>
                            
                        </div>
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                            <select class="oneshop_mystoreField selectType" disabled="disabled">
                            	<option value="<?php echo$cities_info[0][city_id];?>"><?php echo$cities_info[0][city_name];?></option>
                            </select>
                        </div>                              
                        
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Zip Code :</h5></span>
                        <input type="text" maxlength="6"  value="<?php echo $user_information[0]['zip_code']?>" name="zip_code"class="oneshop_mystoreField" readonly>
                        </div>  
                        <button class="oneshop_basicInfoBtn" id="edit_settings">Edit</button>
                    </div>
                    <?php
                  }
                  else{?>
                          <div id="edit_div" style="display:block">
                             <form id="os_user_settings">
                            <div class="oneshop_myStoreBasicInfo">
                    	<h4>Address Details</h4>
                        <div class="oneshop_mystoreSettinsField">
                            <span class="onshop_formsFieldLables"><h5>Address Line 1 :</h5></span>                        
                            <textarea class="oneshop_mystoreField textAreaType" id="dev_os_addr1" name="dev_os_addr1"><?php echo $user_information[0]['addressline1'];?></textarea>
                        </div>
                        <div class="oneshop_mystoreSettinsField">
                        	<span class="onshop_formsFieldLables"><h5>Address Line 2 :</h5></span>
                            <textarea class="oneshop_mystoreField textAreaType" id="dev_os_addr2" name="dev_os_addr2"><?php echo $user_information[0]['addressline2'];?></textarea>
                        </div>                                                
                        <div class="oneshop_mystoreSettinsField">
                        	<span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                          <?php //print_R($countries_info); ?>
                            <select  id="dev_os_country"  name="dev_os_country" class="oneshop_mystoreField selectType">
                            	
                              <?php foreach($countries_info as $country_names){?>	
                              <option value="<?php echo $country_names[country_id];?>"><?php echo$country_names[country_name];?></option>
                              <?php }?>
                            </select>
                        </div>
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                        <select name="state" id="dev_os_state_list" name="dev_os_state_list"class="oneshop_mystoreField selectType">
                           <option value="<?php echo $states_info[0][state_id];?>"><?php echo$states_info[0][state_name];?></option>
                          <?php foreach($countries_states_info as $statenames){?>    
                          <option value="<?php echo$statenames['state_id']?>"><?php echo$statenames['state_name']?></option>
                          <?php
                          }?>
                                </select>
                            
                        </div>
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                            <select class="oneshop_mystoreField selectType" name="dev_os_cities_list" id="dev_os_cities_list">
                              <option value="<?php echo$cities_info[0][city_id];?>"><?php echo$cities_info[0][city_name];?></option>
                              <?php foreach($countries_cities_info as $citiesnames){?>
                            	<option value="<?php echo $citiesnames['city_id']?>"><?php echo $citiesnames['city_name'];?></option>
                            <?php
                              }?>
                            </select>
                        </div>                              
                        
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Zip Code :</h5></span>
                            <input type="text" maxlength="6" id="zip_code"  value="<?php echo $user_information[0]['zip_code']?>" name="zip_code"class="oneshop_mystoreField">
                    <p id="response" style="color: 'green'; font-size: 10pt"></p>	
                        </div>  
                      
                      
                        <button class="oneshop_basicInfoBtn">save</button>
                        
                    </div>
                    
                               </form>
                            </div>
                        <?php
                  }?>
         
                  
                  <div id="edit_div" style="display:none">
                             <form id="os_user_settings">
                            <div class="oneshop_myStoreBasicInfo">
                    	<h4>Address Details</h4>
                        <div class="oneshop_mystoreSettinsField">
                            <span class="onshop_formsFieldLables"><h5>Address Line 1 :</h5></span>                        
                            <textarea class="oneshop_mystoreField textAreaType" id="dev_os_addr1" name="dev_os_addr1"><?php echo $user_information[0]['addressline1'];?></textarea>
                        </div>
                        <div class="oneshop_mystoreSettinsField">
                        	<span class="onshop_formsFieldLables"><h5>Address Line 2 :</h5></span>
                            <textarea class="oneshop_mystoreField textAreaType" id="dev_os_addr2" name="dev_os_addr2"><?php echo $user_information[0]['addressline2'];?></textarea>
                        </div>                                                
                        <div class="oneshop_mystoreSettinsField">
                        	<span class="onshop_formsFieldLables"><h5>Country :</h5></span>
                            <select  class="oneshop_mystoreField selectType" name="os_country">
                            		<option value="<?php echo$country_info[0][country_id];?>"><?php echo$country_info[0][country_name];?></option>
                            </select>
                        </div>
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>State :</h5></span>
                        <select name="state" id="dev_os_state_list" name="dev_os_state_list"class="oneshop_mystoreField selectType">
                           <option value="<?php echo $states_info[0][state_id];?>"><?php echo$states_info[0][state_name];?></option>
                          <?php foreach($countries_states_info as $statenames){?>    
                          <option value="<?php echo$statenames['state_id']?>"><?php echo$statenames['state_name']?></option>
                          <?php
                          }?>
                                </select>
                            
                        </div>
						<div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>City :</h5></span>
                            <select class="oneshop_mystoreField selectType" name="dev_os_cities_list" id="dev_os_cities_list">
                              <option value="<?php echo$cities_info[0][city_id];?>"><?php echo$cities_info[0][city_name];?></option>
                              <?php foreach($countries_cities_info as $citiesnames){?>
                            	<option value="<?php echo $citiesnames['city_id']?>"><?php echo $citiesnames['city_name'];?></option>
                            <?php
                              }?>
                            </select>
                        </div>                              
                        
                        <div class="oneshop_mystoreSettinsField">
                        <span class="onshop_formsFieldLables"><h5>Zip Code :</h5></span>
                            <input type="text" maxlength="6" id="zip_code"  value="<?php echo $user_information[0]['zip_code']?>" name="zip_code"class="oneshop_mystoreField">
                    <p id="response" style="color: 'green'; font-size: 10pt"></p>	
                        </div>  
                      
                      
                        <button class="oneshop_basicInfoBtn">save</button>
                        
                    </div>
                    
                               </form>
                            </div>
			
        <!--	<div class="oneshop_rightSection">
            </div>  -->                
            </div>    
     
        </div>
            

    <!--Oneshop Footer starts Here(vinod 19-05-2015)-->
    	<?php
$this->templates->app_footer(  ); 
?>
               
	</div>

</body>
</html>
