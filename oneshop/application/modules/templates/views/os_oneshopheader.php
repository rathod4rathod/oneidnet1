<?php
    //Type: 1 Admin
    //Type: 0 Normal
    $userType = 0;
    $is_store_owner="no";
    $is_order_manager="no";
     $store_cod=$this->uri->segment(2);
    if(strpos($store_cod,"ST")!==false){
        $store_code=$store_cod;    
    }
    if($role!="END_USER"){
        $userType = 1;
    }
    //echo "role:".$role;
    $home_url = site_url("store_home")."/".$store_code;
    $enduser_home_url = site_url("store_home")."/".$store_code;
    $about_url = site_url("about")."/".$store_code;
    $privacy_policy_url = site_url("policy")."/".$store_code;
    $agreement_policy_url = site_url("store_agreement")."/".$store_code;
    $services_url = site_url("services")."/".$store_code;
    $storereviews_url = site_url("store_reviews")."/".$store_code;
    $edit_store_url = site_url("edit_store")."/".$store_code;
    $add_prod_url = site_url("add_product")."/".$store_code;
    $view_prod_url = site_url("view_product")."/".$store_code;
    $prod_posting_url = site_url("product_posting")."/".$store_code;
    $store_products_url = site_url("store_products")."/".$store_code;
    $store_reviews=site_url("store_reviews")."/".$store_code;
    $store_activities=site_url("store_activities").'/'.$store_code;
    $store_theme_url = site_url("themes")."/".$store_code;
    $staff_url = site_url("staffs")."/".$store_code;
    $orders_url=site_url("orders")."/".$store_code;
	$inventry_url=site_url("inventory")."/".$store_code;
	$promo_url=site_url("promo_sales")."/".$store_code;
    $this->load->module("mycart");
    $page=$this->uri->segment(1);

?>
<?php $session_value=(isset($_SESSION['start']))?$_SESSION['start']:'';
// $time = time();
?>
<div>    
	<div class="oneshop_banner1_data_box header_logo"> 
		<span class="fll cartlogos">
			<?php
//            echo "<pre>";print_R($store_details[0]["profile_image_path"]);echo "</pre>";
            $store_img_path = STORE_PATH . $store_code . "/logo/si/" . $store_details[0]["profile_image_path"];
            if ($store_details[0]["profile_image_path"] != "") {
                $store_img_url = STORE_PATH . $store_code . "/logo/si/" . $store_details[0]["profile_image_path"];
            }else{
                $store_img_url=base_url().'assets/images/default_store.png';
            }
