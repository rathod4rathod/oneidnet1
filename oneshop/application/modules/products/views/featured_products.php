<?php
$this->load->module('stores');
?>
<style>
  
  .myprofilepopup {
      text-align: center;
      color: grey;
      margin-top: 52px;
      cursor: pointer;
      padding-left: 127px;
  }
  
  </style>
<div class="hd_heading"><h2>Product Suggestions   <span></span> </h2></div>

<div class="clearfix"></div>
<div class="featured_product_product_mainwrap">
<?php require('application/libraries/oneshopconfig.php');
$i=0; 
if(is_array($products_data)) {
  
    $db_obj = $this->load->module("db_api");
    $this->load->module("products");
    $uid=$this->products->get_UserId();
    $where="profile_id=".$uid;
    $uDetail = $db_obj->select("first_name,last_name,dob,existing_email_id,mobile_no",'iws_profiles', $where);
        
	foreach($products_data as $rows){

	  $currency = $this->stores->getCurrency($rows["store_code"]); 
	  $img=$rows["primary_image"];
          $cart_cnt=$rows["cart_cnt"];
		  if($rows["product_name"]!="") {
		  $s_len=strlen($rows["product_name"]);
		  //echo $s_len;
		  $product_name=$rows["product_name"];
		  if($s_len>24){    
			$prod_name=substr($product_name,0,24)."..";
		  }else{
			$prod_name=$product_name;
		  } 
          $store_code=$rows['store_code'];
		  $store_url = base_url() . "home/mystore_profile_page/" . $rows['store_id'];
		  $product_url=  base_url()."product_detail_view/".$rows['store_code']."/".$rows["product_code"];
		?>
            <div class="myproduct oneshop_products_storebox">
                <div class="oneshop_products_storeboxtop_div 3333" id="product_div<?php echo $rows['product_aid']?>"> 
                    <?php
                    if($mode!="home"){
                        if($cart_cnt==0){
                    ?>
                    <span class="oneshop_setting_icon"><a href="javascript:additemtocart('<?php echo $rows["product_aid"];?>','<?php echo $store_code;?>')"><img src="<?php echo base_url() . "assets/" ?>images/products/setting2.png"></a></span>
                    <?php
                        }else{
                    ?>
                        <span class="oneshop_setting_icon"><a href="javascript:removeitemfromcart('<?php echo $rows["product_aid"];?>','<?php echo $store_code;?>')"><img src="<?php echo base_url() . "assets/" ?>images/cat/setting2_hover.png"></a></span>
                        <?php
                        }
                    }                        
                    $product_img_path="stores/".$store_code."/products/".$rows["product_aid"]."/mi/".$img;
                    //echo file_exists($product_img_path);
                    if(file_exists($product_img_path)&&$img!=""){
                        $product_img_url=STORE_PATH."".$store_code."/products/".$rows["product_aid"]."/mi/".$img;
                    }else{
                        $product_img_url=base_url().'assets/images/default_product_60.png';
                    }
                        ?>
                        <p class="acenter mat20">
                        <?php
                    if($uDetail[0]['first_name'] !='' && $uDetail[0]['last_name'] !='' && $uDetail[0]['mobile_no'] !='' && $uDetail[0]['existing_email_id'] !='' && $uDetail[0]['dob'] !='0000-00-00'){
                        ?>
                          <a href="<?php echo $product_url;?>">
                            <img src="<?php echo $product_img_url; ?>" class="pro_img_one" title="<?php echo $product_name?>">
                        </a>
                            <?php
                    }else{
                        ?>
                          <a href="javascript:void(0);" onclick="goProfile()">
                                <img src="<?php echo $product_img_url; ?>" class="pro_img_one" title="<?php echo $product_name?>">
                            </a>
                     
                        <?php
                    }
                    ?>  
                    </p>
                    </div>
                
                <div class="oneshop_products_storebox_bottomdiv ">
                <p class="cagetory-name"><?=($rows["category_name"] != '')?$rows["category_name"]:'No Category'?></p> 
               <?php
                    if($uDetail[0]['first_name'] !='' && $uDetail[0]['last_name'] !='' && $uDetail[0]['mobile_no'] !='' && $uDetail[0]['existing_email_id'] !='' && $uDetail[0]['dob'] !='0000-00-00'){
                        ?>
                            <a href="<?php echo $product_url;?>" style="color:black" title="<?php echo $product_name?>"><?php echo ucfirst($prod_name) ?></a>
                        <?php
                    }else{
                        ?>
                        <a href="javascript:void(0);" onclick="goProfile()" title="<?php echo $product_name?>"><?php echo ucfirst($prod_name) ?></a>
                        <?php
                    }
                    ?>  
               
                    <!-- <a href="<?php //echo $product_url;?>" title="<?php echo $product_name?>"><?php echo ucfirst($prod_name) ?></a> -->
                   <p>
                   <?php
                    if($uDetail[0]['first_name'] !='' && $uDetail[0]['last_name'] !='' && $uDetail[0]['mobile_no'] !='' && $uDetail[0]['existing_email_id'] !='' && $uDetail[0]['dob'] !='0000-00-00'){
                        ?>
                            <a href="<?php echo $product_url;?>" title="<?php echo $product_name?>"class="view-btn">View Details</a>
                        <?php
                    }else{
                        ?>
                        <a href="javascript:void(0);" onclick="goProfile()" title="<?php echo $product_name?>"class="view-btn">View Details</a>
                        <?php
                    }
                    ?>  </p>
                    
                    <div class="price-wrap">
                        <p class="actual-price"><?php echo $currency.''.$rows["price"]; ?></p>
                        <p class="off-price"><?php echo $currency.''.$rows["sale_price"]; ?></p>
                    </div>
                </div>
            </div>
            
		<?php
		}
			$i++;
	} 
} else {
	?>
    </div>
	<div class="cvdes_rightbar_headingsbg_wrap mat20">
		<div style="width:200px; margin:0 auto; overflow:hidden;"><span class="fll mat3"> <img src="<?php echo base_url().'assets/images/nodata.png'?>" alt="nodata"> </span><span class="fll mat3 mal10 bold gray"> No Product Data Found </span></div>
	</div>
<?php
}
?>


<script>
 function goProfile(){
  var myhtml =''
    myhtml += '<div class="np_newpopuup_bgcontainer">';
    myhtml += '<div class="np_popupcontainer_middlebox">';
    myhtml += '<div class="login-expired-wrap">';
    myhtml += '<div class="login-message">';
    myhtml += '<h1 style="text-align: center;">Please fill profile data first</h1>';
    myhtml += '<h4 id="demo" class="myText myprofilepopup">Click Here to Update Profile</h4>';
    myhtml += '</div>';
    myhtml += '</div>';
    myhtml += '</div>';        
  $("#os_popup").css("display","block").html(myhtml);
  document.getElementById("demo").addEventListener("click", myFunction);
    function myFunction() {
       window.top.location.href = "https://www.oneidnet.com/basic_info";
    }
 }
</script>