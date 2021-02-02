<?php
$this->load->module("cookies");
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
$this->load->module("home");
//echo  $timezone;
?>

<div class="oneshop_container_sectionnew">
    <div class="oneshop_container_middle_section mat10">

        <div class="oneshop_left_newcontainer pab10">
        <div class="hd_heading">
        	<h2><?php echo ucwords($user_details[0]['profile_name']) . " profile " ?><span></span></h2>
        </div>

            <div class="np_des_company_specific_profile_imagewrap">
                <p class="np_des_company_promises_imgbox" style="margin-left: 0px;">
                    <img id="ospicchange" src="<?php echo base_url() . "assets/"; ?>images/clickEditIconWhite.png" style="position: absolute; float: right; z-index: 200; margin:  5px; cursor: pointer; width: 25px; height: 25px;">

                    <?php if ($user_details[0]["profile_img"]) { ?>
                        <img src="<?php echo PROFILE_LOGO . "mi/" . $user_details[0]["profile_img"]; ?>" class="oneshop_ppProfilePic" style="width: 120px;position: absolute; z-index: 100;" id="osdev_user_pp">
                        <?php
                    } else {
                        ?>
                        <img src="<?php echo base_url() . "assets/"; ?>images/avatar.png" class="oneshop_ppProfilePic" style="width: 120px;position: absolute; z-index: 100;" id="osdev_user_pp">
                        <?php
                    }
                    ?>
                </p>

                <form id="profile_cover_update_form">
                    <input type="file" name="profile_banner" style="cursor: pointer; position: absolute; width: 25px; height: 25px; margin: 5px; z-index: 110; opacity: 0;" id="profile_cover_update">
                    <input type="hidden" name="current_banner" value="<?php
                    if ($user_details[0]["profile_cover_img"]) {
                        echo $user_details[0]["profile_cover_img"];
                    } else {
                        echo "banner.jpg";
                    }
                    ?>" id="osdev_user_coverpic">
                </form>
                <img src="<?php echo base_url() . "assets/"; ?>images/clickEditIconWhite.png" style="position: absolute; float: right; z-index: 100; margin:  5px; cursor: pointer;" width="25" height="25">

                <p style="width:100%;height: 235px;overflow: hidden;text-align: center;">

                    <?php if ($user_details[0]["profile_cover_img"]) {
                        ?>
                        <img src="<?php echo PROFILE_COVER . "li/" . $user_details[0]["profile_cover_img"]; ?>" style="width: 100%;transform: translateY(-30%);" id="osdev_display_cover_pic">
                        <?php
                    } else {
                        ?>
                        <img src="<?php echo base_url() . "assets/"; ?>images/banner.jpg" style="width: 100%;transform: translateY(-30%);" id="osdev_display_cover_pic">
                    <?php
                    }
                    ?>
                </p>
            </div>

            <div class="np_des_company_profilename" style="width: 80%">
                <span style="font-size: 17px"><?php echo ucwords($user_details[0]['profile_name']); ?></span>
                <a href="<?php echo base_url().'pprofile/profilepage/'.$user_details[0]['user_id'] ?>"> <input class="semi-transparent-button flr np_des_mar5" type="button" value="View My Public Profile"></a> 
            </div>


            <div class="wi100pstg mat20 fll">

                <div class="click_tabs_wrap"> 
                    <ul id="tabs">
                        <li><a name="#tab1"  href="#" id="current"><i class="fa fa-history mar5"></i> My Purchase History </a></li>
                        <li><a name="#tab2"  href="#"><i class="fa fa-file-text mar5"></i> Activity </a></li>
                        <li><a name="#tab3"  href="#"><i class="fa fa-bookmark mar5"></i> Saved Products </a></li>
                        <li><a name="#tab4"  href="#"><i class="fa fa-building mar5"></i> Stores </a></li>    
                    </ul>
                </div>

                <div id="content">




                    <div id="tab1" style="display: block;">

                        <div class="top">
                        	<h3 class="fll">My Purchase History</h3>
                            <span class="flr">
                            	<input type="hidden" id="horder_date" value=""/>
                                <select name="privacy" class="select_field" id="filter_by_status">
                                        <option value="">Select Order Status</option>
                                        <option value="order_placed">Placed Orders</option>
                                        <option value="order_process">Orders in Process</option>
                                        <option value="order_delivered">Delivered Orders</option>
                                        <option value="order_cancelled">Cancelled Orders</option>        
                                    </select>
                            </span>
                            <div class="clearfix"></div>
						</div>

                        <div class="fll wi100pstg">
                            <div id='purchase_history_div'>
                                <?php
                                $this->home->purchaseHistory();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" style="display: none;" >
                    	<div class="top">
                        <h3 class="fll">Activity</h3>
                        <div class="flr"> 
                        <span class="fll mat10 mar10"> FILTER BY: </span> 
                            <span> 
                                <select class="select_field" id='activity_filter_by'>
                                    <option value='ALL'>Select </option>
                                    <option value='order_placed'>Order placed </option>
                                    <option value='order_cancellation'>Order cancelled </option>
                                    <option value='store_review'>Store review </option>
                                    <option value='product_review'>Product review </option>
                                </select>
                            </span> 
                        </div>
                     	<div class="clearfix"></div>
                        </div>
                        
                        <div class="fll activity_tab_content">       
                            
                            <div id="user_activity_div">
                                <?php
                                $this->home->Useractivity();
                                ?>       
                            </div>
                        </div>
                    </div>
                    <div id="tab3" style="display: none;">
                        <div class="top">
                        <h3 class="fll">Saved Products</h3>
                        <div class="clearfix"></div>
                       </div>
                        
                        <div class="fll wi100pstg" id="saved_prods_div">
                            <?php
                            $this->home->getsavedproducts();
                            ?>
                        </div>
                    </div>



                    <div id="tab4" style="display: none;">
                        <div class="top">
                        	<h3 class="wi100pstg fll">Stores</h3>
                            <div class="clearfix"></div>
                         </div>
                        
                        <div class="fll wi100pstg stores_list">
                            <ul>
                                    <?php
                                    $this->home->get_MYStore();
                                    ?>
                                </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="oneshop_right_newcontainer">
<!--            <img class="hotel_news_imgbox mat20" src="<?php echo base_url() . "assets/" ?>images/cat/ad1.jpg">-->
            <div class="oneshop_product_images mat10">
            </div>
        </div>
    </div>

</div>          
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<!--Oneshop Footer starts Here(vinod 19-05-2015)-->
<?php $this->templates->app_footer(); ?>
<!--Oneshop Footer ends Here(vinod 19-05-2015)-->            
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/microjs/userprofilepage.js"></script>
</body>
</html>

<div class="oneshop_currencyConvertorPopup modal" id="image_crop_pp" >
    <div class="modal-dialog"><div class="modal-content">
        <div class="modal-header">
        	<i class="fa fa-times close" id="crp_pop_cnl"></i>
            <h4> Change Your Profile Picture!  </h4>
        </div>
        <div class="modal-body">
            <form id="oneshop_profile_image" method="post" enctype="multipart/form-data">
                <input type="file" id="oneshop_profile_image_path" name="bgChangeField">
            </form>
            <div id="crp"></div>

        </div>
   </div></div>
</div>
