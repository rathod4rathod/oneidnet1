
<?php
if($friendstores[0]['store_aid']!=''){
foreach($friendstores as $store){
   $store_url=base_url()."store_home/".$store["store_code"];
if($store['profile_image_path']!=''){

    $store_img_url=STORE_PATH. $store['store_code'].'/logo/mi/'.$store['profile_image_path'];
?>
        <li title='<?php echo $store["store_name"]?>'> 
        	<div class="fll product"><span><img src="<?php echo $store_img_url?>" style="width:150px; height: 120px;"></span></div>
            <div class="fll p_name"><p><a href="<?php echo $store_url?>"><?php echo ucfirst($store["store_name"])?></a></p></div>
            </li>
 <?php }else{
     $store_img_url= base_url().'assets/images/default_store_100.png';

     ?>
        <li title='<?php echo ucfirst($store["store_name"]);?>'>
        	<div class="fll product"><span><img src="<?php echo $store_img_url?>" style="width:150px; height: 120px;"></span></div>
        	<div class="fll p_name"><p><a href="<?php echo $store_url?>"><?php echo ucfirst($store["store_name"])?></a></p></div>
        </li>
<?php } ?>
<?php
 }


 }else{ ?>
	 <div class="osdes_rightbar_headingsbg_wrap"   >
        <p>No  Stores</p>
      </div>
     </div>

	  <?php }?>