//            echo $store_img_url;
            ?>
            <a href="<?php echo $enduser_home_url; ?>" class="white" title="<?php echo ucfirst($store_details[0]['store_name']) ?>">
                <img id="strpic" style="transform: scaleY(1.5);" src="<?php echo $store_img_url; ?>" alt="<?php echo ucfirst($store_details[0]["store_name"]) ?>">
            </a>
                    
		</span>
        <span class="fll" style="margin-top: 8px;font-family: Raleway-SemiBold;font-weight: bold;max-width: 300px;text-overflow: ellipsis;white-space: nowrap;font-size: 16px !important;overflow: hidden;" title="<?php echo ucfirst($store_details[0]['store_name'])?>"><strong class="white"> <?php echo ucwords($store_details[0]["store_name"]);?> </strong></a>
        	        </span>
	<?php	//Trusted Badge Verification

        if($store_details[0]["is_official"] == 1){
		?>

		<p class="fll" style="margin-left:20px;"><a href="#"><img  src="<?php echo base_url().'assets/images/shield.png'?>" title="Trusted" width="23" height="25"> </a> </p>
		
		<?php } ?>
		
        <div class="banner_rightside_box"> 
        <?php
			if($role=="END_USER"){
				$cart_cnt=$this->mycart->cartCount($store_code);
		?>
		<div class="cart_notify_options"  >
			<p class="banner_cart_countingbg" id="oneshop_mycartcount"> 
				<?php 
				
				echo $cart_cnt;
				?> 
			</p>
			<ul>
				<li>
					<img class="maildes_headerIcon" src="<?php echo base_url().'assets/images/cart2.png'?>">
					<ul id="cartdata">
						

					</ul>
				</li>
			</ul>
		</div>
				<p class="fll" style="margin-left:46px;"><a href="javascript:void(0)" id="store_review"><img  src="<?php echo base_url().'assets/images/review.png'?>" title="Store Review"> </a> </p>
                <p class="fll" style="margin-left:14px;"><a href="javascript:void(0)" id="call_request"><img  src="<?php echo base_url().'assets/images/enquiry1.png'?>" title="Submit Request" width="23" height="21"> </a> </p>
                <p class="fll" style="margin-left:14px;"><a href="javascript:void(0)" id="msg_request"><img  src="<?php echo base_url().'assets/images/messageBubble.png'?>" title="Message" width="23" height="21"> </a> </p>
        <?php
			} else {
		?>
		<!-- <p class="fll" style="margin-left:44px;"><a href="javascript:void(0)" ><img  src="<?php echo base_url().'assets/images/enquiry.png'?>" title="Enquiry" width="23" height="21"> </a> </p>        	
                <p class="fll" style="margin-left:14px;"><a href="javascript:void(0)"><img  src="<?php echo base_url().'assets/images/enquiry1.png'?>" title="Request Submit" width="23" height="21"> </a> </p> -->
                <p class="fll" style="margin-left:14px;"><a href="<?php echo base_url().'storemessages/'.$store_code?>"><img  src="<?php echo base_url().'assets/images/messageBubble.png'?>" title="Message" width="23" height="21"> </a> </p>
		<?php	
			}
		
	?>
	</div>
	<div class="banner_ratingbox rating">
		<?php
			//Getting Review Details
			$avg_review_rating  = "";
			$storeReviewDetails = $this->stores->getStoreReviewDetailsByStoreCode($store_code);
			
		?>
		<p>
			<span>Rating: </span>
			<?php 
			if($storeReviewDetails[0]["avgrating"] == ""){
				$ratingDisplay = "1/5";
			}else{
			    $ratingDisplay =round($storeReviewDetails[0]["avgrating"], 1)." / 5";
			}
			?>
			<span><?php  echo $ratingDisplay;?></span>  
		</p>
	</div> 
    <div class="banner_ratingbox unfollow_wrap">
        <?php
			$is_following="no";
			$follow_result=$this->templates->getFollowList($store_code);
			
			if($follow_result[0]["cnt"]!=0){
				$is_following="yes";            
			}
                        if($userType==0){
		?>
			<span class="fll mar10" id="store_follow_p"> 
			
			<?php
			if($is_following=="yes"){ echo'<input type="button" name="button" class="follow_btn" id="store_unfollow_btn"   value="Unfollow">'; }else{ 
				echo'<input type="button" name="button" class="follow_btn" id="store_follow_btn" value="Follow">';
			 }
			?>    
		     </span>           
			<span class="fll bold"> 
				<span id="followers_cnt_p"><?php echo $follow_result[0]["follow_cnt"];?></span> Followers
			</span>
                    <?php
                        }else{
                    ?>
                <span class="fll bold"> 
					<span  id="followers_cnt_p"><?php echo $follow_result[0]["follow_cnt"];?></span> Followers
				</span>
                <?php
                        }
                    ?>
		</div> 
