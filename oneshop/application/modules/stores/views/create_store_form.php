<?php
    //Get Package Selected
    $package_selected = $selected_package_type;
?>
<div class="oneshop_container_middle_section mat10">
       <div class="oneshop_left_newcontainer pab10">
           <h2 class="mat10 borderbottom wi100pstg mab10 fll"> Create Your Store </h2>
            <div class="oneshop_leftwrapper_box mat15">
                <form id="store_reg_form">
                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url();?>">
                <div class="oneshop_fieldsbox" id="store_name_div">
                    <div class="wi100pstg mab5"> Store Name  </div>
                    <div class="wi100pstg"> <input type="text" placeholder="Enter Store Name Here" name="store_name" id="osdev_store_name" class="oneshop_productfield_textbox"> </div>
                    <div class="wi100pstg fs11 red clearfix" id="osdev_store_name_error"> Please write your store name </div>
                </div>
                <div class="oneshop_fieldsbox" id="store_name_div">
                    <div class="wi100pstg mab5"> Address line  </div>
                    <div class="wi100pstg"> <textarea placeholder="Enter address of your store..." name="store_address" id="osdev_store_address" rows="3" cols="50"></textarea></div>
                    <div class="wi100pstg fs11 red clearfix" id="osdev_store_address_error"> Please enter address of your store</div>
                </div>
                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> Category of Store  </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="Category" id="osdev_Category">
                            <option value="">--Select Category--</option>
                            <?php
                            // echo var_dump($category_list);
                            //foreach ($country_info as $country_inf) {
                            foreach ($category_list as $category_lst) {
                              ?>
                              <option value="<?php echo $category_lst; ?>"><?php echo $category_lst; ?></option>
                              <?php }
                            ?>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_Category_error"> Please select Category of your store</p>
                    </div>
                </div>
                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> Package Type </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="SPackage_Type" id="osdev_PackageType">
                            <option value="">--Select Package Type--</option>
                            <?php
                            if($package_selected!=""){
                                $pckg_list=explode(',',$package_list);
                                foreach ($pckg_list as $package_info) {
                                    $package_opt=explode("-",$package_info);
                                  ?>
                                  <option value="<?php echo $package_opt[0]; ?>" <?php if($package_selected == $package_opt[0]){ echo "selected='selected'"; } ?>><?php echo $package_opt[1]; ?></option>
                            <?php
                                }
                            }
                            ?>

                        </select>
                        <input type="hidden" name="package_type_selected" id="package_type_selected" value="<?php echo $package_selected; ?>">
                        <p class="wi100pstg fs11 red clearfix" id="osdev_PackageType_error"> Please select the Package Type </p>
                    </div>
                </div>

               <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> Package Term  </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="SPackage_period" id="osdev_PackagePeriod" >
                           <option value="">--Select Package Term--</option>
                           <option value="12">1 Year</option>
                           <option value="24">2 Year</option>
                           <option value="36">3 Year</option>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_PackagePeriod_error"> Please select the Package period </p>
                    </div>
                </div>
                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> Country </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="Country" id="osdev_Country">
                            <option value="">--Select Country--</option>
                            <?php
                            //foreach ($country_info as $country_inf) {
                            foreach ($country_info as $country_inf) {
                              ?>
                              <option value="<?php echo $country_inf['country_id']; ?>"><?php echo $country_inf['country_name']; ?></option>
                              <?php }
                            ?>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_Country_error"> Please select Country</p>
                    </div>
                </div>

                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> State  </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="State" id="osdev_State" >
                            <!--<option value="Telangana">Telangana</option>-->
                            <option value="">--Select State--</option>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_State_error"> Please select state </p>
                    </div>
                </div>

                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> City  </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="City" id="osdev_City" >
                            <option value="">--Select city--</option>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_City_error"> Please select city </p>
                    </div>
                </div>

                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> Zip code  </div>
                    <div class="wi100pstg"> <input type="text" placeholder="Zip code" name="Zip_code" id="osdev_Zipcode" class="oneshop_productfield_textbox" maxlength="10"> </div>
                    <p class="wi100pstg fs11 red clearfix" id="osdev_Zipcode_error"> Please enter the zip code </p>
                </div>

                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5">Currency</div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="Currency" id="Currency">
                            <option value="">--Select Currency--</option>
                            <?php
                            foreach ($currency_list as $curKey => $curVal) {
                              ?>
                              <option value="<?php echo $curKey; ?>"><?php echo $curVal; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <p class="wi100pstg fs11 red clearfix" id="Curency_error"> Please select currency </p>
                </div>
                                <!-- Liceance Regiration -->
                <h2 class="mat10 borderbottom wi100pstg mab10 fll"> License Registration   </h2>
                    <div class="oneshop_leftwrapper_box mat15">
                        <div class="oneshop_fieldsbox" id="register_number_div">
                            <div class="wi100pstg mab5"> Registration Number </div>
                            <div class="wi100pstg"> <input type="text" placeholder="Enter Registration Number Here" name="register_number" id="osdev_register_number" class="oneshop_productfield_textbox"> </div>
                            <div class="wi100pstg fs11 red clearfix" id="osdev_register_number_error"> Please write registration number name </div>
                        </div>
                    </div>
                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> Country of Issue  </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="Country_of_issue" id="osdev_Country_of_issue">
                            <option value="">--Select Country--</option>
                            <?php
                            //foreach ($country_info as $country_inf) {
                            foreach ($country_info as $country_inf) {
                              ?>
                              <option value="<?php echo $country_inf['country_id']; ?>"><?php echo $country_inf['country_name']; ?></option>
                              <?php }
                            ?>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_Country_of_issue_error"> Please select Country of issue</p>
                    </div>
                </div>

                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> State of Issue  </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="State_of_issue" id="osdev_State_of_issue" >
                            <!--<option value="Telangana">Telangana</option>-->
                            <option value="">--Select State--</option>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_State_of_issue_error"> Please select state of issue </p>
                    </div>
                </div>

                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> City of Issue  </div>
                    <div class="wi100pstg">
                        <select class="oneshop_selectbox_field selectType" name="City_of_issue" id="osdev_City_of_issue" >
                            <option value="">--Select city--</option>
                        </select>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_City_of_issue_error"> Please select city of issue </p>
                    </div>
                </div>

                <div class="oneshop_fieldsbox">
                    <div class="wi100pstg mab5"> Registration Expiration Date  </div>
                    <div class="wi100pstg"> <input type="date"  name="registration_expiration_date" id="osdev_registration_expiration_date" class="oneshop_productfield_textbox"> </div>
                    <p class="wi100pstg fs11 red clearfix" id="osdev_registration_expiration_date_error"> Please enter the registration Expiration date </p>
                </div>
                    
                <!-- Liceance Regiration -->
                <div class="oneshop_fieldsbox">
                    <!-- <div class="wi100pstg mab5"> Delivery Type </div> -->
                    <div class="wi100pstg">
                        <?php 
                            $spckg_list=explode(',',$package_list);
                            foreach ($spckg_list as $package_info){
                            $spackage_opt=explode("-",$package_info);
                            if($package_selected==$spackage_opt[0]){
                            ?>
                        <input type="checkbox" name="Terms" id="osdev_Terms">  
                        <span class="bold">I agree to ONEIDNET AGREEMENT of Plan </span><a href="javascript:void(0)" onclick="agree_open(<?php echo $spackage_opt[0]?>)" class="red bold">
                            <?php echo $spackage_opt[1]?> Store</a>
                        <?php }
                        }?>
                        <p class="wi100pstg fs11 red clearfix" id="osdev_term_error"> Please Check the box</p>
                    </div>
                </div>
                <div style="margin:10px;display:none;" id="progress_div"><img src="<?php echo base_url().'assets/images/ajax-loader.gif'?>"/></div>
                <div class="flr mab10" style="margin-right:250px;">
                    <input type="hidden" id="hpackage_id" name="hpackage_id" value=""/>
                    <input type="submit" class="np_des_addaccess_btn" value="Proceed">
                </div>
               </form>

                <!--<button class="oneshop_basicInfoBtn">Proceed</button> -->
            </div>
        </div>


    <div class="oneshop_right_newcontainer">
      
	</div>


    </div>
<script type="text/javascript" src="<?php echo base_url() . "assets/microjs/"; ?>validation.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/microjs/"; ?>add_store.js"></script>

<style type="text/css">
   #osdev_Delivery_Mode_error,
    #osdev_store_address_error,
    #osdev_PackagePeriod_error,
    #osdev_store_name_error,
    #osdev_Category_error,
    #osdev_term_error,
    #osdev_Country_error,
    #osdev_Country_of_issue_error,
    #osdev_State_error,
    #osdev_State_of_issue_error,
    #osdev_City_error,
    #osdev_City_of_issue_error,
    #osdev_registration_expiration_date_error,
    #osdev_register_number_error,
    #osdev_Zipcode_error,
    #osdev_Enquirymobilenumber_error,
    #osdev_ServiceEmail_error,
    #Curency_error,
    #osdev_PackageType_error{
        display:none;
    }
    .displayError{display:block;}
</style>
<script type="text/javascript">
    function agree_open(input){
        if(input=='1'){
            var storeagre = oneshop_url + '/stores/new_store_package';
        }else if(input=='2'){
            var storeagre = oneshop_url + '/stores/basic_store_package';
        }else if(input=='3'){
            var storeagre = oneshop_url + '/stores/regular_store_package';
        }else if(input=='4'){
            var storeagre = oneshop_url + '/stores/bronze_store_package';
        }else if(input=='5'){
            var storeagre = oneshop_url + '/stores/silver_store_package';
        }else if(input=='6'){
            var storeagre = oneshop_url + '/stores/gold_store_package';
        }else if(input=='7'){
            var storeagre = oneshop_url + '/stores/platinum_store_package';
        }else if(input=='8'){
            var storeagre = oneshop_url + '/stores/unlimited_store_package';
        }
        var myWind = window.open(storeagre,  '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');
    }
</script>
