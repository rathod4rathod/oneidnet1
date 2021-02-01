<input type="hidden" id="STORE_ID" value="<?php echo $store_id; ?>">
<!--Oneshop Sub Header starts Here(vinod 19-05-2015)-->
<div class="oneshop_subHeader">
    <div class="oneshop_dropMenu">

        <div class="cssmenu">
            <ul>
                <li class='active has-sub'>
                    <a href='#'><span class="maildes_DropMenuHead">
                            <img src="<?php echo base_url() . "assets/" ?>images/menu01.png">
                            <h3>My Store Menu</h3>
                        </span></a>
                    <ul>
                        <li><a href="<?php echo base_url()."mystore_reports";?>"><span class="sprite-Reports">Reports</span></a></li>
                        <li><a href="<?php echo base_url()."home/orderCancellation/";?>"><img src="#"><span>Cancellations</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>             

    </div>
    <div class="oneshop_menu">
        
        <ul>

            <li class="<?PHP if (isset($select_mystore)) {
  echo 'oneshop_storePage';
} ?>" ><a class="menu_item" href="<?php echo base_url() . "mystore"; ?>"><h5>Home</h5></a></li>
            
            <?php
if (preg_match("/\b".$_SESSION['user_id']."\b/i", $order_manager) || $store_owner_id==$_SESSION['user_id']) {
  ?>
        <li class="<?PHP if (isset($select_mystore_myorders)) {
      echo 'oneshop_storePage';
    } ?>"><a class="menu_item" href="<?php echo base_url() . "home/mystore_myorders/"; ?>"><h5>My Orders</h5></a></li>
    <?php
}?>
            
            
            
<?php
if (preg_match("/\b".$_SESSION['user_id']."\b/i", $store_manager) || $store_owner_id==$_SESSION['user_id']) {
    ?>
                  <li class="<?PHP if (isset($select_mystore_myproducts)) {
  echo 'oneshop_storePage';
} ?>"><a class="menu_item" href="<?php echo base_url() . "home/mystore_myproducts/"; ?>"><h5>My Products</h5></a></li>
            <li class="<?PHP if (isset($select_product_posting)) {
  echo 'oneshop_storePage';
} ?>"><a class="menu_item" href="<?php echo base_url() . "product_posting"; ?>"><h5>New Product</h5></a></li>
            <?php
}
?>

            
            <li><a class="menu_item" href="<?php echo base_url(); ?>"><h5>Go for Shopping</h5></a></li>
        </ul>
    </div>
</div>

<div class="oneshop_navigationBar">
    <span class="sprite-Backward"><h6 class="os_backword_btn" id="os_backword_btn"><< Backward /</h6 ><h6 class="os_forward_btn" id="os_forward_btn"> Forward >></h6></span>
</div>
       