<!--        <div class="banner_ratingbox">
            <p class="bold"> <a href="<?php echo base_url().'storemessages/'.$store_code?>">Messages</a></p>
        </div>-->
	</div>
	<div class="oneshop_services_adminstore_container" style="margin:0px;">
            <?php  if($store_details[0]['is_active']==1){ ?>
		<div class="oneshop_services_adminstore_menu">
		<?php if($userType == 1){?>
			<ul>
				<?php
				if($role=="PRODUCT_MANAGER" || $role=="ADMIN" || $role=="SUPER"){
				?>                                        
                                <li style="width:80px;">
                                    <div class="maildes_headerOptions" style="margin:0px;">
                                        <ul>
                                            <li>
                                                <div class="fll" style="width:85px;"> 
                                                        <span class="<?php if($active_menu=="add-products" || $active_menu=="view-products"){echo "active_menu";}?>">PRODUCTS</span> <img src="<?php echo base_url() . "assets/" ?>images/down.png" style="margin-left:5px;"> 
                                                </div>
                                                <ul>
                                                        <li class="maildes_bubble"><img src="<?php echo base_url() . "assets/" ?>images/bubble.png"></li>
                                                        <li class="maildes_settingOption"><a href="<?php echo $prod_posting_url;?>">ADD PRODUCTS</a></li>
                                                        <li class="maildes_settingOption"><a href="<?php echo $store_products_url;?>">PRODUCT LISTS</a></li>                                                     
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
				</li>
				<?php
				}
				
				
				?>
				<?php
				if($role=="ORDER_MANAGER" || $role=="ADMIN" || $role=="SUPER"){
				?>
                                <li style="width:102px;">
					<div class="maildes_headerOptions" style="margin:0px;">
						<ul>
							<li>
								<div class="fll" style="width:100px;">
									<a href="<?php echo $orders_url;?>" class="<?php if($active_menu=="store_orders"){echo "active_menu";}?>"> MANAGE ORDERS </a>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<?php
				}
				if($role=="ORDER_MANAGER" || $role=="ADMIN" || $role=="SUPER"){
				?>
                <li style="width:102px;">
					<div class="maildes_headerOptions" style="margin:0px;">
						<ul>
							<li>
								<div class="fll" style="width:120px;">
									<a href="<?php echo $inventry_url;?>" class="<?php if($active_menu=="store_inventory"){echo "active_menu";}?>"> MANAGE INVENTORY </a>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<?php        
				}                             
				if($role=="ADMIN" || $role=="SUPER"){
				?>
				<li style="width:75px;" class="<?php if($active_menu=="store_reports"){echo "active_menu";}?>">
					<div class="maildes_headerOptions" style="margin:0px;">
						<ul>
							<li>
								<div class="fll" style="width:75px;"> 
									<a href="<?php echo base_url()."mystore_reports/".$store_code;?>" class="<?php if($active_menu=="store_reports"){echo "active_menu";}?>"> REPORTS </a>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<?php				    
                }
				if($role=="ADMIN" || $role=="SUPER"){
				?>
				<li style="width:90px;">
					<div class="maildes_headerOptions" style="margin:0px;">
						<ul>
							<li>
								<div class="fll" style="width:103px;"> 
									<a href="<?php echo $store_reviews;?>" class="<?php if($active_menu=="store_reviews"){echo "active_menu";}?>"> STORE REVIEWS </a>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<?php
				}
				
				if($role=="ADMIN" || $role=="SUPER"){
				?>
				<li style="width:80px;" class="<?php if($active_menu=="store_activities"){echo "active_menu";}?>">
					<div class="maildes_headerOptions" style="margin:0px;">
						<ul>
							<li>
								<div class="fll" style="width:135px;"> 
									<a href="<?php echo $store_activities;?>" class="<?php if($active_menu=="store_activities"){echo "active_menu";}?>"> STORE ACTIVITY LOG  </a>
								</div>								
							</li>
						</ul>
					</div>
				</li>
                <?php
                }
                if($role=="ADMIN" || $role=="SUPER"){
				?>
				<li style="width:80px;">
					<div class="maildes_headerOptions" style="margin:0px;">
						<ul>
                                                        <li class="<?php if($active_menu=="store_staff" || $active_menu=="edit-stores" || $active_menu=="store-themes"){echo "active_menu";}?>">
								<div class="fll" style="width:85px;margin-left:33px"> 
                                                                    <span class="<?php if($active_menu=="store_staff" || $active_menu=="edit-stores" || $active_menu=="store-themes"){echo "active_menu";}?>">SETTINGS</span> <img src="<?php echo base_url() . "assets/" ?>images/down.png" style="margin-left:5px;"> 
								</div>
								<ul>
									<li class="maildes_bubble"><img src="<?php echo base_url() . "assets/" ?>images/bubble.png"></li>
									<li class="maildes_settingOption"><a href="<?php echo $promo_url;?>" id="promo_form">SALES</a></li>
									<li class="maildes_settingOption"><a href="<?php echo $staff_url;?>">STORE STAFF</a></li>
									<li class="maildes_settingOption"><a href="<?php echo $edit_store_url;?>">EDIT STORE</a></li>
<li class="maildes_settingOption"><a href="<?php echo $store_theme_url;?>">EDIT STORE THEME</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</li>
				<?php
				}
				?>
				
			</ul>
			<?php } else {?>
			<ul>
				<li>
                	<a href="<?php echo $about_url;?>" <?php if($active_menu=="aboutus"){echo "class='current'";}?>> ABOUT </a>
				</li>
                <li>
                	<a href="<?php echo $services_url;?>" <?php if($active_menu=="services"){echo "class='current'";}?>> SERVICES </a>
				</li>
				<li>
                	<a href="<?php echo $storereviews_url;?>" <?php if($active_menu=="store_reviews"){echo "class='current'";}?>>STORE REVIEWS </a>
				</li>
				<li>
                	<a href="<?php echo $privacy_policy_url;?>" <?php if($active_menu=="privacy_policy"){echo "class='current'";}?>> POLICIES </a>
				</li>
				<li>
                	<a href="<?php echo $agreement_policy_url;?>" <?php if($active_menu=="store_agreement"){echo "class='current'";}?>> PURCHASE AGREEMENT </a>
				</li>
<!--				<form action="<?php echo base_url().'products/getStoreProducts/'.$store_code;?>" method="post" style="padding-top: 6px;float:right;padding-right:10px" id="product_search_form" >-->
                <?php
                if($page=="store_home"){
                ?>
                <style type="text/css">
                	#searchparam {
					    width: 130px;
						  box-sizing: border-box;
						  border: 2px solid #ccc;
						  border-radius: 4px;
						  font-size: 10px;
						  background-color: white;
						  background-position: 10px 10px; 
						  background-repeat: no-repeat;
						  padding: 7px 20px 7px 20px;
						  -webkit-transition: width 0.4s ease-in-out;
						  transition: width 0.4s ease-in-out;
					}

					/* When the input field gets focus, change its width to 100% */
					#searchparam:focus {
					  width: 30%;
					}
                </style>
					<input type="text" id="searchparam" name="searchparam" style="margin-top: 5px;" placeholder="Search Product here..." value="">
                    <?php
                }
                ?>
				<!--</form>-->
							
			</ul>
                <?php }  ?>
		</div>
                <div class="oneshop_menuicon_div" id="flip"> <img src="<?php echo base_url() . "assets/" ?>images/menu02.png"> </div><?php } ?>
			<div id="panel" class="fll">
				<div id="tabContainer">
					<div id="tabs">
						<ul>
							<li id="tabHeader_1">Category</li>
						</ul>
					</div>
					<div id="tabscontent">
						<div class="tabpage" id="tabpage_1">
							<section class="category_list">
								<?php
								$storeObj=$this->load->module('stores');
								$productCatArr =  $this->stores->getAllStoreProdCategories($store_code);

								if(count($productCatArr) > 0){
								$catGrpArr = array();
								$catWiseProducsArr = array();

								foreach($productCatArr as $mainCatArr){
								if(!in_array($mainCatArr["groups"],$catGrpArr)){
								$catGrpArr[] = $mainCatArr["groups"];
								}
								$catWiseProducsArr[$mainCatArr["groups"]][$mainCatArr["category_name"]][] = $mainCatArr["product"];
								}
								}
								?>
								<ul>
								<?php
								if(count($productCatArr) > 0){
								foreach($catGrpArr as $mainCatVal){
								?>
									<li><a href="#"><?php echo $mainCatVal; ?> <span class="arrow_right"> > </span></a></li>
								<?php
								}
								}
								?>
								</ul>

							</section>
							<section class="category_list_details">
								<?php 
								$i = 0;
								foreach($catWiseProducsArr as $maincategoryVal => $subcatArr) {
								$catid = strtolower($maincategoryVal);
								$catid = str_replace(" & ", "_", $catid);
								$catid = str_replace("&", "_", $catid);
								$catid = str_replace(" ", "_", $catid);
								if ($i == 0) {
								$dis = "display:inline";
								} else {
									$dis = "display:none";
								}
								echo "<div id='".$maincategoryVal."'". $dis." style=''>";
								foreach($subcatArr as $subCatVal => $mainProductArr){

								$subcatid = strtolower($subCatVal);
								$subcatid = str_replace(" & ", "_", $subcatid);
								$subcatid = str_replace("&", "_", $subcatid);
								$subcatid = str_replace(" ", "_", $subcatid);

								?>
								<section class="category1" id="<?php echo $maincategoryVal; ?>">
									<h3 class="cat_heading"><a href="<?php echo base_url()."category_search/".$store_code."/".$catid."/".$subcatid."/"?>"><?php echo $subCatVal;?></a></h3>
									<?php
									if(count($mainProductArr) > 0){
									?>
									<ul>

									<?php
									foreach($mainProductArr as $subProdVal){
									$prodid = strtolower($subProdVal);
									$prodid = str_replace("&", "_", $prodid);
									$prodid = str_replace(" & ", "_", $prodid);
									$prodid = str_replace(" ", "_", $prodid);
									?>
										<li><a href="<?php echo base_url()."product_search/".$store_code."/".$catid."/".$subcatid."/".$prodid;?>"><?php echo $subProdVal;?></a></li>
									<?php
									}
									?>
									</ul>
								<?php
								}
								?>
								</section>
							<?php
							}
							echo "</div>";
							$i++;
							}
							?>
							</section>
						</div>
						<div class="tabpage" id="tabpage_2">
							<section class="services_services">
								<section class="left_services"></section>
								<section class="right_services"></section>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="<?php echo base_url(); ?>assets/scripts/category_menu.js"></script>
        <script type="text/javascript">


