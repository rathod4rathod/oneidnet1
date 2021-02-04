<div class="fll wi100pstg">
<?php
$this->load->module('stores');
?>
<?php
// $similar_products=0;
if($similar_products!=0){
    $db_obj = $this->load->module("db_api");
    $this->load->module("products");
    $uid=$this->products->get_UserId();
    $where="profile_id=".$uid;
    $uDetail = $db_obj->select("first_name,last_name,dob,existing_email_id,mobile_no",'iws_profiles', $where);foreach($similar_products as $prodslist){
//   $currency=$prodslist["currency"];
  $currency = $this->stores->getCurrency($prodslist["store_code"]); 


  if($prodslist["prod_img"]!="" && file_exists('stores/'.$prodslist["store_code"]."/products/".$prodslist["product_aid"]."/mi/".$prodslist["prod_img"])){
      $product_img_url=base_url().'stores/'.$prodslist["store_code"]."/products/".$prodslist["product_aid"]."/mi/".$prodslist["prod_img"];
  }
  else
  {
    $product_img_url=base_url()."assets/images/default_product_60.png";
  }
  $product_url=base_url().'product_detail_view/'.$prodslist["store_code"].'/'.$prodslist["product_code"]; // bug fixing on 30-03-2016
  $product_review_url=base_url().'product_reviews?product_id='.base64_encode(base64_encode($prodslist["product_aid"]));
  $s_len=strlen($prodslist["product_name"]);
  //echo $s_len;
  $product_name=$prodslist["product_name"];
  if($s_len>24){    
    $prod_name=substr($product_name,0,24)."..";
  }else{
    $prod_name=$product_name;
  } 
?>

<div class="mysimiler oneshop_pro_total_wrapper_div sm_products mat10">
    <div class="oneshop_proimagebox">
    	<span class="img_middile">
        	<img src="<?php echo $product_img_url?>"> 
        </span>
    </div>
    <div class="oneshop_product_ratebg_box">
        <p class="cagetory-name"><?=($prodslist["category_name"] !='')?$prodslist["category_name"]:'No Category'?></p> 
        <p><a class="product-name" href="<?php echo $product_url;?>"><?php echo ucfirst($product_name);?></a></p>
                   
                        <!-- <a href="javascript:void(0);" onclick="goProfile()" title="<?php echo $product_name?>"class="view-btn">View Details</a> -->
                        <p>    <?php
                        if($uDetail[0]['first_name'] !='' && $uDetail[0]['last_name'] !='' && $uDetail[0]['mobile_no'] !='' && $uDetail[0]['existing_email_id'] !='' && $uDetail[0]['dob'] !='0000-00-00'){
                          ?>    
                            <a class="view-btn" href="<?php echo $product_review_url;?>">View Details</a>
                            <?php
                                }else{
                          ?>
                          <a class="view-btn" href="javascript:void(0);" onclick="goProfile()" >View Details</a>
                          <?php
                        }
                      ?></p>
                    <div class="price-wrap">
                        <p class="actual-price"><?=$currency.' '.number_format($prodslist["sale_price"],2)?></p>
                        <p class="off-price"><?=$currency.' '.number_format($prodslist["cost_price"],2)?></p>
                    </div>
  
        <!-- <p class="bold fs14"><?php echo $currency." ".number_format($prodslist["sale_price"],2);?></p> -->
    </div>
</div>
<?php
}}else{
echo "<div class='no_data'>EMPTY</div>"; }
?>
</div>

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