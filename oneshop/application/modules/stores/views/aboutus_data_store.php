<?php $store_code=$store_details[0]["store_code"];
//For store theme  selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
 ?> 
 <style type="text/css">
.column {
  float: unset;
  padding: 15px;
  text-align: center;
  font-size: 17px;
  cursor: pointer;
  color: black;
}

hr.dotted {
  border-top: 1px dashed #ffcc00;
}

hr.rounded {
  border-top: 2px dashed #ffcc00;
}

.containerTab {
  padding: 20px;
  color: black;
  outline: 1px dashed #808080;
  outline-offset: -10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Closable button inside the image */
.closebtn {
  float: right;
  color: black;
  font-size: 35px;
  cursor: pointer;
}

 </style>
 <script type="text/javascript">

 	function openTab(tabName) {
	  var i, x;
	  x = document.getElementsByClassName("containerTab");
	  for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";
	  }
	  document.getElementById(tabName).style.display = "block";
	}
 </script>
 <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("$store_ptype"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 

<div class="" style="margin:0 4%;width:92%;display:table;">
	<div class="oneshop_left_newcontainer pab10 minheight700" style="margin-right: 0px;padding-left: 0px;padding-right: 0px;margin-left: 0px;width: 78%;">
		<?php 
			// $dispPage = "Privacy Policy";
			if($store_ptype == "aboutus"){
				$dispPage = "About";
			}
		?>
        
		<div class="mar10 mat15">
		<?php 
			if($store_ptype == "aboutus"){?>
	        <div class="hd_heading">
	            <h1><?php echo $dispPage; ?>  <span></span></h1>
	        </div>
			<p class="ajustify">
				<?php if($store_details[0]["store_about"] != ""){ echo $store_details[0]["store_about"]; }else{ ?> 
                <div class="notfound">
                    <p><i class="fa fa-ban"></i> No data found</p>
                </div>
            <?php } ?>
				
            </p> 
			<?php }?>
		</div>


		<?php 
		if($store_ptype != "aboutus"){?>
		<div class="oneshop_left_newcontainer pab10 minheight700" style="float: left;width: 30%;padding-right: 0px;min-height: 550px;margin-right: 0px;padding-left: 0px;">
			<div>
			  <div class="column" onclick="openTab('b1');" >Privacy Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i> </div><hr class="rounded">
			  <div class="column" onclick="openTab('b2');" >Purchasing Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i></div><hr class="rounded">
			  <div class="column" onclick="openTab('b3');">Cancellation Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i></div><hr class="rounded">
			  <div class="column" onclick="openTab('b4');">Return & Refund Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i></div><hr class="rounded">
			  <div class="column" onclick="openTab('b5');">Damages Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i></div><hr class="rounded">
			  <div class="column" onclick="openTab('b6');">Security Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i></div><hr class="rounded">
			  <div class="column" onclick="openTab('b7');">Delivery Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i></div><hr class="rounded">
			  <div class="column" onclick="openTab('b8');">Customer Rights Declaration Policy <i class="fa fa-arrow-circle-right" style="float: right;"></i></div><hr class="rounded">
			</div>
		</div>
		<div style="float: left;width: 68%;padding-top: 20px;">
			<div id="b1" class="containerTab" style="display:block;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <!-- If you want the ability to close the container, add a close button -->
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Privacy Policy</h2>
			  <br />
			  <br />
			  <p>
					<?php if($store_details[0]["store_privacy_policy"] != ""){ echo $store_details[0]["store_privacy_policy"]; }else{ ?>
	                    <i class="fa fa-ban"></i> No data found
				<?php } ?>
				</p> 
			</div>
			<div id="b2" class="containerTab" style="display:none;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Purchasing Policy</h2>
			  <br />
			  <br />
			  	<p>
					<?php if($store_details[0]["store_agreement"] != ""){ echo $store_details[0]["store_agreement"]; }else{ ?>
	                    <i class="fa fa-ban"></i> No data found
					<?php }?>
				</p>
			</div>
			<div id="b3" class="containerTab" style="display:none;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Cancellation Policy</h2>
			  <br />
			  <br />
			  	<p>
					<?php if($store_details[0]["store_cancellation_policy"] != ""){ echo $store_details[0]["store_cancellation_policy"]; }else{ ?>
	                    <i class="fa fa-ban"></i> No data found
					<?php }?>
				</p>
			</div>
			<div id="b4" class="containerTab" style="display:none;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Return & Refund Policy</h2>
			  <br />
			  <br />
			  	<p>
					<?php if($store_details[0]["store_return_policy"] != ""){ echo $store_details[0]["store_return_policy"]; }else{ ?>
	                    <i class="fa fa-ban"></i> No data found
					<?php }?>
				</p>
			</div>
			<div id="b5" class="containerTab" style="display:none;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Damages Policy</h2>
			  <br />
			  <br />
			  	<p>
					<?php if($store_details[0]["store_damage_policy"] != ""){ echo $store_details[0]["store_damage_policy"]; }else{ ?>
	                    <i class="fa fa-ban"></i> No data found
					<?php }?>
				</p>
			</div>
			<div id="b6" class="containerTab" style="display:none;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Security Policy</h2>
			  <br />
			  <br />
			  	<p>
					<?php if($store_details[0]["store_security_policy"] != ""){ echo $store_details[0]["store_security_policy"]; }else{ ?> 
	                    <i class="fa fa-ban"></i> No data found
					<?php }?>
				</p>
			</div>
			<div id="b7" class="containerTab" style="display:none;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Delivery Policy</h2>
			  <br />
			  <br />
			  	<p>
					<?php if($store_details[0]["store_del_policy"] != ""){ echo $store_details[0]["store_del_policy"]; }else{ ?> 
	                    <i class="fa fa-ban"></i> No data found
					<?php }?>
				</p>
			</div>
			<div id="b8" class="containerTab" style="display:none;background-image: linear-gradient(-180deg, white, #ffcc00);min-height: 420px;overflow-y: scroll;">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
			  <h2>Customer Rights Declaration Policy</h2>
			  <br />
			  <br />
			  	<p>
					<?php if($store_details[0]["crd_policy"] != ""){ echo $store_details[0]["crd_policy"]; }else{ ?>  
	                    <i class="fa fa-ban"></i> No data found
					<?php }?>
				</p>
			</div>
		</div>
		<?php }?> 

        <div class="oneshop_products_main_wrap mat20">
			<div class="hd_heading">
            	<h1>Recent Products  <span></span></h1>
            </div>
			<?php
				$this->load->module('products');
				$this->products->getrecentproducts($store_details[0]['store_code']); 
			?>
		</div>
	</div>
	<div class="oneshop_right_newcontainer mat15">
 
<a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_blank"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>

	</div>
      </div>