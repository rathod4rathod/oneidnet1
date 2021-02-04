<?php require('application/libraries/oneshopconfig.php');
$i=0;
if($search_type=="Products") {
    foreach($products_data as $rows){
       
        //if($rows["product_name"]!="") {
        $s_len=strlen($rows["product_name"]);
        $product_name=$rows["product_name"];
        if($s_len>12){    
              $prod_name=substr($product_name,0,20)."..";
        }else{
              $prod_name=$product_name;
        }  
        $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
        //$product_url=  base_url()."product_detail_view?product_id=".base64_encode(base64_encode($rows["product_aid"]));
        $product_url=  base_url()."product_detail_view/".$rows["store_code"]."/".$rows["product_code"];
        $product_img_url=base_url().'assets/images/default_product_60.png';
        if($rows["primary_image"]!="" && file_exists("stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$rows["primary_image"])){
          $product_img_url=base_url()."stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$rows["primary_image"];
        }
        //echo $product_img_url;
            echo '<div class="oneshop_products_storebox">
                    <div class="oneshop_products_storeboxtop_div" id="product_div'.$rows["product_aid"].'">';
                    if($store_owner!="yes"){
 
 ?>

                        <span class="oneshop_setting_icon">
                            <a href="javascript:additemtocart(<?php echo $rows["product_aid"].",'".$rows["store_code"]."'"?>)">
                                <img src="<?php echo base_url();?>assets/images/products/setting2.png"></a>
                        </span>
<?php
                    }else{
                    }
                    echo '<p class="acenter mat20"> <a href="'.$product_url.'"><img src="'.$product_img_url.'"/></a></p>';
                    echo '</div>
                            <div class="oneshop_products_storebox_bottomdiv"><a href="'.$product_url.'" title="'.ucfirst($product_name).'">'. ucfirst($prod_name).'</a></div></div>';
            //}
                    $i++;
    } 
}
else if($search_type=="Stores") {
    foreach($stores_data as $slist){
        $store_name=$slist["store_name"];
        $store_nam=$store_name;
        $store_logo_url=base_url()."assets/images/default_store_100.png";
        if(strlen($store_name)>20){
            $store_nam=  substr($store_name, 0, 20)."..";
        }
        if($slist["profile_image_path"]!=""){
            $store_logo_url=base_url().'stores/'.$slist["store_code"]."/logo/mi/".$slist["profile_image_path"];
        }
        $store_nav_url=base_url()."store_home/".$slist["store_code"];
        echo '<div class="oneshop_products_storebox">
                <div class="oneshop_products_storeboxtop_div">';                    
        echo '<p class="acenter mat20"> <a href="'.$store_nav_url.'"><img src="'.$store_logo_url.'"/></a></p>';
        echo '</div><div class="oneshop_products_storebox_bottomdiv"><a href="'.$store_nav_url.'" title="'.ucfirst($store_name).'">'. ucfirst($store_nam).'</a></div></div>';
    }
}
else if($search_type=="Category") {
    foreach($cat_data as $rows){
       
        //if($rows["product_name"]!="") {
        $s_len=strlen($rows["product_name"]);
        $product_name=$rows["product_name"];
        if($s_len>12){    
              $prod_name=substr($product_name,0,20)."..";
        }else{
              $prod_name=$product_name;
        }  
        $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
        //$product_url=  base_url()."product_detail_view?product_id=".base64_encode(base64_encode($rows["product_aid"]));
        $product_url=  base_url()."product_detail_view/".$rows["store_code"]."/".$rows["product_code"];
        $product_img_url=base_url().'assets/images/default_product_60.png';
        if($rows["primary_image"]!="" && file_exists("stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$rows["primary_image"])){
          $product_img_url=base_url()."stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$rows["primary_image"];
        }
        //echo $product_img_url;
            echo '<div class="oneshop_products_storebox">
                    <div class="oneshop_products_storeboxtop_div" id="product_div'.$rows["product_aid"].'">';
                    if($store_owner!="yes"){
 
 ?>

                        <span class="oneshop_setting_icon">
                            <a href="javascript:additemtocart(<?php echo $rows["product_aid"].",'".$rows["store_code"]."'"?>)">
                                <img src="<?php echo base_url();?>assets/images/products/setting2.png"></a>
                        </span>
<?php
                    }else{
                    }
                    echo '<p class="acenter mat20"> <a href="'.$product_url.'"><img src="'.$product_img_url.'"/></a></p>';
                    echo '</div>
                            <div class="oneshop_products_storebox_bottomdiv"><a href="'.$product_url.'" title="'.ucfirst($product_name).'">'. ucfirst($prod_name).'</a></div></div>';
            //}
                    $i++;
    } 
}
else if($search_type=="Group") {
    foreach($group_data as $rows){
       
        //if($rows["product_name"]!="") {
        $s_len=strlen($rows["product_name"]);
        $product_name=$rows["product_name"];
        if($s_len>12){    
              $prod_name=substr($product_name,0,20)."..";
        }else{
              $prod_name=$product_name;
        }  
        $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
        //$product_url=  base_url()."product_detail_view?product_id=".base64_encode(base64_encode($rows["product_aid"]));
        $product_url=  base_url()."product_detail_view/".$rows["store_code"]."/".$rows["product_code"];
        $product_img_url=base_url().'assets/images/default_product_60.png';
        if($rows["primary_image"]!="" && file_exists("stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$rows["primary_image"])){
          $product_img_url=base_url()."stores/".$rows["store_code"]."/products/".$rows["product_aid"]."/mi/".$rows["primary_image"];
        }
        //echo $product_img_url;
            echo '<div class="oneshop_products_storebox">
                    <div class="oneshop_products_storeboxtop_div" id="product_div'.$rows["product_aid"].'">';
                    if($store_owner!="yes"){
 
 ?>

                        <span class="oneshop_setting_icon">
                            <a href="javascript:additemtocart(<?php echo $rows["product_aid"].",'".$rows["store_code"]."'"?>)">
                                <img src="<?php echo base_url();?>assets/images/products/setting2.png"></a>
                        </span>
<?php
                    }else{
                    }
                    echo '<p class="acenter mat20"> <a href="'.$product_url.'"><img src="'.$product_img_url.'"/></a></p>';
                    echo '</div>
                            <div class="oneshop_products_storebox_bottomdiv"><a href="'.$product_url.'" title="'.ucfirst($product_name).'">'. ucfirst($prod_name).'</a></div></div>';
            //}
                    $i++;
    } 
}
else{?>
    <style type="text/css">
    .result {
        background: #F4F4F4;
        box-shadow: 0 0 5px #222;
        float: left;
        height: 75px;
        margin: 1%;
        width: 31%;
    }
    .pImage {
        float: left;
        height: 60px;
        margin: 5px;
        max-width: 30%;
        min-width: auto;
    }
    .pImage img {
        height: 60px;
        width: 60px;
    }
    .pName {
        float: left;
        height: 60px;
        margin: 5px 0 0;
        width: auto;
        max-width: 60%;
    }
    
    .followBtns {
        float: left;
        height: 18px;
        margin: 1% 5px 5px;
        width: 160px;
    }
</style>
    <?php foreach($user_data as $data){?>
         <div class="result" id="userfollow<?php  echo $data['profile_id'] ?>" >

                    <div class="pImage">
						 <a href="<?php echo base_url().'pprofile/profilepage/'.$data['user_id'] ?>">
						<?php if($data['profile_img']!=''){ ?>
                       
                            <img src="<?php echo base_url().'data/profile/mi/'.$data['profile_img']?>">      
                     
                        <?php }else{ ?>
							  <img src="<?php echo base_url().'assets/images/avatar.png'?>">      
                           
							<?php } ?>
							 </a>
                    </div>
                    <div class="pName rkr2">      
                        <span class="name">
                            <h3> <a href="<?php echo base_url().'pprofile/profilepage/'.$data['user_id'] ?>"> <?php echo ucfirst($data['profile_name']); ?> </a>
                            </h3>
                        </span>
                       <?php /*<div class="followBtns">                            
                            <span id="friendsf1"><button value="follow" id="" onclick="userFollow(<?php echo $data['profile_id'] ?>)"   class="btn-suggestion">Follow</button></span>            
                        </div>*/?>
                    </div>
                </div>
     <?php }
    
}
if(($stores_data==0) && ($products_data==0) && ($cat_data==0) && ($group_data==0)&&($user_data==0)){
    
    echo "<div class='cvdes_rightbar_headingsbg_wrap mat20'>
		<div style='width:200px; margin:0 auto; overflow:hidden;'><span class='fll mat3'> <img src=".base_url().'assets/images/nodata.png'." alt='nodata'> </span><span class='fll mat3 mal10 bold gray'> No  Data Found </span></div>
	</div>";
}
?>
