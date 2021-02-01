<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
$this->load->module("mycart");
$store_cnt=5;
$store_owner="no";
$store_manager="no";
$store_owner_details=$this->templates->get_store_ownerId();
$user_id=$this->templates->get_UserId();
if($store_owner_details!=""){
    $store_owner="yes";
}else{
    $manager_details=$this->templates->store_manager_return($user_id);
    if($manager_details["role"]=="ORDER_MANAGER" || $manager_details["role"]=="PRODUCT_MANAGER"){
        $store_manager="yes";
    }
}
//print_r($product_details);
?>
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/" ?>scripts/jquery.easyzoom-modified.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/easyzoom.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/model.css" type="text/css" />

<div class="oneshop_wrapper">
    <div class="oneshop_innerWrapper">  
    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_container_sectionnew">
        <div class="oneshop_container_middle_section mat10">
            <?php
        $this->templates->os_oneshopheader();
        ?>
            <div class="clearfix"></div>
    <div class="oneshop_left_newcontainer pab10">
    
    <?php  
    $category_id=0;
    $product_category="";
    $product_aid=0;
    foreach ($product_details as $product_details_info) {
      $mode=$product_details_info["mode"];
      $category_id = $product_details_info["product_category_id_fk"];
      //$subcategory_id = $product_details_info["subcategory_id"];
      $img=$product_details_info["prod_img1"];
      $store_name=$product_details_info["store_name"];
      $img_url=$zoom_img_url=base_url() . "stores/".$product_details_info["store_code"] ."/products/". $product_details[0]['product_aid'];
      $product_category=$product_details_info["category"];
      $product_aid=$product_details_info["product_aid"];
      ?>
        <input type="hidden" name="product_aid" id="dev_os_p_id" value="<?php echo $product_details[0]['product_aid'] ?>">	 
<input type="hidden" name="hstore_id" id="hstore_code" value="<?php echo $product_details[0]['store_code'] ?>"/>
    <div class="fll wi100pstg mat30  pab5">
        <p class="fll" style="width:45px; float:left;"><img src="<?php echo base_url().'assets/images/profilePic.png'?>" class="oneshop_profilePic">
        </p>
        <div class="fll mal10">
            <h1 class="normal mab20 lh26 fll" style="width:560px;"> <?php echo $product_details[0]["product_name"]?></h1>
        </div>
    </div>
          
          
        <div class="addtowashlist_wrap mat5">          
            <ul>
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/view.png'?>" width="20" height="20"></span> 
            <a href="#"> <span> Total Views </span> </a> <br> <span class="bold mal10 fs14">  2,345 k </span>  
            </li>
            
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/rate.png'?>" width="20" height="20"></span> 
            <a href="#"> <span> Average Rating </span> </a> <br> <span class="bold mal10 fs14">  5.4 </span>  
            </li>
            
            <li>
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/edit.png'?>" width="20" height="20"></span>
            <a href="<?php echo base_url().'product_reviews?product_id='.  base64_encode(base64_encode($product_aid))?>"> <span>Write a <br> REVIEW</span>  </a>
            </li>

            <li class="fll">
            <span class="fll mat5"><img src="<?php echo base_url().'assets/images/Interest.png'?>" width="20" height="20"></span>
            <a href="javascript:void(0)" id="os_Wishlist"> <span class="add-to-wishlist-text">Add to <br> WISHLIST</span>  </a>
            </li>
            </ul>
        </div>
          

<div class="clearfix"></div>


<div class="oneshop_product_bigimage_total_wrap mat20">

<div class="oneshop_product_bigimage">
<img src="<?php echo $img_url."/li/".$img;?>">
</div>
<div class="oneshop_product_small_image mat5">

<ul>
<?php
    $imgs_gallery=array("prod_img1","prod_img2","prod_img3","prod_img4");
      for ($i = 0; $i < count($imgs_gallery); $i++) {
          $img_arry=$imgs_gallery[$i];
          $img=$product_details_info[$img_arry];
          $img_path_url=$img_url."/si/" .$img;                            
          if($img!=""){
      ?>
      <li><img src="<?php echo $img_path_url; ?>" class="product_dv" id="<?php echo $product_details_info["product_aid"]; ?>"></li>                            
      <script>
        //02-06-2015 by venkatesh
        $(document).on("click", ".product_dv", function () {
            var product_image_id = $(this).attr("id");
            var imgpath = $(this).attr("src");
            var res = imgpath.split("/");
            res[res.length - 2] = "li";
            var change_path = res.join("/");
            $('#window-zoom img').attr("src", change_path);
            $("#mainimg" + product_image_id).attr("src", change_path);
            $(".resize" + product_image_id).attr("data-image", change_path);

        });
      </script>

    <?php }}
    ?>
<!--<li><img src="<?php echo base_url().'assets/images/img2.jpeg'?>"> </li>
<li><img src="<?php echo base_url().'assets/images/img2.jpeg'?>"> </li>
<li><img src="<?php echo base_url().'assets/images/img2.jpeg'?>"> </li>
<li><img src="<?php echo base_url().'assets/images/img2.jpeg'?>"> </li>-->
</ul>
</div>          
</div>


<div class="product_rightbox_pricebox">
<div class="product_price">
<?php
if($product_details_info["discount"]!=0){
    $cost_price=$product_details_info["cost_price"];
    echo '<p style="text-decoration:line-through; float:left;"> INR '.$cost_price.' </p>  <p class="green mal5 fll"> ('.$product_details_info["discount"].'% ) off </p> ';
}
?>
<p class="fll fs25 mat5 mar5"> Price </p>
<p class="fll bold fs25 mat5"><?php echo $product_details_info["sale_price"]?> </p>
</div>


<div class="oneshop_product_images mat30">
            <h5 class="black mab10 bold"> Set Specifications </h5>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Category  </p>
           <p class="gray">  <?php echo $product_details_info["category_name"];?>  </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Sub category  </p>
           <p class="gray">  <?php echo $product_details_info["subcategory_name"];?>  </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Color  </p>
           <p class="gray">  Green  </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Space  </p>
           <p class="gray">  Texthere </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Color  </p>
           <p class="gray">  Green  </p>
           </div>
           
           <div class="wi100pstg mab10"> 
           <p class="fll wi100pstg bold">  Space  </p>
           <p class="gray">  Texthere </p>
           </div>
           </div>
           

<div class="mat10 fll">
<p class="fll mat10"><input type="button" name="button" class="np_des_buy" id="addcart" value="ADD TO CART"> </p>
<p class="fll mat10 mal10"><input type="button" name="button" class="np_des_addtocart" value="BUY" id="buy_btn"> </p>
</div>

</div>

<div class="clearfix"></div>

<div class="wi100pstg mab10 fll">
<h3 class="mat10 borderbottom wi100pstg"> Description </h3>
<p class="mat10"> 
    <?php echo $product_details_info["description"];?>
</p>
</div>

<?php
    }