$(document).ready(function(){
		var store_code='<?php echo $store_code?>';
	               
		callAJAX(oneshop_url+"/mycart/myCartList",{store_code:store_code},function(data){
			
			$("#cartdata").html(data);
			},"","")
		});

		var chksess = setInterval(CheckSession,20000);

		function CheckSession() 
		{
			var store_code='<?php echo $store_code?>';
			var session = '<?php echo $session_value?>';
			if(session != ''){
				$.ajax({
			        type:"post",    
			        data:{store_code:store_code,session:session},
			        url: oneshop_url+"/stores/storeReviewPopup/",
			        success:function(data){
			         	$("#os_popup").css("display","block").html(data);
			        }
			    });
			    clearInterval(chksess);
			}
		}
			
			// $("#promo_form").click(function(){
   //              var store_code='<?php echo $store_code?>';
   //              $.ajax({
   //                  type:"post",
   //                  data:{store_code:store_code},
   //                  url: oneshop_url+"/stores/promoPopup/",
   //                  success:function(data){
   //                      $("#os_popup").css("display","block").html(data);
   //                  }
   //              });
   //          });


            $("#call_request").click(function(){
                var store_code='<?php echo $store_code?>';
                $.ajax({
                    type:"post",
                    data:{store_code:store_code},
                    url: oneshop_url+"/stores/callRequestPopup/",
                    success:function(data){
                        $("#os_popup").css("display","block").html(data);
                    }
                });
            }); 

            $("#msg_request").click(function(){
                var store_code='<?php echo $store_code?>';
                $.ajax({
                    type:"post",
                    data:{store_code:store_code},
                    url: oneshop_url+"/oshop_popup/sendStoremessage/",
                    success:function(data){
                       $("#os_popup").css("display","block").html(data);
                    }
                });
            }); 

            $("#store_review").click(function(){
                var store_code='<?php echo $store_code?>';
                $.ajax({
                    type:"post",    
                    data:{store_code:store_code},
                    url: oneshop_url+"/stores/storeReviewPopup/",
                    success:function(data){
                        $("#os_popup").css("display","block").html(data);
                    }
                });
            });

            $(document).on('click',"#cart_view_all",function () {
				 window.location.href= oneshop_url+"/mycart/myCartView";
			});
            // bug fixing on 30-06-2016
		    $(document).on('click',"#store_follow_btn",function () {
		        var str_code = '<?php echo $store_code ?>';
		        $.ajax({
		            type: "post",
		            data: {store_code: str_code},
		            url: oneshop_url+ "/templates/insertFollow/",
		            success: function (data) {
		                var result=data.trim();
		                var followers_cnt=parseInt($('#followers_cnt_p').html());
		                if(result==1){
		                    var res_followers=followers_cnt+1;
		                    $("#store_follow_p").html('<input type="button" name="button" class="follow_btn" id="store_unfollow_btn"   value="Unfollow">');
		                    $("#followers_cnt_p").html(res_followers);
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
		                var followers_cnt= parseInt($('#followers_cnt_p').html());
		                if(result==1){
		                    var res_followers=followers_cnt-1;
		                    $("#store_follow_p").html('<input type="button" name="button" class="follow_btn" id="store_follow_btn"  value="Follow">');
		                    $("#followers_cnt_p").html(res_followers);
		                }
		            }
		        });
		    });
		    
		    $("#searchparam").keydown(function(e){
		        var search_val=$(this).val();
		        var store_code='<?php echo $store_code?>';
		        if(e.keyCode==13){
		            if(search_val.trim()!=""){
		                $.ajax({
		                    type:"post",
		                    data:{search_val:search_val},
		                    url: oneshop_url+"/products/getStoreProducts/"+store_code,
		                    success:function(data){
		                        $("#list_products").html(data);
		                    }
		                });
		                //$("#product_search_form #searchparam").val(search_val);
		                //$("#product_search_form").submit();                
		            }
		            else{
		                alert("Please enter some text in the search field");
		                return false;
		            }
		        }
		    });
            </script>
            <style type="text/css">
                .store_menu_active{
			    border-bottom:3px solid #fff;
			}
                </style>
