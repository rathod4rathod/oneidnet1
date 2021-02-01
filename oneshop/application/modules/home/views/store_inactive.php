<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("mystores");
$store_code=$this->uri->segment(2);
//For store theme  selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){
  $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
  $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png';
}
else{
  $sideimage = base_url().'/assets/images/store_banners/1.png';
  $midimage = base_url().'/assets/images/store_banners/mid1.png';
}
     //end store theme  selected

if($staff_details[0]["cnt"]!=0){
  $userType=1;
}
else{
  $userType=0;
}
?>
<?php  if($userType==1) {  ?>

  <div class="oneshop_banner_stip_newbox click_importantNotifications">
    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> >
        <?php $this->templates->os_oneshopheader("store_staff"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
  </div>
  <div class="clearfix">&nbsp;</div>

</div>

<?php }else if($userType==0){  ?>
  <div class="oneshop_container_sectionnew">
    <div class="wizard-bgimage-wrapper">
      <div class="defaultpage_imagewrap_maindiv">
      <div class="defaultpage_image_wrap">
         <?php if($store_details[0]['profile_image_path']!=''){?>
          <img src="<?php echo base_url().'stores/'.$store_details[0]['store_code'].'/logo/mi/'.$store_details[0]['profile_image_path']?>">
         <?php }else{ ?>
          <img src="<?php echo base_url().'assets/images/default_store.png'?>">
         <?php } ?>
      </div>
      </div>
    </div>

            <div class="defaultpage_storename_content_wrap">
            <p class="fll"> <?php echo $store_details[0]['store_name'] ?> </p>
            <div class="flr aright">
                <span class="fll mar30"><p onclick="message_popUpVisibility('sendstoremessage')"> <input type="button" value="Message" class="np_des_addaccess_btn" name="button"></p> </span>

                <?php  $follow_result=$this->templates->getFollowList($store_code);?>
            <span class="fll mar30" id="store_follow_p">
            <?php
                if($follow_result[0]["cnt"]!=0){   ?>

                <input type="button" name="button" class="np_des_addaccess_btn" id="store_unfollow_btn"   value="Unfollow"> <?php }else{ ?>
                    <input type="button" name="button" class="np_des_addaccess_btn" id="store_follow_btn" value="Follow">
                           <?php } ?></span>
            <span class="fll mat5 mar10"> <img src="<?php echo base_url().'assets/images/Interest.png'?>" width="20" height="20"> </span>
            <?php
			//Getting Review Details
			$avg_review_rating  = "";
                        $this->load->module("stores");
			$storeReviewDetails = $this->stores->getStoreReviewDetailsByStoreCode($store_code);

			if($storeReviewDetails[0]["avgrating"] == ""){
				$ratingDisplay = "0/5";
			}else{
			    $ratingDisplay =round($storeReviewDetails[0]["avgrating"], 2)." / 5";
			}
			?>
             <span class="fll"> <?php  echo $ratingDisplay;?></span>
            </div>
            </div>
<?php } ?>

      <div class="oneshop_container_middle_section mat10">
        <DIV class="wi48 fll">
          <p style="width:150px; padding:50px 0 0px 0; margin:0 auto;"><img src="<?php echo base_url().'assets/images/maintenance.png'?>" style="text-align:center; margin:0 auto;" width="120" height="129"></p>
          <h1 class="acenter normal mat20" style="margin-bottom:50px;"> Under Maintenance </h1>
        </DIV>
        <DIV class="wi48 fll" style="margin-bottom:50px;">
          <p style="width:150px; padding:50px 0 0px 0; margin:0 auto;"><img src="<?php echo base_url().'assets/images/available.jpg'?>" width="129" height="130" style="text-align:center; margin:0 auto;"></p>
          <h1 class="acenter normal mab10"> This Store Will Shortly un available at your service </h1>
          <!--<p class="acenter"> Share Your Awesome Travel Experience! Let, Your Followers know your our Awesome Travel Experience! Let, Your Followers know your Tour Experience Where Do You Went for Tour?  </p>-->
          <p style="margin:0 auto; text-align:center; padding:50px 0 0 0;"><a class="btn btn-primary btn-large" href="#"> Renew</a></p>
        </DIV>
      </div>
  </div>

<script>
    $(document).on('click',"#store_follow_btn",function () {
        var str_code = '<?php echo $store_code ?>';
        $.ajax({
            type: "post",
            data: {store_code: str_code},
            url: oneshop_url+ "/templates/insertFollow/",
            success: function (data) {
                var result=data.trim();
                if(result==1){
                    $("#store_follow_p").html('<input type="button" name="button" class="np_des_addaccess_btn" id="store_unfollow_btn"   value="Unfollow">');

                }
            }
        });
    });
     $(document).on('click',"#store_unfollow_btn",function () {
       var str_code = '<?php echo $store_code ?>';
        $.ajax({
            type: "post",
            data: {store_code: str_code},
            url: oneshop_url+ "/templates/insertUnfollow/",
            success: function (data) {
                var result=data.trim();
                 if(result==1){
                    $("#store_follow_p").html('<input type="button" name="button" class="np_des_addaccess_btn" id="store_follow_btn"  value="Follow">');

                }
            }
        });
    });
    </script>
<?php
  $this->templates->app_footer();
  $this->load->module('oshop_popup');
  $this->oshop_popup->sendStoremessage($store_code);
?>