?>
<div class="oneshop_left_newcontainer mat20 pab10">
    
<h3 class="mat10 mab10 pab5 wi100pstg" style="border-bottom:2px #333 solid;"> Similar Products </h3>
    
<?php
$this->load->module("products");
//echo $product_category."->".$category_id;
$this->products->similar_Products($category_id,$product_category,$product_aid);
?>
<!--<div class="oneshop_pro_total_wrapper_div mat10">
    <div class="oneshop_proimagebox"> 
    <img src="<?php echo base_url().'assets/images/aa.jpeg'?>"> 
    </div>
    <div class="oneshop_product_ratebg_box">
    <p class="aleft"> ACCORE 3d Enlarged Screen With Speaker ... </p>
    <p class="bold fs14 aleft">Rs. 249</p>
    </div>
    </div>
   

<div class="oneshop_pro_total_wrapper_div mat10">
    <div class="oneshop_proimagebox"> 
    <img src="<?php echo base_url().'assets/images/ab.jpeg'?>"> 
    </div>
    <div class="oneshop_product_ratebg_box">
    <p class="aleft"> ACCORE 3d Enlarged Screen With Speaker ... </p>
    <p class="bold fs14 aleft">Rs. 249</p>
    </div>
    </div>
    
 
 <div class="oneshop_pro_total_wrapper_div mat10">
    <div class="oneshop_proimagebox"> 
    <img src="<?php echo base_url().'assets/images/ac.jpg'?>"> 
    </div>
    <div class="oneshop_product_ratebg_box">
    <p class="aleft"> ACCORE 3d Enlarged Screen With Speaker ... </p>
    <p class="bold fs14 aleft">Rs. 249</p>
    </div>
    </div>-->

    
</div>



</div>
    
    
  
    <div class="oneshop_right_newcontainer">
        
    </div>
            
            </div>
        	                  
            </div>          
        </div>
    
</div>
<?php
    $this->templates->app_footer();
?>
<script type="text/javascript">
    $("#buy_btn").click(function(){
        var product_id = $("#dev_os_p_id").val();
        var store_code=$("#hstore_code").val();
        $.ajax({
            type:"post",
            data:{product_id: product_id,store_code:store_code,mode:"buy"},
            url: oneshop_url+"/products/addItemsToCart/",
            success:function(data){
                var result=data.trim();
                //alert(result);
                if(result.indexOf("INSERTED")!=-1){
                    var result_arry=result.split("-");
                    window.location.href= oneshop_url+"/mycart/myCartView?mode=buy&cart_id="+result_arry[1];
                }
                /*if(result==1){
                    window.location.href="http://"+window.location.hostname+"/oneshop/mycart/myCartView?mode=buy&cart_id=".;
                } */               
            }
        });
    });
    </script>