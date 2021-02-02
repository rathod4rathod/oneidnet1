<?php
$this->load->module('stores');
?>
<div class="quicklinkwrap"> 
    <div class="right_container_head">
        <h3> Product Suggestions </h3>
    </div>
    <ul class="storesugg_wrap product_wrap">
    <?php    
     $this->load->module("products");
     $this->load->module("home");
     $uid=$this->products->get_UserId();
     $uDetail=$this->home->myuserAlldetails($uid);
     
    foreach ($products_data as $prows) {
	$currency = $this->stores->getCurrency($prows["store_code"]);        
        if ($prows["primary_image"] != "" && file_exists("stores/".$prows["store_code"] . "/products/" . $prows["product_aid"] . "/mi/" . $prows["primary_image"])!==false) {
            $product_img_url = base_url() . "stores/" . $prows["store_code"] . "/products/" . $prows["product_aid"] . "/mi/" . $prows["primary_image"];
        }
        else{
            $product_img_url = base_url() . 'assets/images/default_product_40.png';    
        }
        $prod_url = base_url() . 'product_detail_view/' . $prows["store_code"] . "/" . $prows["product_code"];
        if(strlen($prows["product_name"])>15){
          $product_name_label=ucwords(substr($prows["product_name"],0,15))."..";
        }else{
          $product_name_label=ucwords($prows["product_name"]);
        }
    ?>
    <li><!--channelitem start here--> 
    <input type="hidden" id="hstore_aid" value="<?php echo $srows['store_aid']?>"/>            
    <a href="<?php echo $prod_url ?>"><img alt="<?php echo $prows["product_name"]; ?>" title="<?php echo $prows["product_name"]; ?>" class="imgitem_two" src="<?php echo $product_img_url ?>">
    	<h4><?php echo $product_name_label; ?></h4>
        <p><?php echo $currency." ".$prows["sale_price"]; ?></p>
        <div class="clearfix"></div>
    </a>
</li>
    
    
    
        <?php /*?><div class="channelitem"><!--channelitem start here--> 
            <div class="channelitem">
                <div class="videoitems_box_newbox_two"><!--channelitem in start here-->
                    <div class="leftchannelitem_storesug">
                        <a href="<?php echo $prod_url ?>"><img alt="<?php echo $prows["product_name"]; ?>" title="<?php echo $prows["product_name"]; ?>" class="imgitem_two" src="<?php echo $product_img_url ?>"></a>
                    </div>

                    <div class="rightchannelitem_storeright">
                        <p class="mar10 bold pat5"><a href="<?php echo $prod_url ?>"> <?php echo $product_name_label; ?> </a></p>
                        <p class="fs12"><?php echo $currency." ".$prows["sale_price"]; ?></p>
                    </div>
                </div><!--channelitem in closed here-->
            </div>
        </div><?php */?>
    <?php
    }
    ?>  
    </ul>
</div>
