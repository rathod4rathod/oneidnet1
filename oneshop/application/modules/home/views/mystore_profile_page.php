<?php
if(!isset($_SESSION))  {
  session_start(); 
  }
//print_R($results_store[0]["store_id"]);
//print_R($results_store);
$this->load->module('templates');
if($results_store[0]["store_id"]==$results_store[0]["own_store_id"]){
  $this->templates->os_Store_Header(  ); 
  $this->templates->mystore_Menu(  );
}else{
  $this->templates->app_header(  );
  $this->templates->os_mainmenu(  );
}
$id=$this->input->POST('storeid');
    ?>
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jRating.jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/jRating.jquery.css" type="text/css" />


                  
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
        	<div class="oneshop_ProfilePage">
            	<div class="oneshop_profileDetails">
                <?php 
               // print_r($results);
                foreach($results_store as $values){
                 $dev_oneshop_storeaid=$values['store_aid'];
                  $dev_oneshop_storeid=$values['store_id'];
                  $dev_oneshop_store_name=$values['name'];
                  $dev_oneshop_store_logo=$values['logo_path'];
                  $dev_oneshop_coverimage=$values['cover_path'];
                }
                require('application/libraries/oneshopconfig.php');
               $dev_oneshop_store_cover_path= STORE_PATH.$dev_oneshop_storeid."/cover/li/".$dev_oneshop_coverimage;
               $dev_oneshop_store_logo_path= STORE_PATH.$dev_oneshop_storeid."/logo/li/".$dev_oneshop_store_logo;?>
                  <?php if($results_store[0]["created_by"]==$_SESSION['user_id']){
                  ?>
                  <form id="osdev_store_banner_update_form">
                      <input type="hidden"  name="STORE_UID" value="<?php echo CURRENT_URL; ?>">
                      <input type="hidden" name="current_store_banner" value="<?php echo $dev_oneshop_coverimage; ?>" id="current_store_banner">
                      <input type="file" name="osdev_store_banner" style="cursor: pointer; position: absolute; width: 25px; height: 25px; margin: 5px; z-index: 110; opacity: 0;" id="osdev_store_banner">
                  <img src="<?php echo base_url()."assets/";?>images/clickEditIconWhite.png" style="position: absolute; float: right; z-index: 100; margin: 5px; cursor: pointer;" width="25" height="25">
                  </form>
                    <?php
                  }
                  ?>
                  
                	<img src="<?php echo  $dev_oneshop_store_cover_path; ?>" class="oneshop_coverPic" id="osdev_storecove_pic">
                    <div class="oneshop_profilePicandName">
                        <?php if($results_store[0]["created_by"]==$_SESSION['user_id']){
                          ?>
                            
                            <form id="store_logo_update_form">
                                <input type="hidden"  name="STORE_UID" value="<?php echo CURRENT_URL; ?>">
                                <input type="hidden" name="current_store_logo" value="<?php echo $dev_oneshop_store_logo; ?>" id="current_store_logo">
                                <input type="file" name="store_logo_update"  style="cursor: pointer; position: absolute; width: 25px; height: 25px; margin: 5px; z-index: 110; opacity: 0;" id="store_logo_update">
                               <img src="<?php echo base_url()."assets/";?>images/clickEditIconWhite.png" style="position: absolute; float: right; z-index: 100; margin:  5px; cursor: pointer; width: 25px; height: 25px;">
                          </form>
                            <?php
                        } ?>
                            
	                    <img src="<?php echo $dev_oneshop_store_logo_path; ?>" class="oneshop_ppProfilePic" id="osdev_store_logo_display">
                        <span class="oneshop_profileName"><h2><?php echo $dev_oneshop_store_name;?></h2>
                         
                        </span>
                         
                       
                    </div>
                    
                 
                </div>
                <?php if($results_store[0]["created_by"]!=$_SESSION['user_id']){
                  ?>
               <div>
                <button value="report_problem" style="float:right;" id="store_report_problem">Report problem</button>
              </div>
                    <?php
                }
                  ?>
             
               <?php if($results_store[0]["created_by"]==$_SESSION['user_id']){
                 ?>
               <!--<div data-id="6" data-average="" class="exemple6" style="height: 20px; float:right;width: 115px; overflow: hidden; z-index: 1; position: relative; cursor: default;">
                  <div class="os_productRatingColor" style="width:<?php echo $store_rating*20;?>%;"></div>
                  <div class="os_productRatingAverage" style="width: 0px; top: -20px;"></div>
                  <div class="os_productStar" style="height: 20px; top: -40px; background: url(&quot;<?php echo base_url();?>assets/images/stars.png&quot;) repeat-x scroll 0% 0% transparent; width: 115px;"></div>
              </div>-->
                   <?php
               }else{
                 ?>
              <!--user rating-->
                 <div class="exemple6" data-average="<?php echo $store_rating; ?>" data-id="6" style="float:right;"></div>
                  <div class="datasSent" style="display:none;"></div>
               <!--user rating-->
               
                   <?php
                 
               }
                  ?>
              
              
               
               
                  <input type="hidden" value="<?php echo $results_store[0]["store_aid"]; ?>" id="os_store_aind">
              <div class="oneshop_profileSection oneshop_MyStoreProfileSection" id="store_report" style="display:none;background-color: white;min-height:200px;">
                  <form id="strpt_problrm">
                      <center> <div>
                              <h2><?php 
                              
                              echo $dev_oneshop_store_name;?></h2>
                          </div></center>
                      <input type="hidden" value="<?php echo $results_store[0]["store_aid"]; ?>" name="store_aid" id="store_adi">
                      <div style="margin-top:10px;">
                          <div style="min-width:50%;float:left; text-align:right;">Title : </div>
                          <div style="min-width:50%;float:left;"> <input type="text" name="report_title" id="report_title"></div>
                      </div>

                      <div>
                          <div style="min-width:50%;float:left; text-align:right;">Description : </div>
                          <div style="min-width:50%;float:left;"> <textarea name="report_description" id="report_description"></textarea></div>
                      </div>

                      <div>
                          <div style="min-width:50%;float:left; text-align:right;">Snap shot : </div>
                          <div style="min-width:50%;float:left;"> <input type="file" name="report_snapshot" id="report_snapshot"></div>                  
                      </div>

                      <center> <div><input type="submit" value="submit" style="margin-top:20px;">
                              <button value="Cancle" id="store_report_cancel"> Cancle</button>
                          </div></center>
                  </form>
              </div>
              
              
              
                <div class="oneshop_profileSection oneshop_MyStoreProfileSection">
   
                    <div class="oneshop_profileSectionContent oneshop_MyStoreProfileSectionContent">
                    
                    <div class="oneshop_mystoreProducts">
             <?php
				       $this->load->module("products");
				      $this->products->mystore_top_view_products($dev_oneshop_storeaid);
			       ?>   
                   </div> 
                   
                   <div class="oneshop_mystoreProducts"> 
             <?php
				       $this->load->module("products");
				      $this->products->mystore_featured_products($dev_oneshop_storeaid);
			       ?>    
                   </div> 
                   
                   <div class="oneshop_mystoreProducts"> 
       <input type="hidden" value="8" id="load_product_count">            	
                      <div id="product_append"'>
				<?php
				       $this->load->module("products");
				      $this->products->mystore_myproduct_list($dev_oneshop_storeaid);
			       ?>         
                      </div>  
                      </div> 
                       
            
            
            
                    </div>
                </div>
            </div>
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

    
        <?php
$this->templates->app_footer(  ); 
?>
          <script>
                      $(document).ready(function () {
      $(".exemple6").jRating({
          length: 5,
          decimalLength: 1,
          showRateInfo: false
      });
  });
  
  
  </script>
  