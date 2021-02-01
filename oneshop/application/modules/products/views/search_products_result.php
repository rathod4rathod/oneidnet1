<?php require('application/libraries/oneshopconfig.php');
$i=0;
$store_code=$this->uri->segment(2);
//if($category=="find_products"){    
if(is_array($products_list)) {
    foreach($products_list as $rows){
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
                    <div class="oneshop_products_storeboxtop_div">';
                    if($store_owner!="yes"){

                        echo '<span class="oneshop_setting_icon"><a href="javascript:additemtocart("'.$rows["product_aid"].'","'.$store_code.'")><img src="'.base_url() .' "assets/images/products/setting2.png"></a></span>';

                    }else{
                    }
                    echo '<p class="acenter mat20"> <a href="'.$product_url.'"><img src="'.$product_img_url.'"/></a></p>';
                    echo '</div>
                            <div class="oneshop_products_storebox_bottomdiv"><a href="'.$product_url.'" title="'.ucfirst($product_name).'">'. ucfirst($prod_name).'</a></div></div>';
            //}
                    $i++;
    } 
} else {
	
	echo '<div class="cvdes_rightbar_headingsbg_wrap mat20">
		<div style="width:200px; margin:0 auto; overflow:hidden;"><span class="fll mat3"> <img src="'.base_url().'"assets/images/nodata.png" alt="nodata"> </span><span class="fll mat3 mal10 bold gray"> No Product Data Found </span></div>
	</div>';

}
//}else{
    //if($stores_list!=0){
        foreach($stores_list as $slist){
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
    //}
//}
?>
